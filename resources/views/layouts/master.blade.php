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
		{{ Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css') }}
		{{ Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
		{{ Html::style('https://fonts.googleapis.com/css?family=Raleway') }}
		{{ Html::style('assets/css/line.css') }}
		<!-- <link href="css/line.css" rel="stylesheet"> -->

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Favicon -->
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="icon" href="/favicon.ico">
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
					<a class="navbar-brand" href="#">
						{{ Html::image('assets/images/logo.png') }}
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="line-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="#">Shop</a></li>
						<li>
							{{ link_to('contact', $title = 'Contact', $attributes = array(), $secure = null) }}
						</li>

						@if(Session::has('userid') && Session::has('username'))
							<li>
								{{ link_to('user/logout', $title = 'Logout', $attributes = array()) }}
							</li>							
						@else
							<li>
								{{ link_to('user/login', $title = 'Login', $attributes = array(), $secure = null) }}
							</li>
							<li>
								{{ link_to('user/register', $title = 'Register', $attributes = array(), $secure = null) }}
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
										<li class="active"><a href="#subcategory-home">Home, garden and tools</a></li>
										<li><a href="#subcategory-sports">Sports and outdoors</a></li>
										<li><a href="#subcategory-music">Digital music</a></li>
										<li><a href="#subcategory-books">Books <span class="label label-danger">Hot</span></a></li>
										<li><a href="#subcategory-fashion">Fashion and beauty</a></li>
										<li><a href="#subcategory-movies">Movies and games</a></li>
									</ul>
									<!-- Subcategory and carousel wrap -->
									<div class="lnt-subcategroy-carousel-wrap container-fluid">
										<div id="subcategory-home" class="active">
											<!-- Sub categories list-->
											<div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Home, garden and tools</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="http://google.com">Home</a></li>
													<li><a href="#">Kitchen</a></li>
													<li><a href="#">Furniture</a></li>
													<li><a href="#">Wedding</a></li>
													<li><a href="#">Hardware</a></li>
													<li><a href="#">Pets</a></li>
													<li><a href="#">Bed and bath</a> <span class="label label-info">Popular</span></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Fixtures</a></li>
													<li><a href="#">Home robots</a> <span class="label label-danger">hot</span></li>
													<li><a href="#">Power tools</a></li>
													<li><a href="#">Lamps</a></li>
													<li><a href="#">Redesign</a></li>
													<li><a href="#">Garden</a></li>
													<li><a href="#">Decor</a></li>
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
										<div id="subcategory-sports">
											<!-- Sub categories list-->
											<div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Sports and outdoors</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Exercise</a></li>
													<li><a href="#">Fitness</a></li>
													<li><a href="#">Hunting</a></li>
													<li><a href="#">Fishing</a> <span class="label label-primary">Trending</span></li>
													<li><a href="#">Boating</a></li>
													<li><a href="#">Water sports</a></li>
													<li><a href="#">Hardware</a></li>
													<li><a href="#">Fan shop</a></li>
													<li><a href="#">Team sports</a></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Golf</a></li>
													<li><a href="#">Outdoor clothing</a></li>
													<li><a href="#">Cycling</a></li>
													<li><a href="#">Action sports</a></li>
													<li><a href="#">Game room</a> <span class="label label-danger">Hot</span></li>
												</ul>
											</div>
											<!-- Carousel -->
											<div class="col-sm-4 col-md-4">
												<div id="carousel-category-sports" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-sports" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-sports" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-sports" data-slide-to="2" class=""></li>
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
										</div> <!-- /.subcategory-sports -->
										<div id="subcategory-music">
											<!-- Sub categories list-->
											<div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Digital music</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Online</a></li>
													<li><a href="#">Best</a></li>
													<li><a href="#">New releases</a></li>
													<li><a href="#">Deals</a></li>
													<li><a href="#">Top selling</a></li>
													<li><a href="#">Top grossing</a> <span class="label label-info">Popular</span></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Pop</a></li>
													<li><a href="#">Jazz</a> <span class="label label-danger">Hot</span></li>
													<li><a href="#">Country</a></li>
													<li><a href="#">Classic</a></li>
													<li><a href="#">Rock</a></li>
												</ul>
											</div>
											<!-- Carousel -->
											<div class="col-sm-4 col-md-4">
												<div id="carousel-category-music" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-music" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-music" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-music" data-slide-to="2" class=""></li>
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
										</div> <!-- /.subcategory-music -->
										<div id="subcategory-books">
											<div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Books</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Books</a> <span class="label label-primary">Trending</span></li>
													<li><a href="#">Magazines</a></li>
													<li><a href="#">Children</a></li>
													<li><a href="#">Textbooks</a></li>
													<li><a href="#">Kindle</a></li>
													<li><a href="#">Audible</a></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Web development</a> <span class="label label-danger">hot</span></li>
													<li><a href="#">Typography</a></li>
													<li><a href="#">Design</a></li>
													<li><a href="#">Novel</a></li>
													<li><a href="#">Short story</a></li>
													<li><a href="#">Action</a></li>
													<li><a href="#">Romance</a></li>
													<li><a href="#">Political</a></li>
												</ul>
											</div>
											<!-- Carousel -->
											<div class="col-sm-4 col-md-4">
												<div id="carousel-category-books" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-books" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-books" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-books" data-slide-to="2" class=""></li>
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
										</div> <!-- /.subcategory-books -->
										<div id="subcategory-fashion">
											<!-- Sub categories list-->
											<div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Fashion and beauty</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Women</a></li>
													<li><a href="#">Men</a></li>
													<li><a href="#">Girls</a></li>
													<li><a href="#">Boys</a></li>
													<li><a href="#">Baby</a></li>
													<li><a href="#">Top selling</a> <span class="label label-info">Popular</span></li>
													<li><a href="#">Cheap</a></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">All beauty</a></li>
													<li><a href="#">Diets</a></li>
													<li><a href="#">Baby care</a> <span class="label label-primary">Trending</span></li>
													<li><a href="#">Men's grooming</a></li>
													<li><a href="#">Health</a></li>
												</ul>
											</div>
											<!-- Carousel -->
											<div class="col-sm-4 col-md-4">
												<div id="carousel-category-fashion" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-fashion" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-fashion" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-fashion" data-slide-to="2" class=""></li>
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
										</div> <!-- /.subcategory-fashion -->
										<div id="subcategory-movies">
											<!-- Sub categories list-->
											<div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Movies and games</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Movies and TV</a></li>
													<li><a href="#">Blu-ray</a></li>
													<li><a href="#">Div-ix</a> <span class="label label-info">Popular</span></li>
													<li><a href="#">Instant movies</a></li>
													<li><a href="#">Free movies</a></li>
													<li><a href="#">Digital instruments</a></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Online games</a></li>
													<li><a href="#">Trending</a> <span class="label label-danger">hot</span></li>
													<li><a href="#">Popular</a></li>
													<li><a href="#">Grossing</a></li>
													<li><a href="#">Game room</a></li>
												</ul>
											</div>
											<!-- Carousel -->
											<div class="col-sm-4 col-md-4">
												<div id="carousel-category-movies" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-movies" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-movies" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-movies" data-slide-to="2" class=""></li>
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
										</div> <!-- /.category-movies -->
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
										<li><a href="#">Fashion</a></li>
										<li><a href="#">Sport</a></li>
										<li><a href="#">Electronics</a></li>
										<li><a href="#">Home</a></li>
										<li><a href="#">Toys</a></li>
										<li><a href="#">Motors</a></li>
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
												2 products added. 
												<span class="lnt-cart-total">$1400</span>
											</div>
										</li>
										<li>
											<div class="lnt-cart-products">
												<img src="http://placehold.it/60x60" alt="Product title">
												<span class="lnt-product-info">
													<span class="lnt-product-name">Leader bag</span>
													<span class="lnt-product-price"><del>$790</del> &rarr; $600</span>
													<button type="button" class="lnt-product-remove btn-link">Remove?</button>
												</span>
											</div>
										</li>
										<li>
											<div class="lnt-cart-products">
												<img src="http://placehold.it/60x60" alt="Product title">
												<span class="lnt-product-info">
													<span class="lnt-product-name">Awesome pack of new clothes for you</span>
													<span class="lnt-product-price">$700</span>
													<button type="button" class="lnt-product-remove btn-link">Remove?</button>
												</span>
											</div>
										</li>
										<li class="lnt-cart-actions">
											<a href="#" class="lnt-view-cart-btn">View cart</a>
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
		{{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
		{{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js') }}
		{{ Html::script('assets/js/jquery.highlight.js') }}
		{{ Html::script('assets/js/jquery.touchSwipe.min.js') }}
		{{ Html::script('assets/js/jquery.randomColor.js') }}
		{{ Html::script('assets/js/line.js') }}
	</body>
</html>