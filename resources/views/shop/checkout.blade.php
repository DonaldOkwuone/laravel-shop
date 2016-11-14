@extends('layouts.master')

@section('title')
Shopping Cart
@endsection

@section('content') 
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset col-sm-offset-3">
		<h1 >Checkout</h1> 
		 
		<h4>Your Total: ${{ $total }} </h4>
		<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }} ">
			{{ Session::get('error') }}
		</div>
		<form id="checkout-form" action="{{ route('checkout') }}" method="post" >
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="name">Name</label>
						<input name="name"   id="name" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="address">Address</label>
						<input name="address"   id="address" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-name">Card Holder Name</label>
						<input name="card-name"  id="card-name" type="text" class="form-control" required>
					</div>
				</div>
				 
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-number">Card Number</label>
						<input name="card-number"  id="card-number" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-expiry-month">Expiry Month</label>
						<input name="card-expiry-month"  id="card-expiry-month" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12"> 
					<div class="row">
						<div class="col-xs-6">
						<div class="form-group">
							<label for="card-expiry-year">Expiry Year</label>
							<input name="card-expiry-year"   id="card-expiry-year" type="text" class="form-control" required>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="card-cvc">CVC</label>
							<input name="card-cvc"  id="card-cvc" type="text" class="form-control" required>
						</div>
					</div>
					</div>
					
				</div>
				
			</div>	
			{{ csrf_field() }}
			
			@if(Auth::check())
				<button class="btn btn-success" type="submit" >Buy Now</button> 
			@else
				<a class="btn btn-success" href=" {{ route('user.sigin') }} ">Login</a>
			@endif
		</form>
	</div>
</div>
	 
@endsection

@section('scripts')
		<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		<script type="text/javascript" src="{{URL::asset('js/checkout.js')}}"  ></script>
@endsection