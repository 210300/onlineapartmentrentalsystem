<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RevalidateBackHistory;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\DependencyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\CauseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\OwnerBookingController;
use App\Http\Controllers\OwnerComplainController;
use App\Http\Livewire\Filter;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//homepage
Route::get('/',[welcomeController::class,'index']);


Route::get('/search',[welcomeController::class,'search']);
Route::get('/viewdetails/{id}',[welcomeController::class,'show']);

	Auth::routes(['verify' => true]);

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>['auth','admin','revalidate']],function(){
Route::get('/admin.admindashboard', function () {
    return view('admin.admindashboard');
    Route::get('profile', [UserController::class,'profile'])->middleware('authentication');
Route::post('profile',[UserController::class,'updateavatar'])->middleware('authentication');
Route::get('admin.profile', [UserController::class,'adminprofile'])->middleware('authentication');
Route::post('admin.profile',[UserController::class,'adminupdateavatar'])->middleware('authentication');
Route::get('tenant.profile', [UserController::class,'tenantprofile'])->middleware('authentication');
Route::post('tenant.profile',[UserController::class,'tenantupdateavatar'])->middleware('authentication');

 Route::get('/role-register', [Filter::class, 'registered'])->middleware('authentication');
 Route::get('/role-edit/{id}',[AdminDashboardController::class, 'registeredit'])->middleware('authentication');
 Route::put('/role-register-update/{id}',[AdminDashboardController::class, 'registerupdate'])->middleware('authentication');
 Route::delete('/role-delete/{id}',[AdminDashboardController::class, 'registerdelete'])->middleware('authentication');


});
//working in profile
 Route::Post('/owneradd',[OwnerController::class, 'register'])->middleware('authentication');
 Route::get('/view-owner',[OwnerController::class, 'ownerindex'])->middleware('authentication');
 Route::get('/admin.adminviewa', [AdminDashboardController::class, 'adminviewa'])->middleware('authentication'); 
 
 Route::get('view-owner/getGewog/{id}',[OwnerController::class,'getGewog'])->middleware('authentication');

 Route::get('/admin.viewowner', [AdminDashboardController::class, 'ownerregistered'])->middleware('authentication'); 
 Route::delete('/owner-delete/{id}',[AdminDashboardController::class, 'ownerdelete'])->middleware('authentication');
 Route::get('/admin.owneredit/{id}',[AdminDashboardController::class, 'owneredit'])->middleware('authentication');
 Route::get('adminadelete/{id}',[AdminDashboardController::class,'adminviewdelete'])->middleware('authentication');


 //owner
//  Route::get('apartment','App\Http\Controllers\ApartmentController@getDzongkhag')->name('apartment');
// Route::get('apartment/getgewog/{id}','App\Http\Controllers\ApartmentController@getgewog');
 Route::get('Owner.ownerdashboard',[ApartmentController::class,'dashboard'])->middleware('authentication');
 Route::get('apartment',[ApartmentController::class,'index'])->middleware('authentication');
Route::post('/save',[ApartmentController::class, 'store'])->middleware('authentication');
 Route::get('Owner.viewapartment/',[ApartmentController::class,'show'])->middleware('authentication');
 Route::get('/apartment/{id}',[ApartmentController::class,'edit'])->middleware('authentication');
 Route::put('update/{id}',[ApartmentController::class,'update'])->middleware('authentication');
 Route::get('apartmentdelete/{id}',[ApartmentController::class,'destory'])->middleware('authentication');
Route::get('Owner.ownerdashboard',[ApartmentController::class, 'dashboard'])->middleware('authentication');
Route::get('viewbooking',[ApartmentController::class, 'get'])->middleware('authentication');

 //dzongkhag and gewog
 Route::Post('/save-dzongkhag',[AdminDashboardController::class, 'Dstore'])->middleware('authentication');
 Route::get('admin.dzongkhag',[AdminDashboardController::class,'Dindex'])->middleware('authentication');
 Route::get('admin.viewdzongkhag',[AdminDashboardController::class,'dzongkhagview'])->middleware('authentication');
 Route::get('/dzongkhagedit/{id}',[AdminDashboardController::class,'dzongkhagedit'])->middleware('authentication');
 Route::put('dzongkhagupdate/{id}',[AdminDashboardController::class,'dzongkhagupdate'])->middleware('authentication');
 Route::get('deletedzongkhag/{id}',[AdminDashboardController::class,'dzongkhagdelete'])->middleware('authentication');
 Route::Post('/save-gewog',[AdminDashboardController::class, 'Gstore'])->middleware('authentication');
 Route::get('admin.gewog',[AdminDashboardController::class,'Gindex'])->middleware('authentication');
 Route::get('admin.viewgewog',[AdminDashboardController::class,'gewogview'])->middleware('authentication');
 Route::get('/gewogedit/{id}',[AdminDashboardController::class,'gewogedit'])->middleware('authentication');
 Route::put('gewogupdate/{id}',[AdminDashboardController::class,'gewogupdate'])->middleware('authentication');
 Route::get('delete/{id}',[AdminDashboardController::class,'gewogdelete'])->middleware('authentication');

   //changepassword
Route::get('change-password',[ChangePasswordController::class,'index'])->middleware('authentication');
Route::post('change-password',[ChangePasswordController::class,'store'])->name('change.password')->middleware('authentication');
Route::get('admin.changepassword',[ChangePasswordController::class,'adminindex'])->middleware('authentication');
Route::post('admin.changepassword',[ChangePasswordController::class,'adminstore'])->name('change.password')->middleware('authentication');
Route::get('tenant.changepassword',[ChangePasswordController::class,'tenantindex'])->middleware('authentication');
Route::post('tenant.changepassword',[ChangePasswordController::class,'tenantstore'])->name('change.password')->middleware('authentication');
    
//tenant
Route::get('tenant.tenantdashboard',[TenantController::class,'index'])->middleware('authentication');
    });
  

