@extends('layouts.master')

@section('title')
Shopping Cart
@endsection

@section('content') 
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset col-sm-offset-3">
		<h1>Checkout</h1> 
		<h4>Your Total: ${{ $total }} </h4>
		<form id="checkout-form" action="{{ route('checkout') }}" method="post" >
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="name">Name</label>
						<input   id="name" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="address">Address</label>
						<input   id="address" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-name">Card Holder Name</label>
						<input   id="card-name" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-number">Card Number</label>
						<input   id="card-name" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-number">Card Number</label>
						<input   id="card-name" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-expiry-month">Expiry Month</label>
						<input   id="card-expiry-month" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12"> 
					<div class="row">
						<div class="col-xs-6">
						<div class="form-group">
							<label for="card-expiry-year">Expiry Year</label>
							<input   id="card-expiry-year" type="text" class="form-control" required>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="card-cvc">CVC</label>
							<input   id="card-cvc" type="text" class="form-control" required>
						</div>
					</div>
					</div>
					
				</div>
				
			</div>	
			{{ csrf_field() }}
				<button class="btn btn-success" type="submit" >Buy Now</button>
		</form>
	</div>
</div>
	 
@endsection