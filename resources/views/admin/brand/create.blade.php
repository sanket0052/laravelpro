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
							@if($errors->any())
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

							{{ Form::open(array('url' => 'admin/brand', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true)) }}
							{{ csrf_field() }}

								<div class="form-group">
									{{ Form::label('name', 'Brand Name', ['class' => 'col-md-2 control-label']) }}
									<div class="col-md-8">
										{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add Brand Name here...']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('description', 'Brand Description', ['class' => 'col-md-2 control-label']) }}

									<div class="col-md-8">
										{{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' =>  'Add Brand Description here...', 'rows' => '5', 'cols' => '25']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('category_list', 'Categories', ['class' => 'col-md-2 control-label']) }}
									<div class="col-md-8">
										@foreach ($allcategory as $key => $value)
											<label class="checkbox-inline">
												{{ Form::checkbox('category_list[]', $key) }}
												{{ $value }}
											</label>
										@endforeach
										<br/><br/>
										<a href="{{ URL::to('admin/category/create') }}" target="_blank" class="btn btn-outline btn-info" data-toggle = "tooltip" title = "Add New Category" >
											<i class="fa fa-plus"></i> Add New Category
										</a>
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('status', 'Brand Status', ['class' => 'col-md-2 control-label']) }}

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
									{{ Form::label('logo', 'Brand Logo', ['class' => 'col-md-2 control-label']) }}

									<div class="col-md-8">
										{{ Form::file('logo') }}
									</div>
								</div>

								<hr>
								<div class="col-md-offset-2">
									{{ Form::submit('Add Brand', ['class' => 'btn btn-primary']) }}
								</div>
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection