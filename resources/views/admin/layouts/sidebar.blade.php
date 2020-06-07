 <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="{{url('/admindashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>

                  
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-product-hunt"></i><span>Products</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/admin/add-products')}}">Add Product</a></li>
                        <li><a href="{{url('/admin/view-products')}}">View Product</a></li>
                        
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-list"></i><span>Categories</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/admin/add-category')}}">Add Category</a></li>
                        <li><a href="{{url('/admin/view-category')}}">View Categories</a></li>
                    </ul>
                 </li>

                 <li class="active">
                     <a href="{{url('/admin/banners')}}"><i class="fa fa-image"></i><span>Banners</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                 
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->