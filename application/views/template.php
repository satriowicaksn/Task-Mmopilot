<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MMOPILOT TASK</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/fc-3.3.1/datatables.min.css"/>

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase text-white"><strong class="text-white">MMO</strong><strong>PILOT</strong></div>
              <div class="brand-text brand-sm"><strong class="text-white">MMO</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">
            <div class="list-inline-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><span class="fa fa-user"></span>&nbsp&nbsp <?= $this->session->userdata('name'); ?></a>
              <div style="background: white;" aria-labelledby="languages" class="dropdown-menu"><a rel="nofollow" href="<?= base_url(); ?>index.php/login/logout" class="dropdown-item"><span class="text-info">Logout</span></a></div>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <ul class="list-unstyled text-light">
          <?php if ($this->session->userdata('role') == '1'): ?>
            <li><a href="<?= base_url(); ?>index.php/home"> <i class="fa fa-home"></i>Home</a></li>
            <li><a href="<?= base_url(); ?>index.php/game"><i class="fa fa-gamepad"></i>Data Game</a></li>
            <li><a href="<?= base_url(); ?>index.php/item"> <i class="fa fa-list"></i>Item</a></li>
            <li><a href="<?= base_url(); ?>index.php/job"> <i class="fa fa-archive"></i>Template</a></li>
            <li><a href="<?= base_url(); ?>index.php/order"> <i class="fa fa-shopping-cart"></i>Order</a></li>
            <li><a href="<?= base_url(); ?>index.php/laporan"> <i class="fa fa-edit"></i>Laporan</a></li>
            <li><a href="<?= base_url(); ?>index.php/data_laporan"> <i class="fa fa-book"></i>Data Laporan</a></li>
            <li><a href="<?= base_url(); ?>index.php/user/staff_data"><i class="fa fa-user"></i>Data Staff</a></li>
              <li><a href="<?= base_url(); ?>index.php/user/client_data"><i class="fa fa-users"></i>Data Client</a></li>

          <?php endif; ?>
          <?php if ($this->session->userdata('role') == '2'): ?>
            <li><a href="<?= base_url(); ?>index.php/home"> <i class="fa fa-home"></i>Home</a></li>
          <?php endif; ?>
          <?php if ($this->session->userdata('role') == '4'): ?>
            <li><a href="<?= base_url(); ?>index.php/home"> <i class="fa fa-home"></i>Home</a></li>
            <li><a href="<?= base_url(); ?>index.php/order"> <i class="fa fa-shopping-cart"></i>Order</a></li>
            <li><a href="<?= base_url(); ?>index.php/laporan"> <i class="fa fa-edit"></i>Laporan</a></li>
            <li><a href="<?= base_url(); ?>index.php/item"> <i class="fa fa-list"></i>Item</a></li>
            <li><a href="<?= base_url(); ?>index.php/job"> <i class="fa fa-archive"></i>Template</a></li>
            <li><a href="<?= base_url(); ?>index.php/data_laporan"> <i class="fa fa-book"></i>Data Laporan</a></li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">

        </div>
        <?php $this->load->view($konten); ?>
      </div>
    </div>

    <!-- JavaScript files-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">

</script>
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/charts-home.js"></script>
    <script src="<?= base_url(); ?>assets/js/front.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/fc-3.3.1/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $('#tabel').DataTable();
  });
</script>
    <!-- <script src="<?= base_url(); ?>assets/datatables/datatables.min.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/lib/js/dataTables.bootstrap.min.js"></script> -->
  </body>
</html>
