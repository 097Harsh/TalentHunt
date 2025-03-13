<?php

namespace App\Http\Controllers;
use App\Mail\StatusMail;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Skills;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\UserProfile;
use App\Models\feedback;
use Mail;
use Barryvdh\DomPDF\Facade as PDF;
use Twilio\Rest\Client;

class UserController extends Controller
{
    //
    public function home()
    {
        return view('user.home');
    }
    //about page
    public function about()
    {
        return view('user.about');
    }
    //contact page
    public function contact()
    {
        return view('user.contact');
    }
    public function storeContact(Request $request)
    {
        //echo "hi";die;
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|numeric',
            'msg' => 'required',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $msg = $request->input('msg');
        $contact = DB::table('contact')->insert(['name' => $name,'email' => $email,'contact' => $contact, 'msg' => $msg]);
        if($contact)
        {
            return redirect()->route('contact')->with('status','inqury request sended...');
        }
        return redirect()->route('home');
    }
    //blog page
    public function blog()
    {
        return view('user.blog');
    }
    //user profile 
    public function userProfile()
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            $user_profile = UserProfile::where('user_id','=',$user_id)->first();
            $courses = Course::all();
            $skills = Skills::all();
            return view('user.userProfile',compact('courses','skills','user_profile'));
        }
    }
    //updating user profile 
    public function UpdateProfile(Request $request)
    {    
        
        $user_id = Auth::user()->id; 
        $validated = $request->validate([
            'objective' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|min:10',
            'courses' => 'required|array',
            'skill_id' => 'required|array',
            'resume' => 'nullable|mimes:pdf,doc,docx,txt',
            'image' => 'nullable|mimes:png,jpg,jpeg', 
            'count_id' => 'required|integer',
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
            
        ]);
        $record = DB::table('user_profiles')->where('user_id','=',$user_id)->first();
        $img_name = $record->user_image;
        $resume_name = $record->resume_file; 
        if($request->hasFile('image')){
            $img = $request->file('image');
            $img_name = $img->getClientOriginalName();
            $img_path = 'user/upload/img';
            if (!$img) {
                return redirect()->back()->withErrors('Both image and resume are required.');
            }
            $img->move($img_path, $img_name);
            
        }elseif($request->hasFile('resume')){
            $resume = $request->file('resume');
            $resume_name = $resume->getClientOriginalName();
            //echo $resume_name;die;
            $resume_path = 'user/upload/resume';
            if (!$resume) {
                return redirect()->back()->withErrors('Both image and resume are required.');
            }
            $resume->move($resume_path, $resume_name);
        }
        
        $courses = implode(",", $request->input('courses'));
        $skills = implode(",", $request->input('skill_id'));
        
        if ($user_id) {
            
            $user_profile = DB::table('user_profiles')->where('user_id', '=', $user_id)->update([
                'objective' => $request->objective,
                'designation' => $request->designation,
                'address' => $request->address,
                'contact' => $request->contact,
                'course' => $courses,
                'skills' => $skills,
                'resume_file' => $resume_name,
                'user_image' => $img_name,
                'country_id' => $request->count_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
            ]);
            if ($user_profile) {
                
                return redirect()->route('userProfile')->with('status', 'Profile updated successfully...');
            } else {
                return redirect()->back()->withErrors('Failed to update profile. Please try again.');
            }
        } else {
            return redirect()->back()->withErrors('User not found.');
        }
    }
    
    //for country->state->city fetching dropdown
    public function get_country()
    {
        $result = Country::all();
        $countries = [];
        foreach($result as $row)
        {
            $countries[] = $row;
        }
        return response()->json($countries);
    }
   public function get_state(Request $request)
   {
        $country_id = $request->id;
        $result = State::where('country_id','=',$country_id)->get();
        $state = [];
        foreach($result as $row)
        {
            $state [] = $row;
        }
        return response()->json($state);
   }
   public function get_city(Request $request)
   {
        $state_id = $request->id;
        $result = City::where('state_id','=',$state_id)->get();
        $city = [];
        foreach($result as $row)
        {
            $city[]=$row;
        }
        return response()->json($city);
   }
   //feedback page
   public function feedback()
   {
        if(Auth::check())
        {
            return view('user.feedback');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
   }
   public function store_feedback(Request $request)
   {
        $validated = $request->validate([
            'rating' => 'required',
            'msg'   =>  'required | max:255',
        ]);
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            $feedback = new feedback();
            $feedback->user_id = $user_id;
            $feedback->rating = $request->rating;
            $feedback->msg = $request->msg;
            //echo "<pre>";print_r($feedback);die;
            $feedback->save();
            return redirect()->route('feedback')->with('status','feedback sended...');
        }
   }
    //All jobs showing tu user's
    public function AllJobs()
    {
         if(Auth::check())
         {
             $record = DB::table('job_upload')->where('status','=','Open')->paginate(5);
             return view('user.All_Jobs',compact('record'));
         }
    }
    public function MoreDetailJob($id){
         if(Auth::check())
         {
             $record =  DB::table('job_upload as ju')
                         ->join('company_profiles as cp', 'ju.company_id', '=', 'cp.user_id')
                         ->join('users as u', 'ju.company_id', '=', 'u.id')
                         ->join('job_category as cat','ju.category_id','=','cat.category_id')
                         ->join('job_department as department','ju.department_id','=','department.department_id')
                         ->select(
                             'ju.job_id',
                             'ju.title',
                             'ju.description',
                             'ju.num_of_vacany',
                             'ju.experience',
                             'ju.job_skill_required',
                             'ju.posted_date',
                             'ju.closing_date',
                             'ju.ContactEmail',
                             'u.name', 
                             'u.email',
                             'cp.contact',
                             'cp.website_url', 
                             'cat.category_name' ,
                             'department.department_name'    
                         )->where('ju.job_id','=',$id)
                         ->first();
             /*  echo "<pre>";
             print_r($record);die; */
             return view('user.view_job',compact('record'));
         }
    }
    //search job
    public function search(Request $request)
    {
            if(Auth::check())
            {
                 $result = [];
                 $name = $request->input('search');
                 //echo $name;die;
                 $record = DB::table('job_upload')
                                 ->where('title', 'LIKE', '%' . $name . '%')
                                 ->paginate(5);
                 
                 //echo "<pre>";print_r($result);die;
                 return view('user.All_Jobs',compact('record'));
            }
     }
     //job applied module
     public function Job_Applied(Request $request)
     {
         $validation = $request->validate([
             'experience' => 'required',
             'msg' => 'required|max:255',
             'resume' => 'required|mimes:pdf,doc,docx,txt',
         ]);
         if(Auth::check())
         {
             $id = Auth::user()->id;
             $job_id = $request->input('job_id');
             $exp = $request->input('experience');
             $msg = $request->input('msg');
             $file = $request->file('resume');
             $resume_name = $file->getClientOriginalName();
             $resume_path = 'user/resume';
             $date = now();
             //for fetch the user is already applied on this job 
             $application = DB::table('job_applied')->where('user_id','=',$id)
                                                     ->where('job_id','=',$job_id)
                                                     ->first();
             if($application)
             {
                 return redirect()->route('AllJobs')->with('status','You Already Applied This Job...');
             }
             //in else condition if not applied record inserted.....
             else
             {
                //for fetching the job title to send mail to the user....
                $job_title = DB::table('job_upload')->where('job_id','=',$job_id)->first();
                $title = $job_title->title; 
                $name = Auth::user()->name;
                $email = Auth::user()->email;
                $status = "Pending";
                $file->move($resume_path, $resume_name);
                $job_applied = DB::table('job_applied')->insert([
                                     'application_status' => "Pending",
                                     'msg'    =>  $msg,
                                     'resume' => $resume_name,
                                     'experince' => $exp,
                                     'application_date' => $date,
                                     'user_id' => $id,
                                     'job_id'    =>  $job_id
                                 ]); 
                //for sending email to user when user apply the job....
                Mail::to($email)->send(new StatusMail($title,$status,$name));
                return redirect()->route('AllJobs')->with('status','Job Application Submitted Successfully...');
             }
         }
     }
     //my jobs module
     public function MyJobs()
     {
         if(Auth::check())
         {
             $id = Auth::user()->id;
             $record = DB::table('job_applied as ja')->join('job_upload as ju','ju.job_id','=','ja.job_id')
                                                     ->where('ja.user_id','=',$id)
                                                     ->paginate(5); 
             return view('user.MyJobs',compact('record'));
         }
    }
    //make resume download functionality according profile
    public function makeResume(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $data = DB::table('user_profiles')
                        ->where('user_id', '=', $id)
                        ->first();

             // Render the Blade view to HTML
            $html = view('user.resume', compact('data'))->render();

            // Return the view and pass the necessary data to handle it in the browser
            return response()->view('user.resume', compact('data'))
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'inline; filename="resume.pdf"');
        }

        return redirect()->route('login')->with('error', 'Please login to generate your resume.');
    }

   
    

   
}
