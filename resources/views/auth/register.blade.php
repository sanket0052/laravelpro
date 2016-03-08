<!-- View stored in resources/views/auth/register.blade.php -->
	@extends('layouts.master')

	@section('title', 'Register')
		
	@section('content')
	
		<div class="container">

			<!-- Main Heading Starts -->
			<h2 class="main-heading text-center">
				Create New Account
			</h2>
			<!-- Main Heading Ends -->

			<!-- Registration Form Section Starts -->
			<div class="login-area">
				<div class="row">
					<div class="col-sm-6">
					<!-- Registration Panel Starts -->
						<div class="panel panel-smart">
							<div class="panel-heading">
								<h3 class="panel-title">Fill Form</h3>
							</div>
							<div class="panel-body">

								<!-- Display flashdata -->
								@if (count($errors) > 0)
									@foreach ($errors->all() as $error)
										<div class="alert alert-danger" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}</div>
									@endforeach
								@endif
								<!-- Display flashdata -->

								<!-- Register Form Starts -->
								{!! Form::open(array('url' => 'auth/register', 'role' => 'form', 'id' => 'register-form', 'method' => 'POST')) !!}
								{!! csrf_field() !!}

									<div class="form-group">
										{{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Enter User Name', 'tabindex' => '1')) }}
									</div>
									
									<div class="form-group">
										{{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Enter Email', 'tabindex' => '2')) }}
									</div>
									
									<div class="form-group">
										{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter Password', 'tabindex' => '3')) }}
									</div>
									
									<div class="form-group">
										{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Enter Confirm Password', 'tabindex' => '4')) }}
									</div>

									{{ Form::submit('Register', array('class' => 'btn btn-main', 'id' => 'form-submit', 'tabindex' => '5')) }}
									
								{!! Form::close() !!}
								<!-- Registration Form Ends -->
							</div>
						</div>
					<!-- Registration Panel Ends -->
					</div>
					<div class="col-sm-6">
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