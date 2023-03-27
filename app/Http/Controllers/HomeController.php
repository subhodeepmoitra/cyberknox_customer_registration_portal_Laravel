<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProductRegistrationData;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        //return view('dashboard');
    }

    public function RegistrationViewIndex(){
        return view ('user_product_registration');
    }

    public function UserProductRegistration(Request $request){
        $data = UserProductRegistrationData::create($request->all());
        return redirect('/home')->with('success', "Product registration details sent successfully.");
    }
}
