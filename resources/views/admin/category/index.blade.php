	@extends('admin.layout.master')

	@section('link')
		{{ Html::style('https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css') }}
	@endsection

	@section('title', 'Category')
	
	@section('heading', 'Add Category')
		
	@section('content')
				
		<div class="col-lg-12">
			{{ link_to('admin/category/create', 'Add Category', array('class' => 'btn btn-outline btn-primary', 'title'=>'Add Category')) }}
			<!-- <i class="fa fa-plus-square"></i> -->
			<br/><br/>
			<div class="panel panel-default">
				<div class="panel-heading">
					Categories List
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
									<th>Category Name</th>
									<th>Category Url Name</th>
									<th>Parent Category</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($allcategory as $key => $value)
									{
										$categoryList[$value->id] = $value->name;
									}
								?>
								@foreach ($allcategory as $category)
									<tr class="odd gradeX" id="{{ $category->id }}">
										<td>{{ $category->name }}</td>
										<td>{{ $category->urlname }}</td>
										<td>
											@if(!is_null($category->parent_id) && $category->parent_id!=0)
												{{ array_search($category->parent_id, $categoryList) }}
											@endif
										</td>
										<td>
											<a href="" class = "btn btn-outline btn-primary" data-toggle = "tooltip" title = "Edit Category" ><i class="fa fa-pencil"></i></a>
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