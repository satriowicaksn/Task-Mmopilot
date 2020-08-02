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
          <table class="table table-sm mt-3" id="tabel_laporan">
            <thead class="bg-info text-center text-white">
              <tr>
                <th>No</th>
                <th>Pembuat Laporan</th>
                <th>Operator</th>
                <th>Order</th>
                <th>Tgl Laporan</th>
                <th></th>

              </tr>
            </thead>
            <tbody class="text-center" id="itemnya">
              <?php $no=1; ?>
              <?php foreach ($laporan as $l): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $l->manager ?></td>
                  <td><?= $l->staff ?></td>
                  <td><?= $l->nama_temjob ?></td>
                  <td><?= $l->laporan_date?></td>
                  <td>
                    <form class="" action="<?= base_url() ?>index.php/data_laporan/edit_laporan" method="post">
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit_laporan<?= $l->id_laporan ?>"> <span class="fa fa-eye"></span> </a>
                      <input type="hidden" name="id" value="<?= $l->id_laporan ?>">
                      <button type="submit" name="button" class="btn btn-sm btn-success"> <span class="fa fa-edit"></span> </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>

<!-- Modal -->
<?php foreach ($laporan as $l): ?>
<div class="modal fade bd-example-modal-lg" id="edit_laporan<?= $l->id_laporan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" class="text-dark" style="color:black;">Detail Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 style="color: black;">Pembuat Laporan : <?= $l->manager ?></h6>
        <h6 style="color: black;">Operator : <?= $l->staff ?></h6>
        <h6 style="color: black;">ID Client : <?= $l->username_game ?></h6>
        <h6 style="color: black;">Order : <?= $l->nama_temjob ?></h6>
        <h6 style="color: black;">Tanggal Laporan : <?= $l->laporan_date ?></h6>
        <table class="table table-sm mt-3" id="tabel_laporan">
          <thead class="bg-info text-center text-white">
            <tr>
              <th>No</th>
              <th>Item</th>
              <th>Dikerjakan</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no=1; ?>
            <?php foreach ($laporan_detail as $d): ?>
              <?php if ($d->id_laporan == $l->id_laporan): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d->laporan_item ?></td>
                  <td><?= $d->laporan_progres ?></td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<?php endforeach; ?>

<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){


});


</script>
