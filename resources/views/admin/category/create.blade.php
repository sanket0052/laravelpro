<!-- View stored in resources/views/admin/category/create.blade.php -->

	@extends('admin.layout.master')

	@section('title', 'Category')
	
	@section('heading', 'Add Category')
		
	@section('content')

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Add New Category Form
				</div>
				<div class="panel-body">
					<div class="row">

						<!-- Display flashdata -->
						<div class="col-md-12">
							@if ($errors->any())
								<div class="alert alert-danger" >
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
									</ul>
								</div>
							@endif
						</div>
						<!-- Display flashdata -->

						{{ Form::open(['url' => 'admin/category', 'role' => 'form']) }}
						{{ csrf_field() }}
							<div class="col-md-6">
								<div class="form-group">
									{{ Form::label('name', 'Category Name') }}

									{{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Add Category Name here...']) }}
								</div>

								<div class="form-group">
									{{ Form::label('parent_id', 'Parent Category') }}
									
									{{ Form::select('parent_id', $categoryList, old('parent_id'), ['class' => 'form-control', 'placeholder' => 'Pick a Parent Category...']) }}
								</div>

								<div class="form-group">
									{{ Form::label('status', 'Category Status') }}

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

							<div class="col-md-6">
								<div class="form-group">
									{{ Form::label('description', 'Category Description') }}

									{{ Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' =>  'Add Category Description here...', 'rows' => '5', 'cols' => '25']) }}
								</div>

								<div class="form-group">
									{{ Form::label('urlname', 'Category URL Name') }}

									{{ Form::text('urlname', old('urlname'), ['class' => 'form-control', 'placeholder' => 'Add Category URL Name here...']) }}
								</div>
							</div>
							<div class="clearfix"></div>
							<hr>
							<div class="col-md-6 form-footer">
								{{ Form::submit('Add Category', ['class' => 'btn btn-primary']) }}

							</div>
						{{ Form::close() }}
						<!-- /.col-lg-6 (nested) -->
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection