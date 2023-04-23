<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistration;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/{name}', function($name = null){
$data = compact('name');
return view('demo')->with($data);
});
*/

Route::group(['middleware' => "web"], function () {
});

Route::get('/', function () {
    return view('index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->middleware('is_admin'); //route for IsAdmin check

Route::get('/product_registration', [App\Http\Controllers\UserProductRegistrationController::class, 'RegistrationViewIndex']); //for error change to HomeController

Route::get('/issue_ticket', [App\Http\Controllers\UserProductRegistrationController::class, 'IssueTicketViewIndex']); //for error change to HomeController

Route::match(['get','post'], '/productRegistration', [App\Http\Controllers\UserProductRegistrationController::class, 'UserProductRegistration']); //for error change to HomeController

Route::get('/admin/home/issue_tickets', [App\Http\Controllers\HomeController::class, 'View_Admin_Issue_Ticket'])->middleware('is_admin');

Route::get('/view_registration_details/{id}', [App\Http\Controllers\show_Registration_Details_Controller::class, 'Registrastion_details_for_client']);

Route::get('/admin/home/view_registration/{id}', [App\Http\Controllers\admin\Admin_view_registration::class, 'Admin_view_registration_index']);

//test view
Route::get('/test', function () {
    return view ('auth/loginindex');
});
