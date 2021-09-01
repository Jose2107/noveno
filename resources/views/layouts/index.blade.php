<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel Administrativo </title>

   <!-- Bootstrap -->
   <link href="{{asset('bootstrap\dist\css\bootstrap.min.css')}}" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css')}}">
    <!-- Nprogress -->
    <link rel="stylesheet" href="{{asset('css\nprogress.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('css\green.css')}}">
    <!-- progresbar -->
    <link rel="stylesheet" href="{{asset('css\jquery.mCustomScrollbar.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('css\custom.min.css')}}">
    

    
 
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard" class="site_title"><span>Trasnportes Avila</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <!--<img src="" alt="..." class="img-circle profile_img">-->
              </div>
              
                  <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('images\Avila.jpeg')}}" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Reportes</h3>
                <ul class="nav side-menu">
                      <li><a href="{{route('indextrans')}}"><i class="fa fa-truck"></i>Transportes</a></li>
                      <li><a href="{{route('operadores.reporteoperadores')}}"><i class="fa fa-male"></i>Operadores</a></li>
                      <li><a href="{{route('clientes.index')}}"><i class="fa fa-group"></i>Clientes</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
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
                    <div class=" dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <form method="POST" action="{{ route('logout') }}">
                      @csrf
                        <x-jet-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                              this.closest('form').submit();">
                              {{ __('Cerrar sesion') }}
                        </x-jet-dropdown-link>
                      </form>
                    </div>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

              @yield('Content')
          
            </div>
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
    
    
    <!-- jQuery -->
    <script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('nprogress/nprogress.js')}}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{asset('js\jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<!-- bootstrap-progressbar -->
	<script src="{{asset('bootstrap\bootstrap-progressbar.min.js')}}"></script>
	<!-- iCheck -->
	<script src="{{asset('iCheck\icheck.min.js')}}"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="{{asset('js\moment\moment.min.js')}}"></script>
	<script src="{{asset('js\datepicker\daterangepicker.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('js\custom.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    
    
  </body>
</html>