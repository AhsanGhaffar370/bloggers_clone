@extends('admin/layout/layout')

@section('page_title','Page Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h1>Page</h1>
			<h4><a href="/admin/page/add" class="btn btn-primary btn-md">Add Page</a></h4>
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
	  		
		 <div class="col-md-12 col-sm-12 ">
			@if(session('msg')!="")
			<div class="alert alert-{{session('alert')}} alert-dismissible fade show text-center d-block" role="alert">
				{{session('msg')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif 
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th width="2%">S.No</th>
									<th width="20%">Name</th>
									<th width="40%">Description</th>
									<th width="10%">Added On</th>
									<th width="10%">Status</th>
									<th width="18%">Action</th>
								 </tr>
							  </thead>
							  <tbody>
							  
								@foreach ($data as $d)
								<tr>
									<td>{{$d['id']}}</td>
									<td>{{$d['name']}}</td>
									<td>{{$d['description']}}</td>
									<td>{{$d['added_on']}}</td>
									<td>
									@if($d['status'] =="1")
										<span class="badge badge-success badge-{{$d['id']}}">Active</span>
									@else
										<span class="badge badge-danger badge-{{$d['id']}}">In-Active</span>
									@endif
									
									</td>
									<td>
										<div class="btn-group" style="display: -webkit-box;">
											<a href={{'/admin/page/update-rec/'.$d['id']}} class="btn btn-info btn-sm pt-1 pb-1">Edit</a>
											
											<button type="button" class="btn btn-info dropdown-toggle btn-sm pt-0 border-secondary border-left" data-toggle="dropdown" aria-expanded="false" style="padding-bottom: 1px !important">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu list-group" role="menu">
												@if($d['status'] =="1")
													<li><a href={{'/admin/page/update-status/'.$d["id"]}} id="0" class="list-group-item page-state page-status-{{$d['id']}}" >De-Activate</a></li>
												@else
													<li><a href={{'/admin/page/update-status/'.$d["id"]}} id="1"  class="list-group-item page-state page-status-{{$d['id']}}">Activate</a></li>
												@endif
											</ul>
											<a href={{'/admin/page/delete-rec/'.$d['id']}}  class="btn btn-danger btn-sm ml-2 pt-1 pb-1 rounded">Delete</a>
										</div>
									</td>
								</tr>
								@endforeach
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>



@endsection