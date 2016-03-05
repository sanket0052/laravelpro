<!-- View stored in resources/views/admin/product/index.blade.php -->
	@extends('admin.layout.master')

	@section('link')
		{{ Html::style('https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css') }}
	@endsection

	@section('title', 'Product List')
	
	@section('heading', 'Product List')
		
	@section('content')
				
		<div class="col-lg-12">
			{{ link_to('admin/product/create', 'Add Product', array('class' => 'btn btn-outline btn-primary', 'title'=>'Add Product')) }}
			<!-- <i class="fa fa-plus-square"></i> -->
			<br/><br/>
			<div class="panel panel-default">
				<div class="panel-heading">
					Product List
				</div>
				<!-- /.panel-heading -->

				<div class="panel-body">

					@if(Session::has('flash_message'))
						<div class="col-ms-12" > 
							<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('flash_message') }}</div>
						</div>
					@endif

					<div class="dataTable_wrapper">
						<table class="table table-striped table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Product Logo</th>
									<th>Product Name</th>
									<th>Category List</th>
									<th>Product Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach ($allproducts as $product)
									<tr class="odd gradeX" id="{{ $product->id }}">
										<td>{{ Html::image('/assets/images/uploads/product/thumbils/'.$product->thumb, '', array('class' => 'img-responsive') ) }}</td>
										<td>{{ $product->name }}</td>
										<td>

										</td>
										<td>
											{{ $product->status ==1 ? 'Enable' : 'Disable' }}
										</td>
										<td>
											{!! Form::open(array('url' => 'admin/product/'.$product->id)) !!}
												{{ Form::hidden('_method', 'DELETE') }}

												<!-- Update Link -->
												<a href="{{ URL::to('admin/product/'.$product->id.'/edit') }}" class = "btn btn-outline btn-primary" data-toggle = "tooltip" title = "Edit Product" ><i class="fa fa-pencil"></i></a>
												
												<!-- Delete Link -->
												<button type="submit" value="" class = "btn btn-outline btn-danger" data-toggle = "tooltip" title = "Delete Product" >
													<i class="fa fa-times"></i>
												</button>
											{!! Form::close() !!}
										</td>
									</tr> 
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>
@endsection
@push('scripts')
	{{ Html::script('https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js') }}
	{{ Html::script('assets/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}
	{{ Html::script('assets/admin/dist/js/table.js') }}
	{{ Html::script('https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js') }}
@endpush
