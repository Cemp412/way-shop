@extends('admin.layouts.master')
@section('title', 'Banners')
@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>View Banner</h1>
                  <!-- <small>Categories List</small> -->
               </div>
            </section>


            <div class="container">
                @if(Session::has('flash_message_error'))
                <div class="alert alert-sm alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" area-label="close">
                        <span area-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
                @endif


                @if(Session::has('flash_message_success'))
                <div class="alert alert-sm alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" area-label="close">
                        <span area-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
                @endif

                <div id="message_success" style="display:none;" class="alert alert-success"> Status Enabled</div>
                <div id="message_error" style="display:none;" class="alert alert-success"> Status Disabled</div>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Banners</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="/admin/add-banner"> <i class="fa fa-plus"></i> Add Banner
                                 </a>  
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="#table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th> Id</th>
                                       <th>Name</th>
                                       <th>Sort Order</th>
                                       <th>Image</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($bannerDetails as $bannerDetail)
                                 <tbody>
                                  
                                    <tr>
                                       <td>{{$bannerDetail->id}}</td>
                                       <td>{{$bannerDetail->name}}</td>
                                       <td>{{$bannerDetail->sort_order}}</td>
                                       <td>
                                         @if(!empty($bannerDetail->image))
                                        <center> <img src="{{asset('/uploads/banners/' .$bannerDetail->image)}}" style="width: 200px;"></center>
                                       </td>
                                       @endif
                                       <td>status</td>
                                      
                                       
                                       <td>
                                         <a href="{{url('/admin/edit-banner/' .$bannerDetail->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>

                                         <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                       </td>
                                       @endforeach
                                    </tr>
                                 
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection