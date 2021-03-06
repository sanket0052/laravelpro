<!-- View stored in resources/views/auth/login.blade.php -->
	@extends('layouts.master')

	@section('title', 'Login')
		
	@section('content')
	
		<div class="container">

			<!-- Main Heading Starts -->
				<h2 class="main-heading text-center">
					Login or Create New Account
				</h2>
			<!-- Main Heading Ends -->

			<!-- Login Form Section Starts -->
			<div class="login-area">
				<div class="row">
					<div class="col-sm-6">
					<!-- Login Panel Starts -->
						<div class="panel panel-smart">
							<div class="panel-heading">
								<h3 class="panel-title">Login</h3>
							</div>
							<div class="panel-body">
								<p>
									Please login using your existing account
								</p>

								@if (Session::has('error'))
								    <div class="alert alert-danger" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('error') }}</div>
								@endif

								<!-- Display flashdata -->
								@if ($errors->any())
									@foreach ($errors->all() as $error)
										<div class="alert alert-danger" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}</div>
									@endforeach
								@endif
								<!-- Display flashdata -->

								<!-- Login Form Starts -->
								{{ Form::open(array('url' => 'auth/userlogin', 'role' => 'form', 'id' => 'login-form', 'method' => 'POST')) }}
								{{ csrf_field() }}

									<div class="form-group">
										{{ Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Enter Username', 'tabindex' => '1']) }}
										<!-- Username input field  -->
									</div>
									<div class="form-group">
										{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password', 'tabindex' => '2']) }}
									</div>
									<div class="form-group">
										{{ Form::checkbox('remember', 'value', '', ['tabindex' => '3', 'id' => 'remember']) }}
										{{ Form::label('rememeber', 'Remember Me') }}
									</div>
									<div class="row">
										<div class="col-md-6">
											{{ Form::submit('Submit', ['class' => 'btn btn-main', 'id' => 'form-submit']) }}
											<!-- Submit button of sign in form -->
										</div>
										<div class="col-md-6">
											<div class="form-group pull-right">
												{{ Html::link('user/passwordreset', 'Forgot Password?' , ['class' => 'forgot-password']) }}
											</div>
										</div>
									</div>

								{{ Form::close() }}
							<!-- Login Form Ends -->
							</div>
						</div>
					<!-- Login Panel Ends -->
					</div>
					<div class="col-sm-6">
					<!-- Account Panel Starts -->
						<div class="panel panel-smart">
							<div class="panel-heading">
								<h3 class="panel-title">
									Create new account
								</h3>
							</div>
							<div class="panel-body">
								<p>
									Registration allows you to avoid filling in billing and shipping forms every time you checkout on this website
								</p>
									{{ Html::link('auth/register', 'Register', array('class' => 'btn btn-main')) }}
									<!-- Register Form link -->
							</div>
						</div>
					<!-- Account Panel Ends -->
					<!-- Guest Checkout Panel Starts -->
						<div class="panel panel-smart">
							<div class="panel-heading">
								<h3 class="panel-title">
									Checkout as Guest
								</h3>
							</div>
							<div class="panel-body">
								<p>
									Checkout as a guest instead!
								</p>
								<button class="btn btn-main">As Guest</button>
							</div>
						</div>
					<!-- Guest Checkout Panel Ends -->
					</div>
				</div>
			</div>
			<!-- Login Form Section Ends -->
		</div>
	@endsection