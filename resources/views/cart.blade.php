<!-- View stored in resources/views/cart.blade.php -->
	@extends('layouts.master')

	@section('title', 'Contact Us')
		
	@section('content')
	
	<div class="container">

		<!-- <ol class="breadcrumb">
			<li class="active">
				<a >home</a>
			</li>
		</ol> -->

		<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Cart
		</h2>
		<!-- Main Heading Ends -->

		<!-- Start the cart section -->
		<section class="cart-view">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover cart-table">
						<thead>
							<tr>
								<th>Product</th>
								<th>Quantity</th>
								<th class="text-center">Price</th>
								<th class="text-center">Total</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if(!empty($cartdata))
								@foreach($cartdata['cartproduct'] as $key => $cartvalue)
									<tr id="item-tr-{{ $cartvalue['product_id'] }}">
										<td class="col-sm-8 col-md-6">
											<div class="media">
												<p id="rowid-{{ $cartvalue['product_id'] }}" style="display:none;">{{ $key }}</p>
												<a class="thumbnail pull-left" href="products">
													<div class="media-object">
														{{ Html::image('/assets/images/uploads/products/thumbils/'.$cartvalue['thumb'], '', array('class' => 'cart-image', 'width' => '86px', 'height' => '86px')) }}
													</div>
												</a>
												<div class="media-body">
													<h4 class="media-heading">
														<a href="#">{{ $cartvalue['name'] }}</a>
													</h4>
													<h5 class="media-heading"> by 
														<a href="{{ URL::to('cart/') }}" data-toggle = "tooltip" title = "Edit Product" >{{ $cartvalue['brand'] }}</a>
													</h5>
													<span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
												</div>
											</div>
										</td>
										<td class="col-sm-2 col-md-2">
										{{ Form::open(array('url' => 'cart/'.$cartvalue['id'], 'role' => 'form', 'method' => 'PUT')) }}
											{{ csrf_field() }}
											<div class="col-sm-8 col-md-8">
												{{ Form::number('qty', $cartvalue['qty'], array(
														'type' => 'number',
														'id' => 'input-item-'.$cartvalue['product_id'],
														'class' => 'item form-control cart-item',
														'type' => 'number',
														'maxlength' => '2',
														'min' => '1',
														'max' => '3'
												)) }}
												{{ Form::hidden('rowid', $key ) }}
											</div>
											<div class="col-sm-4 col-md-4">
												{{ Form::button('<i class="fa fa-pencil"></i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
											</div>
										{{ Form::close() }}
										</td>
										<!-- Prodcut Price Start-->
										<td class="col-sm-1 col-md-1 text-center">
											<strong>
												<i class="fa fa-inr"></i>
												<span id="price-item-{{ $cartvalue['product_id'] }}"> {{ $cartvalue['price'] }}</span>
											</strong>
										</td>
										<!-- Prodcut Price End -->
										<!-- Total of item Start-->
										<td class="col-sm-1 col-md-1 text-center">
											<i class="fa fa-inr"></i> 
											<strong>
												<span id="subtotal-save-{{ $cartvalue['product_id'] }}">{{ $cartvalue['total'] }}</span>
											</strong>
										</td>
										<!-- Total of item End-->
										<!-- Action Button Start-->
										<td class="col-sm-1 col-md-1">
											{{ Form::open(array('url' => 'cart/'.$cartvalue['id'])) }}
												{{ Form::hidden('_method', 'DELETE') }}

												{{ Form::button('<i class="fa fa-minus-square"></i>', ['class' => 'btn btn-danger', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Remove'] ) }}
												{{ Form::hidden('rowid', $key ) }}
											{{ Form::close() }}
										</td>
										<!-- Action Button End-->
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan = "5">
										<h1>No Items in Cart. </h1>
									</td>
								</tr>
							@endif
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><h5>Subtotal</h5></td>
								<td class="text-right">
									<h5>
										<strong>
											<i class="fa fa-inr"></i> 
											<span id="subtotal">
												{{ $cartdata['total']['totalprice'] }}
											</span>
										</strong>
									</h5>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><h5>Estimated shipping</h5></td>
								<td class="text-right">
									<h5>
										<strong>
											<span id="shipping-date">
												@if($cartdata['total']['totalprice'] != 0)
												{{ date("M d, Y", strtotime("+2 Weeks")) }}
												@endif
											</span>
										</strong>
									</h5>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><h3>Total</h3></td>
								<td class="text-right">
									<h3>
										<strong>
											<i class="fa fa-inr"></i> 
											<span id="final-total">
												{{ $cartdata['total']['totalprice'] }}
											</span>
										</strong>
									</h3>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			
			</div>
			<hr>
			@if($cartdata['total']['totalprice'] != 0)
				<div class="row">
					<div class="col-md-12 ">
						<div class="pull-right">
							{{ Form::open(['url' => 'cart/clear']) }}
								{{ Form::hidden('_method', 'DELETE') }}

								{{ Form::button('<i class="fa fa-trash"></i>&nbsp; Clear Cart', ['class' => 'btn btn-danger', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Clear Cart'] ) }}

								<button type="button" class="btn btn-info">
									<span class="glyphicon glyphicon-shopping-cart"></span>
									Continue Shopping
								</button>

								<button type="button" class="btn btn-success">
									Checkout 
									<span class="glyphicon glyphicon-play"></span>
								</button>
							{{ Form::close() }}
						</div>
					</div>
				</div>
				<hr>
			@endif
		</section>
	<!-- End the cart section -->
	@endsection
	@push('scripts')
		{{ Html::script('assets/js/cart.js') }}
	@endpush