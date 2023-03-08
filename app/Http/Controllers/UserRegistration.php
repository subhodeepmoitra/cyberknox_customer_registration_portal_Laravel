<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

use DB;

class UserRegistration extends Controller
{
    public function index()
    {
        return view('user_register');
    }

    public function register(Request $request)
    {
        // $userModel = new customers();
        // $userData = $userModel->getUser($request->email);
        // if (count([$userData]) == 0) {
        //     $data = $userModel->addUser($request->all());
        //     $response['message'] = 'User registration successful';
        //     $response['data'] = $request->all();
        //     return redirect()
        //         ->back()
        //         ->with('UserRegistrationSuccess', 'Registration Successful');
        // } else {
        //     $response['status'] = 0;
        //     $response['message'] = 'Email Already Exist';
        //     return redirect()
        //         ->back()
        //         ->with('EmailExist', 'Email Already Exist');
        // }

        $userModel = new customers();
        //$user = customers::where('email', '=', customers::get('email'))->first();
        $email = $request->email;
        $userEmailDetails = customers::where('email', '=', $email)->first();
        if ($userEmailDetails === null) {
            // user doesn't exist
                $data = $userModel->addUser($request->all());
                $response['message'] = 'User registration successful';
                $response['data'] = $request->all();
                return redirect()
                     ->back()
                     ->with('UserRegistrationSuccess', 'Registration Successful');
        } else {
            $response['message'] = 'Email Exists';
            return redirect()
                     ->back()
                     ->with('UserRegistrationSuccess', 'Registration Successful');
        }

        // $userModel = new Customers;
        // $data = $userModel->addUser($request->all());
        // $response['message'] = "User registration successful";
        // $response['data'] = $request->all();
        // return redirect()->back()->with('UserRegistrationSuccess', 'Registration Successful');
    }

    public function userLogin(Request $request)
    {
    }
}
