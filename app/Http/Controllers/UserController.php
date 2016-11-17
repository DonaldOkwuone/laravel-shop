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
			if(Session::has('oldUrl') ){
				$oldUrl = Session::get('oldUrl');
				Session::forget('oldUrl');
				return redirect()->to($oldUrl); 
			}
			return redirect()->route('user.profile');
		}
		return redirect()->back();
		
	}
	
	public function getProfile(){
		$orders = Auth::user()->orders;
		//unserialize cart object that can then be accessed in the user's profile
		$orders->transform(function($order, $key){
			$order->cart = unserialize($order->cart);
			return $order;
		});
		return view('user.profile', ['orders' => $orders]);
	}
	
	public function getLogout(){
		Auth::logout();
		Session::forget('cart');
		return redirect()->route('product.Index');
	}
	
	
}
