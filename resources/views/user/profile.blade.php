@extends('layouts.master')
@section('title')
	My Profile
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>User Profile</h1>
		<hr> 
		@if(count($orders) < 1)
			<h2>You have no Books Yet</h2> 
		@else
			<h2>Your Orders</h2>
			@foreach($orders as $order )
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="list-group">
							@foreach($order->cart->items as $item )
								<li class="list-group-item">
									<span class="badge">{{ $item['price'] }} </span>
									{{ $item['item']['title'] }} |  {{ $item['qty'] }} Unit(s)
								</li>
							@endforeach
						</ul>
					</div>
					<div class="panel-footer">
						<strong>
							Total Price: ${{ $order->cart->totalPrice }}
						</strong>
					</div>
				</div>
			@endforeach
		@endif
	</div>
</div>
@endsection