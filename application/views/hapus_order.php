<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



   </head>
<body>
<section>
  <!-- Modal Priority -->
    <div class="modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" id="staticBackdropLabel"> Berhasil Hapus Data</h5>

          </div>
          <div class="modal-body text-center">
            <form class="" action="<?= base_url(); ?>index.php/order" method="post">
                <h2 class="text-danger" style="font-size: 100px;"> <span class="fa fa-trash-o"></span> </h2>
            <p class="text-dark">Data Berhasil Di hapus !!</p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info btn-sm col-md-3">Oke</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#konfirmasi').modal('show');
});
</script>

</body>
</html>
