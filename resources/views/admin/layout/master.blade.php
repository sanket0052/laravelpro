<!-- View stored in resources/views/admin/layout/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Admin - @yield('title')</title>
		
		<!-- Bootstrap Core CSS -->
		{{ Html::style('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}

		<!-- MetisMenu CSS -->
		{{ Html::style('assets/admin/bower_components/metisMenu/dist/metisMenu.min.css') }}

		<!-- Timeline CSS -->
		{{ Html::style('assets/admin/dist/css/timeline.css') }}

		<!-- Custom CSS -->
		{{ Html::style('assets/admin/dist/css/animate.min.css') }}
		
		{{ Html::style('assets/admin/dist/css/sb-admin-2.css') }}

		<!-- Morris Charts CSS -->
		{{ Html::style('assets/admin/bower_components/morrisjs/morris.css') }}

		<!-- Custom Fonts -->
		{{ Html::style('assets/admin/bower_components/font-awesome/css/font-awesome.min.css') }}

		<!-- jQuery -->
		{{ Html::script('assets/admin/bower_components/jquery/dist/jquery.min.js') }}

		<!-- Bootstrap Core JavaScript -->
		{{ Html::script('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}

		@yield('link')

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">Line Shop Admin</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-messages">
						<li>
							<a href="#">
								<div>
									<strong>John Smith</strong>
									<span class="pull-right text-muted">
										<em>Yesterday</em>
									</span>
								</div>
								<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<strong>John Smith</strong>
									<span class="pull-right text-muted">
										<em>Yesterday</em>
									</span>
								</div>
								<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<strong>John Smith</strong>
									<span class="pull-right text-muted">
										<em>Yesterday</em>
									</span>
								</div>
								<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a class="text-center" href="#">
								<strong>Read All Messages</strong>
								<i class="fa fa-angle-right"></i>
							</a>
						</li>
					</ul>
					<!-- /.dropdown-messages -->
				</li>
				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-tasks">
						<li>
							<a href="#">
								<div>
									<p>
										<strong>Task 1</strong>
										<span class="pull-right text-muted">40% Complete</span>
									</p>
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
											<span class="sr-only">40% Complete (success)</span>
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<p>
										<strong>Task 2</strong>
										<span class="pull-right text-muted">20% Complete</span>
									</p>
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
											<span class="sr-only">20% Complete</span>
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<p>
										<strong>Task 3</strong>
										<span class="pull-right text-muted">60% Complete</span>
									</p>
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
											<span class="sr-only">60% Complete (warning)</span>
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<p>
										<strong>Task 4</strong>
										<span class="pull-right text-muted">80% Complete</span>
									</p>
									<div class="progress progress-striped active">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
											<span class="sr-only">80% Complete (danger)</span>
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a class="text-center" href="#">
								<strong>See All Tasks</strong>
								<i class="fa fa-angle-right"></i>
							</a>
						</li>
					</ul>
					<!-- /.dropdown-tasks -->
				</li>
				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-alerts">
						<li>
							<a href="#">
								<div>
									<i class="fa fa-comment fa-fw"></i> New Comment
									<span class="pull-right text-muted small">4 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<i class="fa fa-twitter fa-fw"></i> 3 New Followers
									<span class="pull-right text-muted small">12 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<i class="fa fa-envelope fa-fw"></i> Message Sent
									<span class="pull-right text-muted small">4 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<i class="fa fa-tasks fa-fw"></i> New Task
									<span class="pull-right text-muted small">4 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
								<div>
									<i class="fa fa-upload fa-fw"></i> Server Rebooted
									<span class="pull-right text-muted small">4 minutes ago</span>
								</div>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a class="text-center" href="#">
								<strong>See All Alerts</strong>
								<i class="fa fa-angle-right"></i>
							</a>
						</li>
					</ul>
					<!-- /.dropdown-alerts -->
				</li>
				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li>
							<a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li>
							<?php  $user = Auth::user(); ?>
							@if(isset($user->id) && isset($user->username))
								<!-- <li><i class="fa fa-sign-out fa-fw"></i> -->
									{{ link_to('auth/logout', $title = 'Logout', $attributes = array()) }}
								</li>							
							@endif
							<?php 
								//echo anchor('admin/logout', 'Logout', array('title' => 'Logout'))
							?>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">

							<div class="inner-addon left-addon">
								<i class="fa fa-search"></i>
								<input type="text" class="form-control" />
							</div>
							<!-- /input-group -->
						</li>
						<li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tags"></i> Catalog<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>	
                                	<a href="{{ URL::to('admin/category') }}"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp; Categories</a>
                                </li>
                                <li>
                                	<a href="{{ URL::to('admin/brand') }}"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp; Brands</a>
                                </li>
                                <li>
                                	<a href="{{ URL::to('admin/product') }}"><i class="fa fa-angle-double-right"></i>&nbsp;&nbsp; Products</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- <li>
							<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="flot.html">Flot Charts</a>
								</li>
								<li>
									<a href="morris.html">Morris.js Charts</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
						</li>
						<li>
							<a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="panels-wells.html">Panels and Wells</a>
								</li>
								<li>
									<a href="buttons.html">Buttons</a>
								</li>
								<li>
									<a href="notifications.html">Notifications</a>
								</li>
								<li>
									<a href="typography.html">Typography</a>
								</li>
								<li>
									<a href="icons.html"> Icons</a>
								</li>
								<li>
									<a href="grid.html">Grid</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="#">Second Level Item</a>
								</li>
								<li>
									<a href="#">Second Level Item</a>
								</li>
								<li>
									<a href="#">Third Level <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="blank.html">Blank Page</a>
								</li>
								<li>
									<a href="login.html">Login Page</a>
								</li>
							</ul>
						</li> -->
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>
		
		<!-- #page-wrapper -->
		<div id="page-wrapper">
			<div class="page-header">
				<div class="row page-title">
					<div class="col-md-12">
						<h1 class="page-header">
							<h3>@yield('heading')</h3>
						</h1>
					</div>
				</div>
				<div class="row">
					<ul class="breadcrumb breadcrumb-page">
						<li><a href="#">Home</a></li>
						<li class="active"><a href="#">Dashboard</a></li>
					</ul>
				</div>
			</div>
			<div class="page-content">
				<div class="row">
					@yield('content')
				</div>
			</div>
			<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->

		<!-- Metis Menu Plugin JavaScript -->
		{{ Html::script('assets/admin/bower_components/metisMenu/dist/metisMenu.min.js') }}
		
		<!-- Morris Charts JavaScript -->
		{{ Html::script('assets/admin/bower_components/raphael/raphael-min.js') }}
		
		@yield('script')

		<!--<script src="<?php //echo base_url('assets/admin/bower_components/morrisjs/morris.min.js');?>"></script>
		
		<script src="<?php //echo base_url('assets/admin/js/morris-data.js');?>"></script>-->

		@stack('scripts')
		<!-- Custom Theme JavaScript -->
		{{ Html::script('assets/admin/dist/js/sb-admin-2.js') }}
		

	</body>
</html>