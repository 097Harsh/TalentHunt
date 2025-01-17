<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    //
    public function dashboard()
    {
        //echo Auth::user()->name;
        if(Auth::check())
        {
            return view('company.dashboard');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //update company profile
    public function MyProfile()
    {
        if(Auth::check())
        {
            $id = Auth::user()->id;
            $record = DB::table('users')
                        ->join('company_profiles','users.id','=','company_profiles.user_id')
                        ->select('users.*','company_profiles.*')
                        ->where('users.id','=',$id)
                        ->first();
            
            return view('company.MyProfile',compact('record'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function EditCompanyProfile()
    {
        if(Auth::check())
        {
            $id = Auth::user()->id;
            $user =  DB::table('users')
                    ->join('company_profiles','users.id','=','company_profiles.user_id')
                    ->select('users.*','company_profiles.*')
                    ->where('users.id','=',$id)
                    ->first();
            return view('company.EditCompanyProfile',compact('user'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    public function UpdateCompanyProfile(Request $request)
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
            $id = Auth::user()->id;
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
                return redirect()->route('CompanyProfile')->with('status',' profile updated successfully...');
            }
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //manage job module
    public function ManageJob()
    {
        if(Auth::check())
        {
            $id = Auth::user()->id;
            $record = DB::table('job_upload')->where('company_id','=',$id)->paginate(5);
            $skills = Skills::all();
            $job_categorys = DB::table('job_category')->get();
            $job_departments = DB::table('job_department')->get();
            //echo "<pre>";print_r($record);die;
            return view('company.jobs.all_jobs',compact('record','skills','job_categorys','job_departments'));
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    //add job
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
            return redirect()->route('MangeJob')->with('status', 'Job Added Successfully...');
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
            return redirect()->route('MangeJob')->with('status', 'Job Updated Successfully...');
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
            return redirect()->route('MangeJob')->with('status', 'Job Deleted Successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }
    
}
