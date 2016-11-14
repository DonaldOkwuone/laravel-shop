<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\SignupRequest;

use App\Http\Requests\SigninRequest;

use App\User;

use Auth;

use Redirect;

use Session;

class UserController extends Controller
{
    public function getSignup(){
		return view('user.signup');
	}
	public function postSignup(SignupRequest $request){
		 
		
		$user = new  User();
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		
		$user->save();
		Auth::login($user);
		return redirect()->route('user.profile');
		
	}
	
	public function getSignin(){
		return view('user.signin');
	}
	
	
	public function postSignin(SigninRequest $request){
		if(Auth::attempt(['email'=> $request->email, 'password' =>$request->password ])){
			return redirect()->route('user.profile');
		}
		return redirect()->back();
		
	}
	
	public function getProfile(){
		return view('user.profile');
	}
	
	public function getLogout(){
		Auth::logout();
		Session::forget('cart');
		return redirect()->route('product.Index');
	}
	
	
}
