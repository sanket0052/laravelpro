<!-- View stored in resources/views/admin/product/edit.blade.php -->

	@extends('admin.layout.master')

	@section('title', 'Product')
	
	@section('heading', 'Edit '.$product->name)
		
	@section('content')

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Product Form
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

							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#general" data-toggle="tab">General</a>
								</li>
								<li>
									<a href="#data" data-toggle="tab">Data</a>
								</li>
							</ul>

							{{ Form::open(array('url' => 'admin/product/'.$product->id, 'role' => 'form', 'class' => 'form-horizontal', 'files' => true, 'method' => 'PUT')) }}
							{{ csrf_field() }}
							
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane fade in active" id="general">
										<br/>
										<div class="form-group">
											{{ Form::label('name', 'Product Name', array('class' => 'col-md-2 control-label')) }}
											<div class="col-md-8">
												{{ Form::text('name', $product->name, array('class' => 'form-control', 'placeholder' => 'Add Product Name here...')) }}
											</div>
										</div>
								
										<div class="form-group">
											{{ Form::label('category_id', 'Product Category', array('class' => 'col-md-2 control-label')) }}
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-9">
														{{ Form::select('category_id', $categoryList, $product->category_id, array('class' => 'form-control', 'id' => 'categorylist', 'placeholder' => 'Pick a Category...')) }}
														<em class="pull-right ">Depend on you category selection brand list will generate.</em>
													</div>

													<div class="col-md-3">
														<a href="{{ URL::to('admin/category/create') }}" target="_blank" class="btn btn-outline btn-info btn-block" data-toggle = "tooltip" title = "Add New Category" ><i class="fa fa-plus"></i> Add New Category</a>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											{{ Form::label('brand_id', 'Product Brand', array('class' => 'col-md-2 control-label')) }}
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-9">
													{{ Form::select('brand_id', $brandList, $product->brand_id, array('class' => 'form-control', 'id' => 'brandlist', 'disabled' => true)) }}

													</div>
													<div class="col-md-3">
														<a href="{{ URL::to('admin/brand/create') }}" target="_blank" class="btn btn-outline btn-info btn-block " data-toggle = "tooltip" title = "Add New Brand" ><i class="fa fa-plus"></i> Add New Brand</a>
													</div>
													<div class="col-md-12">
														<br/>
														<div role="alert" class="alert alert-danger alert-dismissable" id="error" style="display:none;">
															<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
															<p></p>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											{{ Form::label('description', 'Product Description', array('class' => 'col-md-2 control-label')) }}

											<div class="col-md-8">
												{{ Form::textarea('description', $product->description, array('class' => 'form-control', 'placeholder' =>  'Add Product Description here...', 'rows' => '5', 'cols' => '25')) }}
											</div>
										</div>
									</div>

									<div class="tab-pane fade" id="data">
										<br/>

										<div class="form-group">
											{{ Form::label('model', 'Product Model', array('class' => 'col-md-2 control-label')) }}
											<div class="col-md-8">
												{{ Form::text('model', $product->model, array('class' => 'form-control', 'placeholder' => 'Add Product Model here...', 'tab-index')) }}
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													{{ Form::label('stock', 'Product Stock', array('class' => 'col-md-4 control-label')) }}
													<div class="col-md-8">
														<div class="col-md-12">
															<div class="form-group input-group">
																<span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
																{{ Form::text('stock', $product->stock, array('class' => 'form-control', 'placeholder' => 'Add Product Stock here...', 'tab-index')) }}
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													{{ Form::label('status', 'Product Status', array('class' => 'col-md-4 control-label')) }}

													<div class="col-md-8">
														<div class="radio">
															<label>
																{{ Form::radio('status', '1', ($product->status ==1) ? true : '') }}
																Active
															</label>
															<label>
																{{ Form::radio('status', '0', ($product->status ==0) ? true : '') }}
																Disable
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													{{ Form::label('price', 'Product Price', array('class' => 'col-md-4 control-label')) }}
													<div class="col-md-8">
														<div class="col-md-12">
															<div class="form-group input-group">
																<span class="input-group-addon"><i class="fa fa-inr"></i></span>
																{{ Form::text('price', $product->price, array('class' => 'form-control', 'placeholder' => 'Add Product Price here...', 'tab-index')) }}
																<span class="input-group-addon">.00</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
											
										<div class="form-group">
											{{ Form::label('image', 'Product Logo', array('class' => 'col-md-2 control-label')) }}

											<div class="col-md-8">
												{{ Form::file('image') }}
											</div>
										</div>
									</div>
								</div>

								<hr>

								<div class="col-md-offset-2">
									{{ Form::submit('Update Product', array('class' => 'btn btn-primary')) }}
								</div>

							{{ Form::close() }}

						</div>

					<!-- /.col-lg-6 (nested) -->
				</div>
			</div>
		</div>
	</div>
</div>
	@endsection
	@push('scripts')
		{{ Html::script('assets/admin/dist/js/brand-list-ajax.js') }}
	@endpush