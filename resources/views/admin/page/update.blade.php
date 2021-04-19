@extends('admin/layout/layout')

@section('page_title','Update Page')

@section('container')

<div class="">
               <div class="page-title">
                  <div class="title_left">
                     <h3>Update Post</h3>
                  </div>
               </div>
               <div class="clearfix"></div>
               <div class="row">
                  <div class="col-md-12 ">
                     <div class="x_panel">
                        <div class="x_content">
                           <br />
                           <form method="post" action="/admin/page/update12" class="form-horizontal form-label-left"  enctype="multipart/form-data">
                           <!-- <form method="post" action="{{url('/admin/page/update12')}}" class="form-horizontal form-label-left"> -->
                              @csrf
                              
                              <input type="hidden" name="id" value="{{$res->id}}" />
                              <div class="form-group row ">
                                 <label class="control-label col-md-3 col-sm-3 ">Name</label>
                                 <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Page Name" name="name" value="{{$res->name}}" required>
                                 </div>
                              </div>
                              <div class="form-group row ">
                                 <label class="control-label col-md-3 col-sm-3 ">Slug</label>
                                 <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{$res->slug}}" required>
                                 </div>
                              </div>
                              <div class="form-group row ">
                                 <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                 <div class="col-md-9 col-sm-9 ">
                                    <textarea class="form-control"  name="description" required>{{$res->description}}</textarea>
                                 </div>
                              </div>

                              <div class="ln_solid"></div>
                              <div class="form-group">
                                 <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         

@endsection