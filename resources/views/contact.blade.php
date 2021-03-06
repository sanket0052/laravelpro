<!-- View stored in resources/views/contact.blade.php -->
	@extends('layouts.master')

	@section('title', 'Contact Us')
		
	@section('content')
	
	<div class="container contact-form">

		<!-- Main Heading Starts -->
		<h2 class="main-heading text-center">
			Contact Us
		</h2>
		<!-- Main Heading Ends -->

		<div class="row"> 
			<div class="col-md-12"> 
				<div id="googleMap" style="width:100%;height:200px;"></div>
				
				<div class="text-center"> 
					<h2> We love to help. </h2>
					<p> We like to create thing with fun, open minded people. Feel Free to say hello.</p>
				</div>
				<hr>
			</div>
			<div class="col-md-6"> 
				{{ Form::open(['url' => 'contact', 'role' => 'form', 'method' => 'POST']) }}

					@if (Session::has('success'))
					    <div class="alert alert-success" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('success') }}</div>
					@endif

					@if ($errors->any())
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}</div>
						@endforeach
					@endif

					<div class="form-group">
						{{ Form::text('name', old('name'), array('class' => 'form-control', 'placeholder' => 'Enter Name')) }}
					</div>
					<div class="form-group">
						{{ Form::email('email', old('email'), array('class' => 'form-control', 'placeholder' => 'Enter Email')) }}
					</div>
					<div class="form-group">
						{{ Form::textarea('message', old('message'), array('class' => 'form-control', 'placeholder' => 'Enter Email', 'row' => '5')) }}
					</div>

					{{ Form::submit('Submit', array('class' => 'btn btn-success btn-lg btn-block pull-right', 'id' => 'form-submit')) }}

				{{ Form::close() }}
			</div>
		</div>
		<hr/>
	</div>
	@endsection
	@push('scripts')
		{{ Html::script('https://maps.googleapis.com/maps/api/js') }}
		{{ Html::script('assets/js/googleMap.js') }}
	@endpush