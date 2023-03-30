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

Route::get('/product_registration', [App\Http\Controllers\HomeController::class, 'RegistrationViewIndex']);

Route::match(['get','post'], '/productRegistration', [App\Http\Controllers\HomeController::class, 'UserProductRegistration']);

//test view
Route::get('/test', function () {
    return view ('admin.home');
});
