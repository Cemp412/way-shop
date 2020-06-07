@extends('admin.layouts.master')
@section('title', 'View Products')
@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Products</h1>
                  <small>Product List</small>
               </div>
            </section>


            <div class="container">
               

                <div id="message_success" style="display:none;" class="alert alert-sm alert-success"> Status Enabled</div>
                <div id="message_error" style="display:none;" class="alert alert-sm  alert-success"> Status Disabled</div>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Add Product</h4>
                              </a>
                           </div>
                        </div>

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
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="/admin/add-products"> <i class="fa fa-plus"></i> Add Product
                                 </a>  
                              </div>
                             
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="#table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Product Id</th>
                                       <th>Product Name</th>
                                       <th>Category Id</th>
                                       <th>Product Code</th>
                                       <th>Product Color</th>
                                       <th>Image</th>
                                       <th>Price</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($pro as $prod)
                                 <tbody>
                                    
                                    <tr>
                                       <td>{{$prod->id}}</td>
                                       <td>{{$prod->product_name}}</td>
                                        <td>{{$prod->category_id}}</td>
                                       <td>{{$prod->product_code}}</td>
                                        <td>{{$prod->product_color}}</td>
                                       <td>@if(!empty($prod->image))
                                          <img src="{{asset('/uploads/product/'  .$prod->image)}}" alt="" style="width: 100px">
                                       </td>
                                       @endif
                                       <td>{{$prod->product_price}}</td>
                                       <td>
                                          <input type="checkbox" class="ProductStatus btn btn-success" rel="{{$prod->id}}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger"@if($prod['status']== "1") checked @endif>

                                          
                                       </td>
                                        <td>

                                          <a href="{{url('/admin/add-attributes/'.$prod->id)}}" class="btn btn-warning btn-sm" "><i class="fa fa-list"></i></a>
                                          <a href="{{url('/admin/edit-product/'.$prod->id)}}" class="btn btn-add btn-sm" "><i class="fa fa-pencil"></i></a>
                                          <a href="{{url('/admin/delete-product/'.$prod->id)}}" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i> </a>
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
              
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection