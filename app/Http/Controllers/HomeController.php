<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\UserProductRegistrationData;
use App\Models\Customer_registration_type;
use App\Models\User_Product_Issue_Tickets;

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
        //client home page
        $users = DB::table('user_product_registration_data')->select('id', 'invoice','fname','lname','email','phone','registrationStatus','created_at')
                            ->where('email', Auth::user()->email)->latest()->paginate(2);
        $issues = DB::table('user__product__issue__tickets')->select('invoice','fname','lname','email','phone','Ticket_Status','created_at')
                            ->where('email', Auth::user()->email)->latest()->paginate(2);
        $Registrationtype = DB::table('customer_registration_types')->select('email','type')->get();
        return view('home', compact('users', 'Registrationtype', 'issues'));
    }

    public function adminHome(){
        //admin home
        $users = DB::table('user_product_registration_data')->select('id','invoice','fname','lname','email','phone','registrationStatus','created_at')->latest()->paginate(5);
        $Registrationtype = DB::table('customer_registration_types')->select('email','type')->get();
        return view ('adminHome', compact('users'));
    }

    public function View_Admin_Issue_Ticket(){
        //admin section view issue
        $issues = DB::table('user__product__issue__tickets')->select('invoice','fname','lname','email','phone','Ticket_Status','created_at')->latest()->paginate(5);
        return view('adminHomeIssueTickets', compact('issues'));
    }



    public function RegistrationViewIndex(){
        //user product registration view return
        return view ('user_product_registration');
    }

    public function IssueTicketViewIndex(){
        //client user issue ticket raising view return
        return view ('adminHomeIssueTickets', compact('Client_issues'));
    }


    public function UserProductRegistration(Request $request){
        $requestData = $request->all();
        $invoice = time().$request->file('invoice')->getClientOriginalName();
        $path = $request->file('invoice')->storeAs('invoice',$invoice,'public');
        $upload_path = 'invoice/';
        $requestData["invoice"] = $upload_path.$invoice;

        $data = UserProductRegistrationData::create($requestData);
        //return redirect('/home')->with('success', "Product registration details sent successfully.");

        //updating registration type to the Customer_registration_type table
        $emailData = new Customer_registration_type;
        $emailData->email = $request->email;
        $emailData->type = 1;
        $emailData->save();

        return redirect('/customer/home')->with('success', "Product registration details sent successfully.");
    }



}
