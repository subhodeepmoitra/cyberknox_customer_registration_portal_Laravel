<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Crypt;

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
        $user->password = Crypt::encrypt($request->password);
        $user->save();
        return redirect('user_login')->with('status', 'User has been registered');
    }

    public function userLogin(Request $request){
        $user = customers::where('email', $request->input('email'))->get();
        if (Crypt::decrypt($user[0]->password)==$request->input('password')){
            $request -> session() -> put('user', $user[0] -> name);
            return view ('user_home');
        }
    }

}
