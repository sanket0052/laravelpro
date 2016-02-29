	@extends('layouts.master')

	@section('title', 'Home')
		
	@section('content')
	
	<div class="container contact-form">

		<ol class="breadcrumb">
			<li class="active">
				<a >home</a>
			</li>
		</ol>

		<div class="row"> 

			<div class="col-md-8"> 

				{!! Form::open(array('url' => 'contact_request', 'class' => 'form-color')) !!}


					@if (count($errors) > 0)
							@foreach ($errors->all() as $error)
								<div class="alert alert-danger" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}</div>
							@endforeach
					@endif

					<div class="form-group">
						{{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Enter Name')) }}
					</div>
					<div class="form-group">
						{{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Enter Email')) }}
					</div>
					<div class="form-group">
						{{ Form::textarea('message', '', array('class' => 'form-control', 'placeholder' => 'Enter Email', 'row' => '5')) }}
					</div>

					{{ Form::submit('Submit', array('class' => 'btn btn-success btn-lg pull-right', 'id' => 'form-submit')) }}

				{!! Form::close() !!}

			</div>

			<div class="col-md-4"> 
				<div id="googleMap" style="width:100%;height:380px;"></div>
				{{ Html::script('https://maps.googleapis.com/maps/api/js') }}
				{{ Html::script('assets/js/googleMap.js') }}
			</div>

		</div>

	</div>
	@endsection