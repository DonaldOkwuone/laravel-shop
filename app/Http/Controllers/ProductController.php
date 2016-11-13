<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use App\User;

use App\Cart;

use Session;



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
	
}
