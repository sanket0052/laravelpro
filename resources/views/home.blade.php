<!-- View stored in resources/views/home.blade.php -->
	@extends('layouts.master')

	@section('title', 'Home')
		
	@section('content')
		<!-- Enter your page content below here
				Available effects: lnl-push, lnl-overlay -->
		<div class="content-wrap" data-effect="lnl-overlay">
			<div class="container">
				<div class="page-header">
					<h3>Featured Products <small>This month fearture products</small></h3>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
							<img src="http://placehold.it/600x400" alt="product alt">
							<div class="caption">
								<a href=""><h4>Product name</h4></a>
								<p>Intrins mindshare via interdependent internal or "organic" sources.</p>
							</div>
								<p><a href="#" class="btn btn-primary btn-block  add-to-cart" role="button">Add to cart</a></p>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
							<img src="http://placehold.it/600x400" alt="product alt">
							<div class="caption">
								<h4>Product name</h4>
								<p>Intrins mindshare via interdependent internal or "organic" sources.</p>
							</div>
								<p><a href="#" class="btn btn-primary btn-block add-to-cart" role="button">Add to cart</a></p>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
							<img src="http://placehold.it/600x400" alt="product alt">
							<div class="caption">
								<h4>Product name</h4>
								<p>Intrins mindshare via interdependent internal or "organic" sources.</p>
							</div>
								<p><a href="#" class="btn btn-primary btn-block  add-to-cart" role="button">Add to cart</a></p>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
							<img src="http://placehold.it/600x400" alt="product alt">
							<div class="caption">
								<h4>Product name</h4>
								<p>Intrins mindshare via interdependent internal or "organic" sources.</p>
							</div>
								<p><a href="#" class="btn btn-primary btn-block  add-to-cart" role="button">Add to cart</a></p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	@endsection