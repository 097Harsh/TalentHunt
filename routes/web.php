<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Models\CompanyProfile;
use App\Http\Controllers\ZoomMeetingController;
use App\Models\User;

Route::get('/',[UserController::class,'home'])->name('home');
Route::get('/about',[UserController::class,'about'])->name('about');
Route::get('/contact',[UserController::class,'contact'])->name('contact');
//store contact detials
Route::post('/storeContact',[UserController::class,'storeContact'])->name('storeContact');

//User side URL's
Route::get('/userProfile',[UserController::class,'userProfile'])->middleware(['auth', 'verified'])->name('userProfile');
Route::post('/UpdateProfile',[UserController::class,'UpdateProfile'])->middleware(['auth', 'verified'])->name('UpdateProfile');
//for fetching record for country,state, and city using ajax URL's
Route::get('/get_country',[UserController::class,'get_country'])->name('get_country');
//for fetching state
Route::get('/get_state',[UserController::class,'get_state'])->name('get_state');
//for fetching city
Route::get('/get_city',[UserController::class,'get_city'])->name('get_city');
//feedback 
Route::get('/feedback',[UserController::class,'feedback'])->middleware(['auth', 'verified'])->name('feedback');
Route::post('/store_feedback',[UserController::class,'store_feedback'])->middleware(['auth', 'verified'])->name('store_feedback');
//all jobs module for user side
Route::get('/AllJobs',[UserController::class,'AllJobs'])->middleware(['auth', 'verified'])->name('AllJobs');
//more details view of job
Route::get('/MoreDetailsJob/{id}',[UserController::class,'MoreDetailJob'])->middleware(['auth', 'verified'])->name('MoreDetailsJob');
//search job functionality
Route::post('/search',[UserController::class,'search'])->middleware(['auth', 'verified'])->name('search');
//job apply modul
Route::post('/AppliedJob',[UserController::class,'Job_Applied'])->middleware(['auth', 'verified'])->name('AppliedJob');
//My job module
Route::get('/MyJobs',[UserController::class,'MyJobs'])->middleware(['auth', 'verified'])->name('MyJobs');



