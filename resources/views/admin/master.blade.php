<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('admin/adminMaster/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/adminMaster/')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin/adminMaster/')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('admin/adminMaster/')}}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/adminMaster/')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('admin/adminMaster/')}}/dist/css/skins/_all-skins.min.css">
  <!--data table jquery plugin-->
    <link rel="stylesheet" href="{{asset('admin/adminMaster/')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!--data table end-->
  
  <!--new styles js files-->
  
  <link rel="stylesheet" href="{{asset('admin/adminMaster/category_styles/addCategory.css')}}">
  
  <!--tinymce-->
  <script src='{{asset('admin/tinymce/tinymce.min.js')}}'></script>
  <script>
  tinymce.init({
//    selector: '#mytextarea'
  forced_root_block : "",
    selector: 'textarea'


  });
  </script>
  <!--tinymce end-->
  <!--new styes end-->
  

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 @include('admin.includes.headerNavbar')
  <!-- Left side column. contains the logo and sidebar -->
   @include('admin.includes.sidebar')


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @yield('body')
</div>
  <!-- /.content-wrapper -->

   @include('admin.includes.footer')


  <!-- Control Sidebar -->
   @include('admin.includes.rightsubsidebar')

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('admin/adminMaster/')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin/adminMaster/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{asset('admin/adminMaster/')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/adminMaster/')}}/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('admin/adminMaster/')}}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="{{asset('admin/adminMaster/')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('admin/adminMaster/')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- DataTables plugin-->
<script src="{{asset('admin/adminMaster/')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin/adminMaster/')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<!-- SlimScroll -->
<script src="{{asset('admin/adminMaster/')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('admin/adminMaster/')}}/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/adminMaster/')}}/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/adminMaster/')}}/dist/js/demo.js"></script>
<!--data table js another--> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
