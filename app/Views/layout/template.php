<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rental Laptop</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/plugin/pace/pace.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/plugin/toastr/toastr.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/plugin/swal/sweetalert2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <style>
        .btn-rencana-tagihan {
        display: none;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/PACE/pace.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/adminlte/plugin/swal/sweetalert2.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/adminlte/plugin/toastr/toastr.min.js"></script>
    <script>
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    function makeNotif(status, message) {
        toastr[status](message);
        return false;
    }
    </script>
    <!-- DataTables -->
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>/public/assets/adminlte/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url() ?>/public/assets/apl/sidik.js?<?php echo microtime()?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script>
    let table;
    const base_url = "<?php echo base_url() ?>";
    $(document).ready(function () {
        $('.sidebar-menu').tree();
        $("table").not(".nodt").DataTable();
        $(".select2").select2();
    })
    $(document).ajaxStart(function () {
        Pace.restart();
    });

    $.fn.datepicker.dates['id'] = {
        days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"],
        daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
        daysMin: ["Mi", "Sen", "Sel", "Ra", "Ka", "Ju", "Sa"],
        months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"],
        today: "Hari Ini",
        clear: "Bersih",
        format: "dd-mm-yyyy",
        titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
        weekStart: 0
    };

    $.extend(true, $.fn.dataTable.defaults, {
        "language": {
            sProcessing: "Sedang memproses...",
            sLengthMenu: "Tampilkan _MENU_ entri",
            sZeroRecords: "Tidak ditemukan data yang sesuai",
            sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
            sInfoPostFix: "",
            sSearch: "Cari:",
            sUrl: "",
            oPaginate: {
            sFirst: "Pertama",
            sPrevious: "Sebelumnya",
            sNext: "Selanjutnya",
            sLast: "Terakhir"
            }
        }
    });

    </script>
    <style>
    </style>
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url() ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>L</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo "Rental"?></b><?php echo "LAPTOP"?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url() ?>/public/assets/adminlte/dist/img/blank-profile.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $user["nama"] ?></span>
                </a>
                <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="<?php echo base_url() ?>/public/assets/adminlte/dist/img/blank-profile.png" class="img-circle" alt="User Image">

                    <p>
                    <?php echo $user["nama"] ?>
                    <small><?php echo $user["nama"]?></small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                    </div>
                    <div class="pull-right">
                    <a href="<?php echo base_url("admin/auth/logout") ?>" class="btn btn-danger btn-flat">Sign out</a>
                    </div>
                </li>
                </ul>
            </li>
            </ul>
        </div>
        </nav>
    </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url("admin/dashboard") ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url("admin/customer") ?>">
            <i class="fa fa-users"></i> <span>Customer</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url("admin/laptop") ?>">
            <i class="fa fa-laptop"></i> <span>Daftar Laptop</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url("admin/transaksi") ?>">
            <i class="fa fa-money"></i> <span>Daftar Transaksi</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php if (isset($breadcrumb)) : 
      //$this->load->view("tpl/breadcrumb");
    endif ?>

    <!-- Main content -->
    <?php //$this->load->view($view) ?>
    <!-- /.content -->
    <section class="content">
        <!-- Default box -->
        <?php $this->rendersection('isi'); ?>
        
    </section>
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer" style="color: #fff; background-color: #00A65A">
    <div class="pull-right hidden-xs">
        <strong class="realtime-day"><?php echo date("l") ?></strong>, <span class="realtime-timer"><?php echo date("d-F-Y H:i:s") ?></span>
    </div>
    <strong>Rental | LAPTOP</strong>
</footer>

<script>
    window.setTimeout("waktu()", 1000);
 
    function waktu() {
        var tanggallengkap = new String(),
        waktu          	   = new Date();
        
        var namahari       = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu"),
        namahari           = namahari.split(" "),
        namabulan          = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember"),
        namabulan          = namabulan.split(" ");
        
        var hari           = waktu.getDay();
        var tanggal        = waktu.getDate();
        var bulan          = waktu.getMonth();
        var tahun          = waktu.getFullYear();
    
        tanggallengkap     = namahari[hari] + ", " + (tanggal < 10 ? "0" +tanggal : tanggal) + " " + namabulan[bulan] + " " + tahun;
    
        setTimeout("waktu()", 1000);
    
        var sekarang = "<strong>" + tanggallengkap + "</strong> ,  " + (waktu.getHours() < 10 ? "0" + waktu.getHours() : waktu.getHours()) + ":" + (waktu.getMinutes() < 10 ? "0"+waktu.getMinutes() : waktu.getMinutes()) + ":" + (waktu.getSeconds() < 10 ? "0"+waktu.getSeconds() : waktu.getSeconds());
    
        document.querySelector(".main-footer > div").innerHTML = sekarang;
    } 
</script>
</div>
<!-- ./wrapper -->

</body>
</html>
