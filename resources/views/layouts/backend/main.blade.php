 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title', 'MyBlog')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('backend/css/skins/_all-skins.min.css') }}">
  <!-- Simplemde -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/simplemde/simplemde.min.css') }}">
  <!-- Bootstrap datetimepicker -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
  <!-- jasny-bootstrap -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
  <!-- Custom Style -->
  <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">

   
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.backend.navbar')

  @include('layouts.backend.sidebar')

  @yield('content')
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('backend/js/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<!-- Simplemde -->
<script src="{{ asset('backend/plugins/simplemde/simplemde.min.js') }}"></script>
<!-- Moment.js -->
<script src="{{ asset('backend/plugins/bootstrap-datetimepicker/js/moment.js') }}"></script>
<!-- Bootstrap Datetimepicker -->
<script src="{{ asset('backend/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- jasny-bootstrap -->
<script src="{{ asset('backend/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/js/app.min.js') }}"></script>

@yield('script')

</body>
</html>
