<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Role;
use App\Models\UserProfile;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::where('role_id','!=','1')->get();
        return view('auth.register',compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required | min:6',
            'confirm_password' => 'required|same:password',
            'role_id' => ['required'],
            'contact' => 'required | min:10',
            'count_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
        ]);
        $role_id = $request->role_id;
        
        if($role_id == '2')
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
            ]);
            $user_id = $user->id;
            $user_profile = new UserProfile();
            $user_profile->user_id = $user_id;
            $user_profile->contact = $request->contact;
            $user_profile->country_id = $request->count_id;
            $user_profile->state_id = $request->state_id;
            $user_profile->city_id = $request->city_id;
            $user_profile->objective = '';
            $user_profile->resume_file ='';
            $user_profile->user_image = '';
            $user_profile->designation = '';
            $user_profile->address = '';
            
            $user_profile->save();
        }
        elseif($role_id == 3)
        {$user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        
        $user_id = $user->id;
        $company_profile = new CompanyProfile();
        $company_profile->user_id = $user_id;
        $company_profile->contact = $request->contact;
        $company_profile->country_id = $request->count_id;
        $company_profile->state_id = $request->state_id;
        $company_profile->city_id = $request->city_id;
        $company_profile->description =  ''; 
        $company_profile->website_url = '';
        $company_profile->industry_type =  ''; 
        $company_profile->address =  '';  
        $company_profile->registration_number =  null; 
        $company_profile->established_date =  null; 
        $company_profile->num_of_emp = null; 
        $company_profile->save();
        

        }
        return redirect()->route('login')->with('status','Registeration successfully...');
    }
}
