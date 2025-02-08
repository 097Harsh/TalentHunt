<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ZoomServices;

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
        /*
        $request->validate([
            'topic'      => 'required|string',
            'start_time' => 'required|date_format:Y-m-d\TH:i:s',
            'duration'   => 'required|integer',
            'timezone'   => 'required|string',
        ]);
        */
        /*
            $meeting = $this->zoomService->createMeeting(
                $request->topic,
                $request->start_time,
                $request->duration,
                $request->timezone
                );
        */


        $meeting = $this->zoomService->createMeeting(
            'Manual Meeting',
            '2025-02-08T19:00:00',
            60,
            'UTC'
        );
    
        return response()->json($meeting);
    }
}
