<!-- View stored in resources/views/home.blade.php -->
	@extends('layouts.master')

	@section('title', 'Home')
		
	@section('content')
		<!-- Enter your page content below here
				Available effects: lnl-push, lnl-overlay -->
		<div class="content-wrap" data-effect="lnl-overlay">
			<div class="container">
				<div class="page-header">
					<h3>{!! $categories->name !!} <small>This month fearture products</small></h3>
				</div>
				<div class="row">
					@foreach($categories->product as $product)
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
							{{ Html::image('/assets/images/uploads/products/'.$product->image, '', array('class' => 'product-img img-responsive') ) }}
							<div class="caption">
								<a href=""><h4>{!! $product->name !!}</h4></a>
								<p>{!! $product->category->name !!}</p>
							</div>
								<p><a href="#" class="btn btn-primary btn-block add-to-cart" role="button">Add to cart</a></p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		
	@endsection