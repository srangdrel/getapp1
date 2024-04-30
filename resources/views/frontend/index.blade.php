<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RTC Gate Entry/Exit System</title>
  <link rel="shortcut icon" href="{{ asset('/images/fav.jpeg') }}">
  <!-- Google Font: Source Sans Pro -->
 
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
       var table = $('#example').DataTable( {
        lengthChange: false,
        order: [[6, 'desc'],[5, 'desc']],
        buttons: [ { extend: 'copy', text: 'Copy Data' }, { extend: 'excel', text: 'Export as Excel' }, { extend: 'pdf', text: 'Export as Pdf' } ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
   } );

</script>

</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark text-white">
    <div class="container">
    <a href="{{url('/Entry')}}" class="navbar-brand ">
        <img src="{{asset('/images/rtc.png')}}" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-white">RTC Gate Entry System</span>
    </a>
  
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse" style="float:right;">
        <ul class="navbar-nav" style="margin-left:100%;">
            <li class="nav-item">
                <a href="{{url('/reports')}}" class="nav-link text-white"><i class="far fa-file-pdf"></i> Report</a>
            </li>
            <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link text-white"><i class="far fa-file-pdf"></i> logout</a>
            </li>
            
          </ul>

        </div>
          
        </div>
</div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  
    <!-- Main content -->
  
    @yield('frontcontent')

  <!-- Main Footer -->
  



<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<!-- Bootstrap 4 -->

@stack('scripts')
@stack('styles')
</body>
</html>