//feedback 
Route::get('/feedback',[FeedbackController::class, 'feedbackinadmin'])->middleware('authentication');
Route::Post('/save-feedback',[FeedbackController::class, 'store'])->middleware('authentication');

//for dependency 
Route::get('dropdown',[DependencyController::class,'getDzongkhag'])->middleware('authentication');
Route::get('dropdown/getgewog/{id}',[DependencyController::class,'getGewog'])->middleware('authentication');


//booking
Route::get('/bookings', [App\Http\Controllers\BookingController::class,'index'])->middleware('authentication');
Route::post('/done',[App\Http\Controllers\BookingController::class,'store'])->middleware('authentication');
Route::get('/viewBookings',[App\Http\Controllers\OwnerBookingController::class,'index'])->middleware('authentication');
Route::get('/viewshow/{id}',[App\Http\Controllers\OwnerBookingController::class,'show'])->middleware('authentication');
Route::get('/edit/{id}',[App\Http\Controllers\OwnerBookingController::class,'edit'])->middleware('authentication');
Route::put('/viewBooking/{id}',[App\Http\Controllers\OwnerBookingController::class,'update'])->middleware('authentication');
Route::get('/viewBookings/{id}',[App\Http\Controllers\OwnerBookingController::class,'destroy'])->name('Owner.booking.delete')->middleware('authentication');

Route::get('/verifyowner',[OwnerController::class,'verifyUser'])->name('verify.user')->middleware();


Route::get('/test', function () {
    return view('test');
});


//complain
Route::get('complain',[ComplainController::class,'index'])->middleware('authentication');
Route::post('store/complain',[ComplainController::class,'store'])->name('store.complain')->middleware('authentication');
Route::get('view/complain',[OwnerComplainController::class,'index'])->middleware('authentication');
Route::get('showcomplain/{id}',[OwnerComplainController::class,'show'])->middleware('authentication');
Route::get('delete/{id}',[OwnerComplainController::class,'destory'])->middleware('authentication');


Route::get('/admin.adminregister', function () {
    return view('admin.adminregister');
});


