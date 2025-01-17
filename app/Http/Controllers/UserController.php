<?php

namespace App\Http\Controllers;

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
}
