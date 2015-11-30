
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Internet Monitor</title>

   <link href="/bower/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="/bower/bootstrap/dist/js/bootstrap.min.js" rel="stylesheet">
   <link href="/css/dashboard.css" rel="stylesheet">      

  </head>

  <body>

  	@include('layout.navbar')

    <div class="container-fluid">
      <div class="row">
       
	  	@include('layout.leftnav')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        
          @yield('content')
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/bower/jquery/dist/jquery.min.js"></script>
    <script src="/bower/bootstrap/dist/js/bootstrap.min.js"></script>

  </body>
</html>
