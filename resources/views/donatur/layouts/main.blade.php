<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title class="title">@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://bookstories.000webhostapp.com/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://bookstories.000webhostapp.com/admin/css/trix.css">
    <script type="text/javascript" src="https://bookstories.000webhostapp.com/admin/js/trix.js"></script>

    <style class="text/css">
      table thead tr th{
        font-size: 12px;
        padding: 1000px;
      }
      table tbody tr td{
        font-size: 10px;
      }
    </style>

</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    @include('donatur.partials.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        @yield('content')
        @include('donatur.partials.footer')
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@include('admin.partials.logout')

<script src="https://bookstories.000webhostapp.com/admin/vendor/jquery/jquery.min.js"></script>
<script src="https://bookstories.000webhostapp.com/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="https://bookstories.000webhostapp.com/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="https://bookstories.000webhostapp.com/admin/js/sb-admin-2.min.js"></script>
<script>
    $(document).ready(function () {

    window.setTimeout(function() {
        $("#alert-pop").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove();
        });
    }, 2000);

    });
</script>

<!-- Page level plugins -->
<script src="https://bookstories.000webhostapp.com/admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://bookstories.000webhostapp.com/admin/js/demo/chart-area-demo.js"></script>
<script src="https://bookstories.000webhostapp.com/admin/js/demo/chart-pie-demo.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
