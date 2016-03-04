<!-- View stored in resources/views/admin/brand/create.blade.php -->

	@extends('admin.layout.master')

	@section('title', 'Brand')
	
	@section('heading', 'Add Brand')
		
	@section('content')

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Add New Brand Form
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">

							<!-- Display flashdata -->
							@if (count($errors) > 0)
								<div class="alert alert-danger" >
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
									</ul>
								</div>
							@endif
							<!-- Display flashdata -->

							{!! Form::open(array('url' => 'admin/brand', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true)) !!}
							{!! csrf_field() !!}

								<div class="form-group">
									{{ Form::label('name', 'Brand Name', array('class' => 'col-md-2 control-label')) }}
									<div class="col-md-8">
										{{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Add Brand Name here...')) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('description', 'Brand Description', array('class' => 'col-md-2 control-label')) }}

									<div class="col-md-8">
										{{ Form::textarea('description', '', array('class' => 'form-control', 'placeholder' =>  'Add Brand Description here...', 'rows' => '5', 'cols' => '25')) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('category_list', 'Categories', array('class' => 'col-md-2 control-label')) }}
									<div class="col-md-8">
										@foreach ($allcategory as $category)
											<label class="checkbox-inline">
												{{ Form::checkbox('category_list[]', $category->id) }}
												{{ $category->name }}
											</label>
										@endforeach
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('status', 'Brand Status', array('class' => 'col-md-2 control-label')) }}

									<div class="col-md-8">
										<div class="radio">
											<label>
												{{ Form::radio('status', '1', true) }}
												Active
											</label>
											<label>
												{{ Form::radio('status', '0') }}
												Disable
											</label>
										</div>
									</div>
								</div>
							
								<div class="form-group">
									{{ Form::label('logo', 'Brand Logo', array('class' => 'col-md-2 control-label')) }}

									<div class="col-md-8">
										{{ Form::file('logo') }}
									</div>
								</div>
							</div>
							<hr>
							<div class="col-md-offset-2">
								{{ Form::submit('Add Brand', array('class' => 'btn btn-primary')) }}

							</div>
						{!! Form::close() !!}
						<!-- /.col-lg-6 (nested) -->
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection