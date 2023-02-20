<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class UserRegistration extends Controller
{
    public function index(){
        return view ('user_register');
    }

    public function register(Request $request){
        $user = new customers;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->save();
        return redirect('user_login')->with('status', 'User has been registered');
    }

    public function userLogin(Request $request){

    }

}
