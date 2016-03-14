<!-- View stored in resources/views/admin/brand/edit.blade.php -->

	@extends('admin.layout.master')

	@section('title', 'Brand')
	
	@section('heading', 'Edit '.$brand->name)
		
	@section('content')

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Brand Form
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-8">

							<!-- Display flashdata -->
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
							<!-- Display flashdata -->

							{!! Form::model($brand, array('route' => ['admin.brand.update', $brand->id], 'role' => 'form', 'class' => 'form-horizontal', 'files' => true, 'method' => 'PUT')) !!}
							{{ csrf_field() }}
							
								<div class="form-group">
									{{ Form::label('name', 'Brand Name', ['class' => 'col-md-3 control-label']) }}
									
									<div class="col-md-9">
										{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Add Brand Name here...']) }}
									</div>
								</div>
								
								<div class="form-group">
									{{ Form::label('description', 'Brand Description', ['class' => 'col-md-3 control-label']) }}

									<div class="col-md-9">
										{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' =>  'Add Brand Description here...', 'rows' => '5', 'cols' => '25']) }}
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('category_list', 'Categories', ['class' => 'col-md-3 control-label']) }}

									<div class="col-md-9">
										@foreach ($allcategory as $key => $value)
											<label class="checkbox-inline">
												{{ Form::checkbox('category_list[]', $key, in_array($key, $categories) ? true : false ) }}
												{{ $value }}
											</label>
										@endforeach
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('status', 'Brand Status', ['class' => 'col-md-3 control-label']) }}

									<div class="col-md-9">
										<div class="radio">
											<label>
												{{ Form::radio('status', '1', ($brand->status ==1) ? true : '') }}
												Active
											</label>
											<label>
												{{ Form::radio('status', '0', ($brand->status ==0) ? true : '') }}
												Disable
											</label>
										</div>
									</div>
								</div>

								<div class="form-group">
									{{ Form::label('logo', 'Brand Logo', ['class' => 'col-md-3 control-label']) }}

									<div class="col-md-9">
										{{ Form::file('logo') }}
									</div>
								</div>
							
								<hr>
								<div class="col-md-offset-3">
									{{ Form::submit('Update Brand', ['class' => 'btn btn-primary']) }}
								</div>

							{{ Form::close() }}
						</div>
						
						<div class="col-md-4 pull-left">
							<td>{{ Html::image('assets/images/uploads/brands/'.$brand->logo, '', ['class' => 'img-responsive', 'style' => 'width:200px;']) }}</td>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection