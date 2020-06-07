@extends('admin.layouts.master')
@section('title', 'Product Attributes')
@section('content')
<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-haunt"></i>
               </div>
               <div class="header-title">
                  <h1>Add Product Attributes</h1>
                  <small>Add Product Attributes</small>
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
             
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('/admin/view-products')}}"> 
                              <i class="fa fa-eye"></i> View Products </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/add-attributes/'.$productDetails->id)}}" method="post" enctype="multipart/form-data">
                           	{{csrf_field()}}

                            
                              </div>
                              <div class="form-group">
                                 <label>Product Name</label>
                                 {{$productDetails->product_name}}
                              </div>
                              <div class="form-group">
                                 <label>Product Code</label>
                                 {{$productDetails->product_code}}
                              </div>
                              <div class="form-group">
                                 <label>Productt Color</label>
                                 {{$productDetails->product_color}}
                              </div>
                             

                             <div class="form-group">
                               <div class="field_wrapper">
                                  <div style="display:flex; ">
                                     <input type="text" name="sku[]" id="sku" value="" placeholder="SKU" class="form-control" style="width: 120px; margin-right: 5px;" />
                                     <input type="text" name="size[]" id="size" value="" placeholder="SIZE" class="form-control" style="width: 120px; margin-right: 5px;" />
                                     <input type="text" name="price[]" id="price" value="" placeholder="PRICE" class="form-control" style="width: 120px; margin-right: 5px;" />
                                     <input type="text" name="stock[]" id="stock" value="" placeholder="STOCK" class="form-control" style="width: 120px; margin-right: 5px;" />
                                     <a href="javascript:void(0);" class="add_button" title="Add Field">Add</a>
                                    </div>
                                  </div>
                             </div>
                              <div class="reset-button">
                              	<input type="submit" class="btn btn-success" value="Add Attributes" >
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection