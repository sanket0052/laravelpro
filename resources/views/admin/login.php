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

		<!-- Custom CSS -->
		{{ Html::style('assets/admin/dist/css/sb-admin-2.css') }}

		<!-- Custom Fonts -->
		{{ Html::style('assets/admin/bower_components/font-awesome/css/font-awesome.min.css') }}

	</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<?php echo heading('Please Sign In', 5	, array('class'=>'panel-title', 'style'=>'font-size:18px;')); ?>
					</div>
					<div class="panel-body">
						
						{!! Form::open(array('url' => 'contact_request', 'role' => 'form')) !!}

							<!-- Display flashdata -->
							@if (count($errors) > 0)
								@foreach ($errors->all() as $error)
									<div class="alert alert-danger" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}</div>
								@endforeach
							@endif
							<!-- Display flashdata -->
							
							<div class="form-group">
								{{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Username', 'autofocus' => 'autofocus')) }}
							</div>
							
							<div class="form-group">
								{{ Form::password('password', '', array('class' => 'form-control', 'placeholder' => 'Password')) }}
							</div>

							{{ Form::submit('Login', array('class' => 'btn btn-lg btn-success btn-block')) }}

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Custom Theme JavaScript -->
	{{ Html::script('assets/admin/dist/js/sb-admin-2.js') }}
		
	</body>
</html>