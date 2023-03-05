<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Crypt;
use DB;

class UserRegistration extends Controller
{
    public function index(){
        return view ('user_register');
    }

    public function register(Request $request){
        $userModel = new Customers;
        $data=$userModel->addUser($request->all());
        $response['message']="User registration successful";
    }

    public function userLogin(Request $request){
        $user = customers::where('email', $request->input('email'))->get();
        if (Crypt::decrypt($user[0]->password)==$request->input('password')){
            $request -> session() -> put('user', $user[0] -> name);
            return view ('user_home');
        }
    }

}
