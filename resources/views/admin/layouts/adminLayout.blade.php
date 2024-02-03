<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.includes.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- menu profile quick info - sidebar menu - menu footer buttons-->
            @include('admin.includes.sidebar')
        <!-- /menu profile quick info-/sidebar menu-/menu footer buttons -->

        <!-- top navigation -->
            @include('admin.includes.TopNavigation')
        <!-- /top navigation -->

        <!-- page content -->
            @yield('content')
        <!-- /page content -->

        <!-- footer content -->
             @include('admin.includes.footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
        @include('admin.includes.jQueryFooter')

  </body>
</html> 