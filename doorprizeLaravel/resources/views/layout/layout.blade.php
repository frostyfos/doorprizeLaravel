<!DOCTYPE html>
<html lang="en">


  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  
    @yield('title')

    
  
    <!-- Bootstrap core CSS -->
    @include('layout.header')
    
  </head>


<body>

  <div class="d-flex" id="wrapper">

    @include('layout.sidebar')

    <!-- Page Content -->
    <div id="page-content-wrapper">

      @include('layout.navbar')

      <div class="container-fluid">
         @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  @include('layout.script')

  @yield('script')

 

</body>

</html>
