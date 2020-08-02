<section>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-book"></span>&nbsp&nbsp Data Laporan Job
      </div>
      <div class="card-body">
        <div class="alert alert-warning" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="fa fa-n"></span> Data Laporan , sebagai admin anda dapat melakukan update jika ada kesalahan laporan
      </div>

        <div class="table-responsive">
          <form class="" action="<?= base_url() ?>index.php/data_laporan/get_by_date" method="post">
            <h6 class="ml-3 text-dark text-center">Cari Laporan Berdasarkan Tanggal &nbsp&nbsp<span class="fa fa-search"></span> </h6>
            <br>
            <div class="row ml-1">
              <div class="input-group col-md-6 mt-2">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-info">dari tanggal : </button>
                </div>
                <input type="date" class="form-control" name="awal" value="" required>
              </div>
              <div class="input-group col-md-6 mt-2">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-info">sampai tanggal : </button>
                </div>
                <input type="date" class="form-control" name="akhir" value="" required>
              </div>
            </div>
            <br>
            <div class="row ml-1 mt-3 mb-3">
              <div class="col-6">
                <a href="<?= base_url() ?>index.php/data_laporan/get_all" class="btn btn-sm btn-danger text-white col-12" style="border-radius: 20px;"> <span class="fa fa-search"></span>&nbsp&nbsp Tampilkan Semua</a>
              </div>
              <div class="col-6">
                <button type="submit" name="button" class="btn btn-sm btn-dark text-white col-12" style="border-radius: 20px;"> <span class="fa fa-search"></span>&nbsp&nbsp Cari Sesuai Tanggal</button>
              </div>
              <div class="col-4">

              </div>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>


<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){


});


</script>
