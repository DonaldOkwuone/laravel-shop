@extends('layouts.master')

@section('title')
 View your Shopping Cart
@endsection

@section('content')
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset col-sm-offset-3">
				<ul class="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge"> {{ $product['qty'] }} </span>
							<strong> {{ $product['item']['title'] }} </strong>
							<span class="margin label label-success "> {{ $product['price'] }} </span>
							<div class="btn-group"> 
								<button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">
									Action<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Reduce By 1</a></li>
									<li><a href="#">Reduce all</a></li>
									 
								</ul>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset col-sm-offset-3">
				 <strong>Total: {{ $totalPrice }}</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset col-sm-offset-3">
				@if(Auth::check())
					<a href=" {{route('checkout') }} " type="button" class="btn btn-success" >Checkout</a> 
				@else
					<a class="btn btn-success" href=" {{ route('user.signin') }} "> Please Login To Purchase</a> 
				@endif
					
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset col-sm-offset-3">
				 <h1>No Items in the Cart</h1>
			</div>
		</div>
	@endif
@endsection