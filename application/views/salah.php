<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

   </head>
<body>
<section>
  <!-- Modal Priority -->
    <div class="modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" id="staticBackdropLabel"> Authentication</h5>

          </div>
          <div class="modal-body text-center">
            <form class="" action="<?= base_url(); ?>index.php/login" method="post">
                <h2 class="text-danger" style="font-size: 100px;"> <span class="fa fa-warning"></span> </h2>
            <p class="text-dark">Username atau Password Salah !!</p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-sm col-md-3">Coba lagi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
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
$('#konfirmasi').modal('show');
});
</script>

</body>
</html>