//Admin URl
Route::get('/dashboard',[AdminController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/ManagerUsers',[AdminController::class,'managerUsers'])->middleware(['auth', 'verified'])->name('ManagerUsers');
//view user profile page
Route::get('/ViewUserProfile/{id}',[AdminController::class,'ViewUserProfile'])->middleware(['auth', 'verified'])->name('ViewUserProfile');
//delete user URL
Route::post('/delete_user/{id}', [AdminController::class, 'deleteUser'])->middleware(['auth', 'verified'])->name('deleteUser');
//edit user  URl
Route::get('/edit_user/{id}',[AdminController::class,'editUser'])->middleware(['auth', 'verified'])->name('EditUser');
//updating record
Route::post('/update_user/{id}',[AdminController::class,'updateUser'])->middleware(['auth', 'verified'])->name('updateUser');
//Manage Course Module
Route::get('/ManageCourse',[AdminController::class,'ManageCourse'])->middleware(['auth', 'verified'])->name('ManageCourse');
Route::get('/AddCourse',[AdminController::class,'AddCourse'])->middleware(['auth', 'verified'])->name('AddCourse');
Route::post('/InsertCourse',[AdminController::class,'InsertCourse'])->middleware(['auth', 'verified'])->name('InsertCourse');
//delte course
Route::post('/delete_course/{id}', [AdminController::class, 'deleteCourse'])->middleware(['auth', 'verified'])->name('DeleteCourse');
//edit course
Route::get('/edit_course/{id}',[AdminController::class,'EditCourse'])->middleware(['auth', 'verified'])->name('EditCourse');
Route::post('/UpdateCourse/{id}',[AdminController::class,'UpdateCourse'])->middleware(['auth', 'verified'])->name('UpdateCourse');
//Manage skills module
Route::get('/ManageSkills',[AdminController::class,'ManageSkills'])->middleware(['auth', 'verified'])->name('ManageSkills');
Route::get('/AddSkill',[AdminController::class,'AddSkill'])->middleware(['auth', 'verified'])->name('AddSkill');
Route::post('/InsertSkill',[AdminController::class,'InsertSkill'])->middleware(['auth', 'verified'])->name('InsertSkill');
//delete skills
Route::post('/delete_skill/{id}', [AdminController::class, 'deleteSkill'])->middleware(['auth', 'verified'])->name('deleteSkill');
//editing skill
Route::get('/EditSkill/{id}',[AdminController::class,'editSkill'])->middleware(['auth', 'verified'])->name('EditSkill');
Route::post('/updatingRecord/{id}',[AdminController::class,'UpdatingSkill'])->middleware(['auth', 'verified'])->name('UpdatingSkill');
//view feedback 
Route::get('ViewFeedBack',[AdminController::class,'ViewFeedBack'])->middleware(['auth', 'verified'])->name('ViewFeedBack');
Route::post('/ApplyFilter',[AdminController::class,'filter_feedback'])->middleware(['auth', 'verified'])->name('ApplyFilter');
//view contact
Route::get('/ViewContact',[AdminController::class,'contact'])->middleware(['auth', 'verified'])->name('ViewContact');
//Manage company
Route::get('/ManagerCompnies',[AdminController::class,'ManagerCompnies'])->middleware(['auth', 'verified'])->name('ManagerCompnies');
Route::post('/deleteCompany/{id}',[AdminController::class,'deleteCompany'])->middleware(['auth', 'verified'])->name('deleteCompany');
Route::get('/EditCompany/{id}',[AdminController::class,'EditCompany'])->middleware(['auth', 'verified'])->name('EditCompany');
Route::post('/Update_Company_Profile/{id}',[AdminController::class,'Update_Company_Profile'])->middleware(['auth', 'verified'])->name('Update_Company_Profile');
Route::get('/View_Company_Profile/{id}',[AdminController::class,'View_Company_Profile'])->middleware(['auth', 'verified'])->name('View_Company_Profile');
//category module
Route::get('/ManageJobCategory',[AdminController::class,'Manage_Job_Category'])->middleware(['auth', 'verified'])->name('ManageJobCategory');
//add job_Category name usign pop-up so that's way use directly post method
Route::post('/InsertJobCategory',[AdminController::class,'InsertJobCategory'])->middleware(['auth','verified'])->name('InsertJobCategory');
//edit job_Category name usign pop-up so that's way use directly post method
Route::post('/EditJobCategory/{id}',[AdminController::class,'EditJobCategory'])->middleware(['auth','verified'])->name('EditJobCategory');
//delete
Route::post('/delete_job_category/{id}',[AdminController::class,'delete_job_category'])->middleware(['auth','verified'])->name('delete_job_category');
//job department module
Route::get('/ManageJobDepartment',[AdminController::class,'Manage_Job_Department'])->middleware(['auth', 'verified'])->name('ManageJobDepartment');
//add job_Category name usign pop-up so that's way use directly post method
Route::post('/InsertJobDepartment',[AdminController::class,'InsertJobDepartment'])->middleware(['auth','verified'])->name('InsertJobDepartment');
//edit job_Category name usign pop-up so that's way use directly post method
Route::post('/EditJobDepartment/{id}',[AdminController::class,'EditJobDepartment'])->middleware(['auth','verified'])->name('EditJobDepartment');
//delete
Route::post('/delete_job_Department/{id}',[AdminController::class,'delete_job_Department'])->middleware(['auth','verified'])->name('delete_job_Department');
//manage jobs
Route::get('/MangeJobs',[AdminController::class,'ManageJobs',])->middleware(['auth', 'verified'])->name('MangeJobs');
Route::post('/AddJobs',[AdminController::class,'AddJob'])->middleware(['auth', 'verified'])->name('AddJobs');
Route::post('/EditJobs',[AdminController::class,'EditJob'])->middleware(['auth', 'verified'])->name('EditJobs');
Route::post('/delete_jobs',[AdminController::class,'DeleteJob'])->middleware(['auth', 'verified'])->name('delete_jobs');
//manage job application
Route::get('Job-Applications',[AdminController::class,'ViewAllJobApplication'])->middleware(['auth', 'verified'])->name('Job-Applications');
Route::get('/view_job_application/{id}', [AdminController::class, 'ViewJobApplication'])->name('view_job_application');
Route::post('/Edit-Job-Application',[AdminController::class,'EditApplication'])->middleware(['auth', 'verified'])->name('Edit-Job-Application');
//View all interview log....
Route::get('/AllInterview',[AdminController::class,'AllInterview'])->middleware(['auth', 'verified'])->name('AllInterview');




//company side URL
Route::get('/CompanyDashboard',[CompanyController::class,'dashboard'])->middleware(['auth', 'verified'])->name('CompanyDashboard');
Route::get('/CompanyProfile',[CompanyController::class,'MyProfile'])->middleware(['auth', 'verified'])->name('CompanyProfile');
Route::get('/EditCompanyProfile',[CompanyController::class,'EditCompanyProfile'])->middleware(['auth', 'verified'])->name('EditCompanyProfile');
Route::post('/UpdateCompanyProfile',[CompanyController::class,'UpdateCompanyProfile'])->middleware(['auth', 'verified'])->name('UpdateCompanyProfile');
//manage job module
Route::get('/MangeJob',[CompanyController::class,'ManageJob',])->middleware(['auth', 'verified'])->name('MangeJob');
Route::post('/AddJob',[CompanyController::class,'AddJob'])->middleware(['auth', 'verified'])->name('AddJob');
Route::post('/EditJob',[CompanyController::class,'EditJob'])->middleware(['auth', 'verified'])->name('EditJob');
Route::post('/delete_job',[CompanyController::class,'DeleteJob'])->middleware(['auth', 'verified'])->name('delete_job');
//manage job applied as application
Route::get('/JobApplication',[CompanyController::class,'ManageJobApplication'])->middleware(['auth', 'verified'])->name('JobApplication');
//view job application route
Route::get('/ViewJobApplication/{id}',[CompanyController::class,'ViewJobApplication'])->middleware(['auth', 'verified'])->name('ViewJobApplication');
//edit job application status
Route::post('/EditJobApplication',[CompanyController::class,'EditJobApplication'])->middleware(['auth', 'verified'])->name('EditJobApplication');
//download resume
Route::post('/DownloadResume',[CompanyController::class,'DownloadResume'])->middleware(['auth', 'verified'])->name('DownloadResume');
//feedback page
Route::get('/CompanyFeedback',[CompanyController::class,'CompanyFeedback'])->middleware(['auth', 'verified'])->name('CompanyFeedback');
Route::post('/GetCompanyFeedback',[CompanyController::class,'GetCompanyFeedback'])->middleware(['auth', 'verified'])->name('GetCompanyFeedback');
//Manage Interview
Route::get('/ManageInterview',[CompanyController::class,'AllInterview'])->middleware(['auth', 'verified'])->name('ManageInterview');


//meeting link demo
Route::post('/zoom/create-meeting', [ZoomMeetingController::class, 'createMeeting'])->middleware(['auth', 'verified'])->name('CreateMeeting');
//interview status route
Route::get('/interview-status/{id}',[CompanyController::class,'interview_status'])->middleware(['auth', 'verified'])->name('InterviewStatus');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
