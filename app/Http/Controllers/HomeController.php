<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
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
        $users = DB::table('user_product_registration_data')->select('invoice','fname','lname','email','phone','registrationStatus')
                            ->where('email', Auth::user()->email)->get();
        return view('home', compact('users'));
    }

    public function RegistrationViewIndex(){
        return view ('user_product_registration');
    }

    public function UserProductRegistration(Request $request){
        $requestData = $request->all();
        $invoice = time().$request->file('invoice')->getClientOriginalName();
        $path = $request->file('invoice')->storeAs('invoice',$invoice,'public');
        $upload_path = 'invoice/';
        $requestData["invoice"] = $upload_path.$invoice;
        
        $data = UserProductRegistrationData::create($requestData);
        return redirect('/home')->with('success', "Product registration details sent successfully.");
    }
}
