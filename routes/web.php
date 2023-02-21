<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistration;

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

Route::group(['middleware'=>"web"], function(){

});

Route::get('/', function () {
    return view ('index');
});

Route::get('/user_register_index', [UserRegistration::class,'index']);

Route::post('/user_registration', [UserRegistration::class, 'register']);

Route::get('/user_login_page', function(){
    return view ('user_login');
});

/*
Route::get('/user_home', function () {
    return view ('user_home');
});
*/

Route::get('/user_login', [UserRegistration::class, 'userLogin']);
