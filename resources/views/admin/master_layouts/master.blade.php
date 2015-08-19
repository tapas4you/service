<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service</title>

   
    <link href="{{ asset('/bootstrap/bootstrap-3.3.2/required/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/bootstrap/bootstrap-3.3.2/required/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
   <link href="{{ asset('/admin/css/plugins/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/admin/css/sb-admin-2.css') }}" rel="stylesheet">
    
     

    <!-- Custom Fonts -->
     <link href="{{ asset('/admin/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script type="text/javascript">
        var base_path = "{{ config('app.base_path') }}";
     </script>


</head>

    <body style="position:relative;">
     
      	<div id="wrapper">
	    	@include('admin.includes.navigations')
            <div id="page-wrapper">
	    	  @yield('content')
            </div>
		 </div>
		 <!-- /#wrapper -->

     <script src="{{ asset('/bootstrap/bootstrap-3.3.2/required/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('/admin/js/plugins/metisMenu/metisMenu.min.js') }}"></script>
   

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/admin/js/sb-admin-2.js') }}"></script>
    

    </body>
</html>