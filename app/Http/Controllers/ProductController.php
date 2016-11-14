<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use Auth;
use App\Http\Requests; 
use App\Product; 
use App\User; 
use App\Cart; 
use App\Order;

 
use Session; 

use Stripe\Charge; 
use Stripe\Stripe; 


class ProductController extends Controller
{
    public function getIndex(){
		$products = Product::all();
		return view('shop.index', ['products' => $products]);
	}
	
	public function getAddToCart(Request $request, $id){
		$product = Product::find($id);	
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);
		
		$request->session()->put('cart', $cart); 
		return redirect()->route('product.Index');
		
	}
	
	public function getCart(){
		if (!Session::has('cart')){
			return view('shop.shopping-cart', ['products' => null]);
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		return view('shop.shopping-cart', ['products'  => $cart->items, 'totalPrice' => $cart->totalPrice ] );
	} 
	
	public function getCheckout(){
		if (!Session::has('cart')){
			return view('shop.shopping-cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$total = $cart->totalPrice;
		return view('shop.checkout' ,['total' => $total]);
	}
	
	public function postCheckout(Request $request){
		if(!Session::has('cart') ){
			redirect()->route('shop.shoppingCart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		
		Stripe::setApiKey('sk_test_9CCNN52v0qBXI1MKSjT0QzIS');
		try{
			$charge = Charge::create(
				array(
				  "amount" => $cart->totalPrice * 100 ,
				  "currency" => "usd",
				  "source" => $request->input('stripeToken') , // obtained with Stripe.js
				  "description" => "Test Charge"
				));
			$order = new Order(); 
			$order->cart  = serialize($cart);
			$order->address = $request->input('address');
			$order->name = $request->input('name');
			$order->payment_id = $charge->id;
			
			Auth::user()->orders()->save($order); 
			
		}catch(\Exception $e){
			return redirect()->route('checkout')->with('error', $e->getMessage());
		}
		Session::forget('cart');
		return redirect()->route('product.Index')->with('success', 'Successfully purchased Product');
		
	}
	
}
