	@extends('layouts.master')

	@section('title', 'Home')
		
	@section('content')
	
	{!! Form::open(array('url' => 'home/showcontact')) !!}

		<div class="container contact-form">

			<div class="row">
	            <div class="form-group col-sm-6">
	                {{ Form::label('name', 'Enter name') }}
	                {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Enter Name')) }}
	            </div>
	            <div class="form-group col-sm-6">
	                {{ Form::label('email', 'E-Mail Address') }}
	                {{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Enter Email')) }}
	            </div>
	        </div>
	        <div class="form-group">
	            {{ Form::label('message', 'Message') }}
	            {{ Form::textarea('message', '', array('class' => 'form-control', 'placeholder' => 'Enter Email', 'row' => '5')) }}
	        </div>
	        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>

		</div>
	{!! Form::close() !!}
	@endsection