<!-- View stored in resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="line, ecommerce bootstrap shop menu">
		<meta name="keywords" content="ecommerce, shop, shopping,navbar, side navabr, menu, HTML, CSS, JS, JavaScript, dashboard, bootstrap, front-end, frontend, web development, normal, side, navbar">
		<meta name="author" content="CodBits">

		<title>Line Shop - @yield('title')</title>

		<!-- Bootstrap core and other CSS -->
		{{ Html::style('assets/css/library.css') }}
		{{ Html::style('assets/css/public.css') }}

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			{{ Html::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}
			{{ Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}
		<![endif]-->
	</head>

	<body>
			
		<!-- Line top navbar -->
		<nav class="navbar navbar-static-top line-navbar-one">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<!-- Top navbar button -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#line-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="fa fa-ellipsis-v"></span>
					</button>
					<!-- Cart button -->
					<a class="lno-cart" href="#">
						<span class="glyphicon glyphicon-shopping-cart"></span>
						<span class="cart-item-quantity"></span>
					</a>
					<!-- left navbar button -->
					<button class="lno-btn-toggle">
						<span class="fa fa-bars"></span>
					</button>
					<!-- Brand image -->
					<a class="navbar-brand" href="{{ URL::to('/') }}">
						{{ Html::image('assets/images/logo.png') }}
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="line-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<!-- <a href="#">Shop</a> -->
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Shop <span class="caret"></span></a>
							<ul class="dropdown-menu">
				            	<li><a href="#">Shop By Category</a></li>
				            	<li><a href="#">Shop By Brand</a></li>
				            	<li><a href="#">Shop By Product</a></li>
				          	</ul>
						</li>
						<li>
							{{ link_to('contact', $title = 'Contact', $attributes = array(), $secure = null) }}
						</li>
						@if(Auth::user())
							<li>
								{{ link_to('auth/logout', $title = 'Logout', $attributes = array()) }}
							</li>							
						@else
							<li>
								{{ link_to('auth/userlogin', $title = 'Login', $attributes = array(), $secure = null) }}
							</li>
							<li>
								{{ link_to('auth/register', $title = 'Register', $attributes = array(), $secure = null) }}
							</li>
						@endif
					</ul>
					<form class="navbar-form navbar-left lno-search-form visible-xs" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-search"><span class="fa fa-search"></span></button>
					</form>
					<ul class="nav navbar-nav navbar-right lno-socials">
						<li><a href="#" class="facebook"><span class="fa fa-facebook"></span></a></li>
						<li><a href="#" class="twitter"><span class="fa fa-twitter"></span></a></li>
						<li><a href="#" class="google-plus"><span class="fa fa-google-plus"></span></a></li>
						<li><a href="#" class="pinterest"><span class="fa fa-pinterest"></span></a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
		
		<!-- Line secondary navbar -->
		<nav class="navbar navbar-static-top line-navbar-two">
			<div class="container">
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="line-navbar-collapse-2">
					<ul class="nav navbar-nav lnt-nav-mega">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<span class="fa fa-dot-circle-o"></span>
								Categories
								<span class="caret"></span>
							</a>


							<div class="dropdown-menu" role="menu">
								<div class="lnt-dropdown-mega-menu">
									<!-- List of categories -->
									<ul class="lnt-category list-unstyled">
										@foreach($mainMenu as $categorykey => $category)
											<li class="{{ $categorykey == '0' ? 'active' : '' }}">
												<a href="#subcategory-{{ $category['urlname'] }}" >{{ $category['name'] }}</a>
											</li>
										@endforeach
									</ul>
									<!-- Subcategory and carousel wrap -->
									<div class="lnt-subcategroy-carousel-wrap container-fluid">
										@foreach($mainMenu as $key => $value) 
											<div id="subcategory-{{ $value['urlname'] }}" class="{{ $key == '0' ? 'active' : '' }}">
												<!-- Sub categories list-->
												<div class="lnt-subcategory col-sm-8 col-md-8">
													<h3 class="lnt-category-name">{{ $value['name'] }}</h3>
													<ul class="list-unstyled col-sm-6">
														@if(!empty($value['sub']))
															@foreach($value['sub'] as $k => $subcategory)
																<li><a href="{{ URL::to('category/'.$subcategory['id']) }}">{{ $subcategory['name'] }}</a></li>
															@endforeach
														@endif
													</ul>
												</div>
												<!-- Carousel -->
												<div class="col-sm-4 col-md-4">
													<div id="carousel-category-home" class="carousel slide" data-ride="carousel">
														<ol class="carousel-indicators">
															<li data-target="#carousel-category-home" data-slide-to="0" class=""></li>
															<li data-target="#carousel-category-home" data-slide-to="1" class="active"></li>
															<li data-target="#carousel-category-home" data-slide-to="2" class=""></li>
														</ol>
														<div class="carousel-inner" role="listbox">
															<div class="item active">
																<img src="http://placehold.it/296x400" alt="Slide image">
															</div>
															<div class="item">
																<img src="http://placehold.it/296x400" alt="Slide image">
															</div>
															<div class="item">
																<img src="http://placehold.it/296x400" alt="Slide image">
															</div>
														</div>
													</div>
												</div>
											</div> <!-- /.subcategory-home -->
										@endforeach
									</div> <!-- /.lnt-subcategroy-carousel-wrap -->
								</div> <!-- /.lnt-dropdown-mega-menu -->
							</div> <!-- /.dropdown-menu -->
						</li> <!-- /.dropdown -->
					</ul> <!-- /.lnt-nav-mega -->
					<form class="navbar-form navbar-left lnt-search-form" role="search">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-btn lnt-search-category">
									<button type="button" class="btn btn-default dropdown-toggle selected-category-btn" data-toggle="dropdown" aria-expanded="false">
										<span class="selected-category-text">All </span>
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										@foreach($mainMenu as $category)
											<li class="{{ $category['id'] == '0' ? 'active' : '' }}">
												<a href="#subcategory-{{ $category['urlname'] }}" >{{ $category['name'] }}</a>
											</li>
										@endforeach
									</ul>
								</div><!-- /btn-group -->
								<input type="text" class="form-control lnt-search-input" aria-label="Search" placeholder="Search leader">
							</div><!-- /input-group -->
						</div>
						<div class="lnt-search-suggestion">
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Leader mask in <em>entertainment</em></a></li>
								<li><a href="#">Plain leader bags in <em>fashion</em></a></li>
								<li><a href="#">Black leader shoes in <em>fashion</em></a></li>
								<li><a href="#">Covers in <em>electronics</em></a></li>
								<li><a href="#">Leader overcoat in <em>fashion</em></a></li>
								<li><a href="#">Hi motor in <em>motors</em></a></li>
								<li><a href="#">Fake leader bag in <em>Electronics</em></a></li>
								<li class="lnt-search-bottom-links">
									<ul class="list-inline">
										<li><a href="#">All suggestions</a></li>
										<li><a href="#">New products</a></li>
										<li><a href="#">Popular products</a></li>
										<li><a href="#">Discounted products</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<button type="submit" class="btn btn-search"><span class="fa fa-search"></span></button>
					</form> <!-- /.lnt-search-form -->
					<ul class="nav navbar-nav navbar-right lnt-shopping-cart">
						<li class="dropdown">
							<div class="btn-group" role="group" aria-label="...">
								<button type="button" class="btn btn-default lnt-cart">
									<span class="glyphicon glyphicon-shopping-cart"></span>
									<span class="cart-item-quantity"></span>
								</button>
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Shopping cart
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<div class="lnt-cart-products">
												{{ Auth::check() == 1 ? $cartdata['total']['totalproduct'] : 0 }} products added. 
												<span class="lnt-cart-total"><i class="fa fa-inr"></i> {{ Auth::check() == 1 ? $cartdata['total']['totalprice'] : 0 }}</span>
											</div>
										</li>
										@if(Auth::check())
											@if(!is_null($cartdata))
												@foreach($cartdata['cartproduct'] as $key => $cartvalue)
												<li>
													<div class="lnt-cart-products">
														{{ Html::image('/assets/images/uploads/products/thumbils/'.$cartvalue['thumb'], $cartvalue['name'], array('class' => 'cart-image', 'width' => '60px', 'height' => '60px')) }}
														<span class="lnt-product-info">
															<span class="lnt-product-name">
																{{ $cartvalue['name'] }}
															</span>
															<span class="lnt-product-price">
																<del><i class="fa fa-inr"></i> {{ $cartvalue['price']+50 }} </del> 
																	&rarr; {{ $cartvalue['price'] }}
															</span>
															{{ Form::open(array('url' => 'cart/'.$cartvalue['id'])) }}
																{{ Form::hidden('_method', 'DELETE') }}

																{{ Form::button('Remove?', ['class' => 'lnt-product-remove btn-link', 'type' => 'submit'] ) }}
																{{ Form::hidden('rowid', $key ) }}
															{{ Form::close() }}
														</span>
													</div>
												</li>
												@endforeach
											@endif
										@endif
										<li class="lnt-cart-actions">
											<a href="{{ URL::to('cart/') }}" class="lnt-view-cart-btn">View cart</a>
											<a href="#" class="lnt-checkout-btn">Checkout</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul> <!-- /.lnt-shopping-cart -->
				</div> <!-- /.navbar-collapse -->
			</div> <!-- /.container -->
		</nav> <!-- /.line-navbar-two -->

		<!-- Line left navbar for secondary navbar on small devices -->
		<div class="line-navbar-left">
			<p class="lnl-nav-title">Categories</p>
			<ul class="lnl-nav">
				<!-- The list will be automatically cloned from mega menu via jQuery -->
			</ul>
		</div> <!-- /.line-navbar-left -->
		
		<section>
			@yield('content')
		</section>

					 
		<div class="clear-fix"></div>

		<!-- Footer Section Starts -->
		<footer id="footer-area">
			<!-- Footer Links Starts -->
			<div class="footer-links">
				<!-- Container Starts -->
				<div class="container">
					<!-- Information Links Starts -->
					<div class="col-md-2 col-sm-4 col-xs-12">
						<h5>Information</h5>
						<ul>
							<li><a href="about.html">About Us</a></li>
							<li><a href="#">Delivery Information</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms &amp; Conditions</a></li>
						</ul>
					</div>
					<!-- Information Links Ends -->
					<!-- My Account Links Starts -->
					<div class="col-md-2 col-sm-4 col-xs-12">
						<h5>My Account</h5>
						<ul>
							<li><a href="#">My orders</a></li>
							<li><a href="#">My merchandise returns</a></li>
							<li><a href="#">My credit slips</a></li>
							<li><a href="#">My addresses</a></li>
							<li><a href="#">My personal info</a></li>
						</ul>
					</div>
					<!-- My Account Links Ends -->
					<!-- Customer Service Links Starts -->
					<div class="col-md-2 col-sm-4 col-xs-12">
						<h5>Service</h5>
						<ul>
							<li><a href="contact.html">Contact Us</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Site Map</a></li>
							<li><a href="#">Affiliates</a></li>
							<li><a href="#">Specials</a></li>
						</ul>
					</div>
					<!-- Customer Service Links Ends -->
					<!-- Follow Us Links Starts -->
					<div class="col-md-2 col-sm-4 col-xs-12">
						<h5>Follow Us</h5>
						<ul>
							<li><a href="#">Facebook</a></li>
							<li><a href="#">Twitter</a></li>
							<li><a href="#">RSS</a></li>
							<li><a href="#">YouTube</a></li>
						</ul>
					</div>
					<!-- Follow Us Links Ends -->
					<!-- Contact Us Starts -->
					<div class="col-md-4 col-sm-8 col-xs-12 last">
						<h5>Contact Us</h5>
						<ul>
							<li>My Company</li>
							<li>
								1247 LB Nagar Road, Hyderabad, Telangana - 35
							</li>
							<li>
								Email: <a href="#">info@demolink.com</a>
							</li>								
						</ul>
						<h4 class="lead">
							Tel: <span>1(234) 567-9842</span>
						</h4>
					</div>
					<!-- Contact Us Ends -->
				</div>
				<!-- Container Ends -->
			</div>
			<!-- Footer Links Ends -->
			<!-- Copyright Area Starts -->
			<div class="copyright">
				<!-- Container Starts -->
				<div class="container">
					<!-- Starts -->
					<p class="pull-left">
						&copy; <?php echo date('Y'); ?> Line Stores. Designed By <a href="">Sanket Jadav</a>
					</p>
					<!-- Ends -->
					<!-- Payment Gateway Links Starts -->
					<ul class="pull-right list-inline">
						<li>
							{{ Html::image('assets/images/payment-icon/cirrus.png') }}
						</li>
						<li>
							{{ Html::image('assets/images/payment-icon/paypal.png') }}
						</li>
						<li>
							{{ Html::image('assets/images/payment-icon/visa.png') }}
						</li>
						<li>
							{{ Html::image('assets/images/payment-icon/mastercard.png') }}
						</li>
						<li>
							{{ Html::image('assets/images/payment-icon/americanexpress.png') }}
						</li>
					</ul>
					<!-- Payment Gateway Links Ends -->
				</div>
				<!-- Container Ends -->
			</div>
			<!-- Copyright Area Ends -->
		</footer>
		<!-- Footer Section Ends -->

		<!-- Le javaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		{{ Html::script('assets/js/main.js') }}
		{{ Html::script('assets/js/library.js') }}
		
		@stack('scripts')
	</body>
</html>