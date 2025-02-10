<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ZoomServices;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\MeetingMail;
use Mail;
class ZoomMeetingController extends Controller
{
    //
    protected $zoomService;

    public function __construct(ZoomServices $zoomService)
    {
        $this->zoomService = $zoomService;
    }

    public function createMeeting(Request $request)
    {
       
       // print_r($request->inter_id);die;
        // Validate the request data
        $request->validate([
            'date'      => 'required|date_format:Y-m-d',    // Date in Y-m-d format
            'startTime' => 'required|date_format:H:i',      // Start time in H:i format (e.g., 14:30)
        ]);
        
        // Combine date and time into a single DateTime string
        $interviewTime = Carbon::createFromFormat('Y-m-d H:i', "{$request->date} {$request->startTime}")->format('Y-m-d\TH:i:s');

        // Create the Zoom meeting using your zoomService
        $meeting = $this->zoomService->createMeeting(
                'Interview Schedule',
                        $interviewTime,         // Start time in 'Y-m-d\TH:i:s' format
                        60,     // Duration in minutes
                        'UTC'
            );

         // Extract meeting details from the Zoom response
       
         $meetingId = $meeting['id'];
         $startTime = Carbon::parse($meeting['start_time']); // Convert to Carbon instance
         $endTime = $startTime->copy()->addMinutes(60);
         $joinUrl   = $meeting['join_url'];
         $password  = $meeting['password'];

        // Insert the meeting details into the 'interview' table
         DB::table('interview')->insert([
            'meeting_id'    => $meetingId,
            'schedule_date' => $startTime->toDateString(),
            'start_time'    => $startTime->toTimeString(),
            'end_time'      => $endTime->toTimeString(),
            'status'    => 'Schedule',
            'app_id'    =>  $request->inter_id,
            'meeting_link'  => $joinUrl,
            'meeting_code'  => $password,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        $user = DB::table('job_applied')
                ->where('app_id', $request->inter_id)
                ->join('users', 'job_applied.user_id', '=', 'users.id')
                ->select('users.email')
                ->first();
        //to get the mail
        $email = $user->email;
        //to send zoom meeting mail to user
        Mail::to($email)->send(new MeetingMail($meetingId,$joinUrl,$password,$interviewTime));
       
        // Return a success response with the meeting details
        /*   return response()->json([
            'message' => 'Meeting created and saved successfully',
            'meeting' => [
                'id' => $meetingId,
                'join_url' => $joinUrl,
                'password' => $password,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ]
        ], 201); // HTTP 201 Created
        */
        return redirect()->route('JobApplication')->with('status','Interview Schedule Successfully...');
    }

}
