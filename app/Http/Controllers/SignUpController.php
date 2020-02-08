<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Visitor;
use Illuminate\Validation;
use Illuminate\Http\Request;
use Session;

class SignUpController extends Controller
{
    public function signUp(){
        $categories = Category::where('publication_status', 1)->get();
        return view('font-end.user.sign-up',[
            'categories'=>$categories
        ]);
    }
    protected function signUpValidateData($request){
        $this->validate($request,[
            'first_name'     =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:3|Max:50',
            'last_name'      =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:3|Max:50',
            'email_address'  =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:3|Max:50',
            'password'       =>'required',
            'phone_number'   =>'required',
            'address'        =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:5|Max:100'
        ]);
    }
    public function newSIgnUp(Request $request){
       $this->signUpValidateData($request);
       Visitor::saveVisitorInfo($request);
       return redirect()->back()->with('message','User register Save successfully');
    }
    public function visitorLogout(Request $request){
        Session::forget('visitorId');
        Session::forget('visitorName');
        return redirect('/');
    }
    public function visitorLogin(){
        $categories = Category::where('publication_status', 1)->get();
        return view('font-end.user.sign-in',[
            'categories'=>$categories
        ]);
    }
    public function newSignIn(Request $request){
        $visitor = Visitor::where('email_address', $request->email_address)->first();
        if ($visitor){
            if (password_verify($request->password, $visitor->password)){
                Session::put('visitorId', $visitor->id);
                Session::put('visitorName', $visitor->first_name.''.$visitor->last_name);
                return redirect('/');
            }else{
                return redirect()->back()->with('message','Password not valid.');
            }
        }else{
            return redirect()->back()->with('message','Email address not valid.');
        }
    }
}
