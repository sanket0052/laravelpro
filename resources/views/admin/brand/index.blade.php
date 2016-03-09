<!-- View stored in resources/views/admin/brand/index.blade.php -->
	@extends('admin.layout.master')

	@section('link')
		{{ Html::style('https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css') }}
	@endsection

	@section('title', 'Brand List')
	
	@section('heading', 'Brand List')
		
	@section('content')
				
		<div class="col-lg-12">
			{{ link_to('admin/brand/create', 'Add Brand', array('class' => 'btn btn-outline btn-primary', 'title'=>'Add Brand')) }}
			<!-- <i class="fa fa-plus-square"></i> -->
			<br/><br/>
			<div class="panel panel-default">
				<div class="panel-heading">
					Brand List
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
									<th>Brand Logo</th>
									<th>Brand Name</th>
									<th>Category List</th>
									<th>Brand Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach ($allbrands as $brand)
									<tr class="odd gradeX" id="{{ $brand->id }}">
										<td>{{ Html::image('/assets/images/uploads/brands/thumbils/'.$brand->thumb, '', array('class' => 'img-responsive') ) }}</td>
										<td>{{ $brand->name }}</td>
										<td>
											@foreach($brand->categories as $category) 
												<span>
													<a href="" class="label label-primary" data-toggle="tooltip" title="" data-original-title="See Product of This Category">
														{{ $category->name }}
													</a>
												</span>&nbsp;
											@endforeach	
										</td>
										<td>
											{{ $brand->status == 1 ? 'Enable' : 'Disable' }}
										</td>
										<td>
											{!! Form::open(array('url' => 'admin/brand/'.$brand->id)) !!}
												{{ Form::hidden('_method', 'DELETE') }}

												<!-- Update Link -->
												<a href="{{ URL::to('admin/brand/'.$brand->id.'/edit') }}" class = "btn btn-outline btn-primary" data-toggle = "tooltip" title = "Edit Brand" ><i class="fa fa-pencil"></i></a>
												
												<!-- Delete Link -->
												<button type="submit" value="" class = "btn btn-outline btn-danger" data-toggle = "tooltip" title = "Delete Brand" >
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
