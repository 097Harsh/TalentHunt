<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Course;
use App\Models\Skills;
use App\Models\feedback;
use App\Models\JobCategory;
use Illuminate\Queue\Middleware\Skip;
use Mail;
use App\Mail\StatusMail;

class AdminController extends Controller
{
    //for dahboard page
    public function dashboard()
    {
        if(Auth::check())
        {   
            $users = DB::table('users')->where('role_id','=','2')->count();
            return view('admin.dashboard',compact('users'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //ManagerUsers show the records of user who's role_id = 2
    public function managerUsers()
    {
        if(Auth::check())
        {
            $users = User::where('role_id',2)->paginate(5);
            return view('admin.users.all_users',compact('users'));
        }   
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //delete User
    public function deleteUser(Request $request)
    {
        $id = $request->input('user_id');
        if (Auth::check()) {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                return redirect()->route('ManagerUsers')->with('status','user deleted successfully...');
            }
            return redirect()->route('ManagerUsers')->with('status','user not find successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //Edit user record 
    public function editUser($id)
    {   
        if(Auth::check())
        {
            $user = DB::table('users')
                    ->join('user_profiles','users.id','=','user_profiles.user_id')
                    ->select('users.*','user_profiles.*')
                    ->where('users.id','=',$id)
                    ->first();
            $courses = Course::all();
            $skills  = Skills::all();
            if($user)
            {
                //echo "<pre>";print_r($user);die;
                return view('admin.users.edit_user',compact('user','courses','skills'));
            }
            return redirect()->route('ManagerUsers')->with('status','user not find...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //update user record
    public function updateUser(Request $request,$id)
    {   
        //echo $id;die;
        $validation = $request->validate([
            'name' => 'required',
            'email'=> 'required|email',
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
        if(Auth::check())
        {
            $user = DB::table('user_profiles')->where('user_id','=',$id)->first();
            $img_name = $user->user_image;
            $resume_name = $user->resume_file; 
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
                $resume_path = 'user/upload/resume';
                if (!$resume) {
                    return redirect()->back()->withErrors('Both image and resume are required.');
                }
                $resume->move($resume_path, $resume_name);
            }
            $courses = implode(",", $request->input('courses'));
            $skills = implode(",", $request->input('skill_id'));

            if($id)
            {
                $user = DB::table('users')->where('id','=',$id)->update([
                    'name' => $request->name,
                    'email'=>$request->email
                ]);
                $user_profile = DB::table('user_profiles')->where('user_id', '=', $id)->update([
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
                return redirect()->route('ManagerUsers')->with('status','user profile updated successfully...');
            }
            return redirect()->route('ManagerUsers')->with('status','user not find...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //Manage course Module code 
    public function ManageCourse()
    {
        if(Auth::check())
        {
            $courses = Course::where('is_delete','=','0')->paginate(5);
            return view('admin.course.all_course',compact('courses'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //add course
    public function AddCourse()
    {
        if(Auth::check())
        {
            return view('admin.course.add_course');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function InsertCourse(Request $request)
    {
        $validation = $request->validate([
            'name'  =>  'required',
        ]);
        if(Auth::check())
        {
            $course = new Course();
            $course->course_name = $request->input('name');
            $course->is_delete = 0;
            $course->save();
            return redirect()->route('ManageCourse')->with('status','course added successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //delete course
    public function DeleteCourse(Request $request)
    {
        $id = $request->input('user_id');
        if (Auth::check()) {
            $course = DB::table('course')->where('course_id','=',$id)->first();
            if ($course) {
               $record = DB::table('course')->where('course_id','=',$id)->update(['is_delete'=>1]);
                return redirect()->route('ManageCourse')->with('status','course deleted successfully...');
            }
            return redirect()->route('ManagerUsers')->with('status','user not find successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //Edit course
    public function EditCourse($id)
    {
        if(Auth::check())
        {
            $course = DB::table('course')->where('course_id','=',$id)->first();
            return view('admin.course.edit_course',compact('course'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function UpdateCourse(Request $request,$id)
    {   
        $validation = $request->validate([
            'course_name'   =>  'required'
        ]);
        if(Auth::check())
        {
            $course =Course::find($id);
            if($course)
            {
                $course->course_name = $request->input('course_name');
                $course->save();
                return redirect()->route('ManageCourse')->with('status','course added successfully...');
            }   
            return redirect()->route('ManagerUsers')->with('status','course not find successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //manage Skills module
    public function ManageSkills()
    {
        if(Auth::check())
        {
            $skills = Skills::paginate(5);
            return view('admin.skills.all_skill',compact('skills'));
        }
    }
    //add skill
    public function AddSkill()
    {
        if(Auth::check())
        {
            return view('admin.skills.add_skill');
        }
    }
    public function InsertSkill(Request $request)
    {
        $validation = $request->validate([
            'skill_name' => 'required',
        ]);
        if(Auth::check())
        {
            $skills = new Skills();
            $skills->skill_name = $request->input('skill_name');
            $skills->save();
            return redirect()->route('ManageSkills')->with('status','skill added successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //deleting skill
    public function deleteSkill($id)
    {
        if(Auth::check())
        {
            $skill = Skills::find($id);
            if($skill)
            {
                $skills =DB::table('skills')->where('skill_id','=',$id)->delete();
                if($skills)
                {
                    return redirect()->route('ManageSkills')->with('status','skill deleted successfully...');
                }
            }
            return redirect()->route('ManageSkills')->with('status','skill not deleted successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //editing skills
    public function editSkill($id)
    {
        if(Auth::check())
        {   
            $skill = Skills::find($id);
            if($skill)
            {
                return view('admin.skills.edit_skill',compact('skill'));
            }
            return redirect()->route('ManageSkills')->with('status','skill not found...');
        }   
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function UpdatingSkill(Request $request,$id)
    {
        $validation = $request->validate([
            'skill_name' => 'required'
        ]);
        if(Auth::check())
        {
            $skill = Skills::find($id);
            if($skill)
            {
                $skill->skill_name = $request->input('skill_name');
                $skill->save();
                return redirect()->route('ManageSkills')->with('status','skill updated successfully...');
            }
            return redirect()->route('ManageSkills')->with('status','skill not updated successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //view Feedback
    public function ViewFeedBack()
    {
        if(Auth::check())
        {
            $record = DB::table('feedback')
            ->join('users', 'feedback.user_id', '=', 'users.id')  
            ->select('feedback.*', 'users.email')  
            ->paginate(5);
            return view('admin.ViewFeedBack',compact('record'));
        }
    }
    //view contact inqury
    public function contact()
    {
        if(Auth::check())
        {
            $record = Contact::paginate(5);
            return view('admin.ViewContact',compact('record'));
        }
    }
    //ViewUserProfile
    public function ViewUserProfile($id)
    {
        if(Auth::check())
        {
            $user = DB::table('users')
            ->join('user_profiles','users.id','=','user_profiles.user_id')
            ->select('users.*','user_profiles.*')
                    ->where('users.id','=',$id)
                    ->first();
            //echo "<pre>";print_r($user);die;
            return view('admin.users.View_profile',compact('user'));
        }
    }
    //manage compnnies
    public function ManagerCompnies()
    {
       if(Auth::check())
       {
            $users = DB::table('users')->where('role_id','=','3')->paginate();
            return view('admin.company.all_company',compact('users'));
       }
    }
    public function deleteCompany(Request $request)
    {
        $id = $request->input('user_id');
        if (Auth::check()) {
            $user = User::find($id);
            $user_profile = DB::table('company_profiles')->where('user_id','=',$id)->delete();
            if ($user) {
                $user->delete();
                return redirect()->route('ManagerCompnies')->with('status','company deleted successfully...');
            }
            return redirect()->route('ManagerCompnies')->with('status','company not find successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function EditCompany($id)
    {
        if(Auth::check())
        {
            $user = DB::table('users')
                    ->join('company_profiles','users.id','=','company_profiles.user_id')
                    ->select('users.*','company_profiles.*')
                    ->where('users.id','=',$id)
                    ->first();
            if($user)
            {
                //echo "<pre>";print_r($user);die;
                return view('admin.company.EditCompany',compact('user'));
            }
            return redirect()->route('ManagerUsers')->with('status','company not find...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function Update_Company_Profile(Request $request,$id)
    {
        $validation = $request->validate([
            'name'  => 'required',
            'email' =>  'required',
            'contact'=>  'required|min:10',
            'description'=>'required|max:255',
            'registration_number'=>'required',
            'website_url' =>'required|max:255',
            'address'=> 'required|max:255',
            'num_of_emp'=>'required',
            'established_date' =>'required',
            'industry_type'=>'required' ,
            'count_id'=> 'required',
            'state_id'=>'required',
            'city_id'=>'required',
        ]);
        if(Auth::check())
        {
            if($id)
            {
                $user = DB::table('users')->where('id','=',$id)->update([
                    'name' => $request->name,
                    'email'=>$request->email
                ]);
                $update = DB::table('company_profiles')->where('user_id', '=', $id)->update([
                    'contact' => $request->contact,
                    'description'=>$request->description,
                    'registration_number'=>$request->registration_number,
                    'website_url' =>$request->website_url,
                    'address'=> $request->address,
                    'num_of_emp'=>$request->num_of_emp,
                    'established_date' =>$request->established_date,
                    'industry_type'=>$request->industry_type ,
                    'country_id'=> $request->count_id,
                    'state_id'=>$request->state_id,
                    'city_id'=>$request->city_id,
                ]);
                return redirect()->route('ManagerCompnies')->with('status',' profile updated successfully...');
            }
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //view company profile
    public function View_Company_Profile($id)
    {
        if(Auth::check())
        {
            $record = DB::table('users')
            ->join('company_profiles','users.id','=','company_profiles.user_id')
            ->select('users.*','company_profiles.*')
                    ->where('users.id','=',$id)
                    ->first();
            //echo "<pre>";print_r($user);die;
            return view('admin.company.View_company_profile',compact('record'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //manage job category module
    public function Manage_Job_Category()
    {
        if(Auth::check())
        {
            $record = DB::table('job_category')->paginate(5);
            return view('admin.job_category.all_job_category',compact('record'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function InsertJobCategory(Request $request)
    {
        if(Auth::check())
        {
            $validation = $request->validate([
                'name'  =>  'required',
            ]);
            $name = $request->input('name');
            $insert = DB::table('job_category')->insert([
                                'category_name' => $name
                            ]);
            if($insert)
            {
                return redirect()->route('ManageJobCategory')->with('status','Job Category Inserted successfully...');
            }
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function EditJobCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);
        if (Auth::check()) {
            $record = DB::table('job_category')->where('category_id', '=', $id)->first();
            
            if ($record) {
                $cat_name = $request->input('category_name');
                $updated = DB::table('job_category')
                            ->where('category_id', '=', $id)
                            ->update(['category_name' => $cat_name]);
                if ($updated) {
                    return redirect()->route('ManageJobCategory')->with('status', 'Job Category Updated successfully.');
                } else {
                    return redirect()->route('ManageJobCategory')->with('status', 'No changes were made.');
                }
            }

            return redirect()->route('ManageJobCategory')->with('status', 'Job Category not found.');
        }

        return redirect()->route('ManageSkills')->with('status', 'Unauthorized action.');
    }
    public function delete_job_category($id)
    {
        if(Auth::check())
        {
            $delete = DB::table('job_category')->where('category_id','=',$id)->delete();
            return redirect()->route('ManageJobCategory')->with('status', 'Job Deleted  successfully.');
        }
        return redirect()->route('ManageSkills')->with('status', 'Unauthorized action.');
    }
    //manage job department modules
    public function Manage_Job_Department()
    {
        if(Auth::check())
        {
            $record = DB::table('job_department')->paginate(5);
            return view('admin.job_department.all_job_department',compact('record'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function InsertJobDepartment(Request $request)
    {
        if(Auth::check())
        {
            $validation = $request->validate([
                'name'  =>  'required',
            ]);
            $name = $request->input('name');
            $insert = DB::table('job_department')->insert([
                                'department_name' => $name
                            ]);
            if($insert)
            {
                return redirect()->route('ManageJobDepartment')->with('status','Job Department Added successfully...');
            }
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function EditJobDepartment(Request $request, $id)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);
        if (Auth::check()) {
            $record = DB::table('job_department')->where('department_id', '=', $id)->first();
            
            if ($record) {
                $department_name = $request->input('category_name');
                $updated = DB::table('job_department')
                            ->where('department_id', '=', $id)
                            ->update(['department_name' => $department_name]);
                if ($updated) {
                    return redirect()->route('ManageJobDepartment')->with('status', 'Job Department Updated successfully.');
                } else {
                    return redirect()->route('ManageJobDepartment')->with('status', 'No changes were made.');
                }
            }

            return redirect()->route('ManageJobDepartment')->with('status', 'Job Department not found.');
        }

        return redirect()->route('ManageSkills')->with('status', 'Unauthorized action.');
    }
    public function delete_job_Department($id)
    {
        if(Auth::check())
        {
            $delete = DB::table('job_department')->where('department_id','=',$id)->delete();
            return redirect()->route('ManageJobDepartment')->with('status', 'Job Department Deleted  successfully.');
        }
        return redirect()->route('ManageSkills')->with('status', 'Unauthorized action.');
    }
    public function ManageJobs()
    {
        if(Auth::check())
        {
            $record = DB::table('job_upload')->paginate(5);
            $skills = Skills::all();
            $job_categorys = DB::table('job_category')->get();
            $job_departments = DB::table('job_department')->get();
            //echo "<pre>";print_r($record);die;
            return view('admin.jobs.all_jobs',compact('record','skills','job_categorys','job_departments'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function AddJob(Request $request)
    {
        // Validation rules
        $validation = $request->validate([
            'jobTitle'  => 'required',
            'jobDescription' =>  'required',
            'jobNumber'=>  'required',
            'jobExperience'=>'required|max:255',
            'skill_id'=>'required',
            'jobStatus' =>'required|max:255',
            'jobWorkingHour'=> 'required|max:255',
            'jobPostDate'=>'required',
            'jobCloseDate' =>'required',
            'jobContactEmail'=>'required',
            'jobCategory' =>'required',
            'jobDepartment' =>'required',
            'count_id'=> 'required',
            'state_id'=>'required',
            'city_id'=>'required',
        ]);

        if(Auth::check())
        {
            $company_id = Auth::user()->id;
            $skills = implode(",", $request->input('skill_id'));
            //dd($request->all());die;
            $record = DB::table('job_upload')->insert([
                'title' => $request->input('jobTitle'),
                'description' => $request->input('jobDescription'),
                'num_of_vacany' => $request->input('jobNumber'),
                'experience' => $request->input('jobExperience'),
                'job_skill_required' => $skills, 
                'status' => $request->input('jobStatus'),
                'j_active' => 0,
                'job_working_hour' => $request->input('jobWorkingHour'),
                'posted_date' => $request->input('jobPostDate'),
                'closing_date' => $request->input('jobCloseDate'),
                'ContactEmail' => $request->input('jobContactEmail'),
                'company_id' => $company_id, 
                'category_id' => $request->input('jobCategory'),
                'department_id' => $request->input('jobDepartment'), 
                'country_id' => $request->input('count_id'), 
                'state_id' => $request->input('state_id'), 
                'city_id' => $request->input('city_id'), 
            ]);

            // Redirect with success message
            return redirect()->route('MangeJobs')->with('status', 'Job Added Successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //edit job controller
    public function EditJob(Request $request)
    {
        $rules = [
            'EditJobTitle' => 'required|max:255',
            'EditjobDescription' => 'required|max:1000',
            'EditjobNumber' => 'required',
            'EditjobExperience' => 'required|max:255',
            'Editskill_id' => 'required', 
            'EditjobStatus' => 'required|',
            'EditjobWorkingHour' => 'required',
            'EditjobPostDate' => 'required',
            'EditjobCloseDate' => 'required',
            'EditjobContactEmail' => 'required',
            'EditjobCategory' => 'required',
            'EditjobDepartment' => 'required',
            'Editcount_id' => 'required',
            'Editstate_id' => 'required',
            'Editcity_id' => 'required',
        ];
    
        if(Auth::check())
        {   
            $id = $request->input('edit_job_id');
            $skills = implode(",", $request->input('Editskill_id'));
            $record = DB::table('job_upload')->where('job_id','=',$id)
                        ->update([
                            'title' => $request->input('EditJobTitle'),
                            'description' => $request->input('EditjobDescription'),
                            'num_of_vacany' => $request->input('EditjobNumber'),
                            'experience' => $request->input('EditjobExperience'),
                            'job_skill_required' => $skills, 
                            'status' => $request->input('EditjobStatus'),
                            'job_working_hour' => $request->input('EditjobWorkingHour'),
                            'posted_date' => $request->input('EditjobPostDate'),
                            'closing_date' => $request->input('EditjobCloseDate'),
                            'ContactEmail' => $request->input('EditjobContactEmail'),
                            'category_id' => $request->input('EditjobCategory'),
                            'department_id' => $request->input('EditjobDepartment'), 
                            'country_id' => $request->input('Editcount_id'), 
                            'state_id' => $request->input('Editstate_id'), 
                            'city_id' => $request->input('Editcity_id'), 
                        ]);
            return redirect()->route('MangeJobs')->with('status', 'Job Updated Successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //delete job 
    public function DeleteJob(Request $request)
    {
        if(Auth::check())
        {
            $id = $request->input('job_id');
            $record = DB::table('job_upload')->where('job_id','=',$id)->delete();
            return redirect()->route('MangeJobs')->with('status', 'Job Deleted Successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //manage job application
    public function ViewAllJobApplication()
    {
        if(Auth::check())
        {
            $record = DB::table('job_applied as ja')
                        ->join('job_upload as ju', 'ju.job_id', '=', 'ja.job_id')
                        ->join('users', 'users.id', '=', 'ja.user_id')
                        ->join('user_profiles', 'user_profiles.user_id', '=', 'ja.user_id')
                        ->select(
                            'users.name as candidate_name',      
                            'users.email as candidate_email',    
                            'user_profiles.contact as candidate_contact',
                            'ju.title',
                            'ja.experince',          
                            'ja.app_id',             
                            'ja.resume',              
                            'ja.application_date',               
                            'ja.msg',                           
                            'ja.application_status' ,             
                        )
                        ->paginate(5);
            //echo "<pre>";print_r($record);die;
            return view('admin.job_application.all_job_application',compact('record'));
        }
    }
    //view single job application
    public function ViewJobApplication($id)
    {
        if(Auth::check())
        {
            $record = DB::table('job_applied as ja')
                        ->join('job_upload as ju', 'ju.job_id', '=', 'ja.job_id')
                        ->join('users', 'users.id', '=', 'ja.user_id')
                        ->join('user_profiles', 'user_profiles.user_id', '=', 'ja.user_id')
                        ->where('ja.app_id', '=', $id)
                        ->select(
                            'users.name as candidate_name',      
                            'users.email as candidate_email',    
                            'user_profiles.contact as candidate_contact',
                            'ja.experince',          
                            'ja.app_id',             
                            'ja.resume',              
                            'ja.application_date',               
                            'ja.msg',                           
                            'ja.application_status' ,             
                        )
                        ->first();
            //echo "<pre>";print_r($record);die;
            return view('admin.job_application.View_job_application',compact('record'));
        }
    }
    //edit job application 
    public function EditApplication(Request $request)
    {
        $validation = $request->validate([
            'status' => 'required'
        ]);
        if(Auth::check())
        {
            $id = $request->input('app_id');
            $status = $request->input('status');
            $record = DB::table('job_applied')->where('app_id','=',$id)
                                             ->update([
                                                'application_status' => $status
                                             ]);
                                            
            // Now, fetch the user associated with this job application
                $jobApplied = DB::table('job_applied')
                ->join('users', 'job_applied.user_id', '=', 'users.id')
                ->where('job_applied.app_id', '=', $id)
                ->select('users.email', 'job_applied.job_id','users.name')
                ->first();
                $name = $jobApplied->name;
            
            // If a user is found, send the email
            if ($jobApplied) {
                // Get the job details if needed for the email
                $job = DB::table('job_upload')->where('job_id', '=', $jobApplied->job_id)->first();
                $title = $job->title;
                $status = $request->input('status');
                // Send email
                $email = $jobApplied->email;
                Mail::to($email)->send(new StatusMail($title,$status,$name));
                
            }
            return redirect()->route('Job-Applications')->with('status','Job Application Status Updated...');
        
        }
    }
}
