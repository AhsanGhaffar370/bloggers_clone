<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('page_title')</title>
      <!-- <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->

      <!-- <link href="{{ asset('admin_asset/css/bootstrap.min.css') }}" rel="stylesheet"> -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <!-- <link href="{{ asset('admin_asset/css/font-awesome.min.css') }}" rel="stylesheet"> -->
      <script src="https://use.fontawesome.com/bd39c99e2f.js"></script>
      <!-- <link href="{{ asset('admin_asset/css/green.css') }}" rel="stylesheet"> -->

      <!-- <link href="{{ asset('admin_asset/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('admin_asset/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('admin_asset/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('admin_asset/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('admin_asset/css/scroller.bootstrap.min.css') }}" rel="stylesheet"> -->
      <link href="{{ asset('admin_asset/css/custom.min.css') }}" rel="stylesheet">
   </head>
   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <div class="col-md-3 left_col">
               <div class="left_col scroll-view">
                  <div class="navbar nav_title" style="border: 0;">
                     <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>{{@config('constants.site_name')}}</span></a>
                  </div>
                  <div class="clearfix"></div>
                  <br />
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                     <div class="menu_section">
                        <h3>Menu</h3>
                        <ul class="nav side-menu">
                           <li><a href="/admin/post/list"><i class="fa fa-home"></i> Post Vessel sale purchase</a></li>
                           <li><a href="/admin/post/add"><i class="fa fa-home"></i> Add Post </a></li>
						   <li><a href="/admin/page/list"><i class="fa fa-home"></i> Page </a></li>
						   <li><a href="/admin/contact/list"><i class="fa fa-home"></i> Contact Us </a></li>
						   
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
               <div class="nav_menu">
                  <div class="nav toggle">
                     <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
                  <nav class="nav navbar-nav">
                     <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                           <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                           Welcome <span class="font-weight-bold ml-1">{{session('user_name')}}</span>
                           </a>
                           <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item"  href="/admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                           </div>
                        </li>
					</ul>
                  </nav>
               </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
               @section('container')
			   @show
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
               <div class="pull-right">
                  Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
               </div>
               <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
      <!-- <script src="{{ asset('admin_asset/js/jquery.min.js') }}"></script> -->
      <!-- <script src="{{ asset('admin_asset/js/bootstrap.bundle.min.js') }}"></script> -->
      <script src="{{ asset('admin_asset/js/icheck.min.js') }}"></script>
      <script src="{{ asset('admin_asset/js/custom.js') }}"></script>



<script>
   $(document).ready(function(){
      $('.page-state').click(function(e){
         e.preventDefault();

         let status_val;
         let status= $(this).html();

         let href=$(this).attr('href');
         let id=href.split('/');

         let id_val=id[id.length - 1]

         // alert(id[id.length - 1]);
         if(status == "De-Activate"){
            status_val="0";
         }else{
            status_val="1";
         }

         $.ajax({
            url: href,
            data:"id=" + id_val + "&status=" + status_val,
            type: "get",
            success: function(res){
               if(res==0){
                  $('.page-status-'+id_val).html("Activate");
                  $('.page-status-'+id_val).attr("id","1");
                  $(".badge-"+id_val).html("In-Active");
                  // $(".badge-"+id_val).attr("class","badge badge-danger");
                  $(".badge-"+id_val).removeClass("badge-success");
                  $(".badge-"+id_val).addClass("badge-danger");
               }
               if(res==1){
                  $('.page-status-'+id_val).html("De-Activate");
                  $('.page-status-'+id_val).attr("id","0");
                  $(".badge-"+id_val).html("Active");
                  // $(".badge-"+id_val).attr("class","badge badge-success");
                  $(".badge-"+id_val).removeClass("badge-danger");
                  $(".badge-"+id_val).addClass("badge-success");
               }
            }
         });
      });
   });
</script>

   </body>
</html>