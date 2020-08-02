<section>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-edit"></span>&nbsp&nbsp Edit Data Laporan
      </div>
      <div class="card-body">
        <div class="alert alert-warning" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="fa fa-n"></span> Lakukan update sesuai data yang benar
      </div>
      <div class="ml-2">
        <?php foreach ($laporan as $l): ?>
          <h6 style="color:black;">Pembuat Laporan : <?= $l->manager ?></h6>
          <h6 style="color:black;">Operator : <?= $l->staff ?></h6>
          <h6 style="color:black;">CLient : <?= $l->client ?></h6>
          <h6 style="color:black;">Order : <?= $l->laporan_order ?></h6>
          <h6 style="color:black;">Tanggal Laporan : <?= $l->laporan_date ?></h6>

      </div>
        <div class="table-responsive">
          <form class="" action="<?= base_url() ?>index.php/data_laporan/update" method="post">
            <table class="table table-sm mt-3">
              <thead class="bg-info text-center text-white">
                <tr>
                  <th>No</th>
                  <th>Item</th>
                  <th>Progres</th>
                </tr>
              </thead>
              <tbody class="text-center" id="itemnya">
                <?php $no=1; ?>
                <?php foreach ($laporan_detail as $d): ?>
                  <?php if ($d->id_laporan == $l->id_laporan): ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><input type="hidden" name="cek_date[]" value="<?= $d->cek_date?>"><input type="hidden" name="id_laporan_item[]" value="<?= $d->id_laporan_item?>"><?= $d->laporan_item ?></td>
                      <td> <input type="hidden" name="total[]" value="<?= $d->order_target_progres?>"><input type="hidden" name="qty[]" value="<?= $d->order_progres?>"><input type="hidden" name="id_order_item[]" value="<?= $d->id_order_item?>">
                        <input type="number" name="progres[]" value="<?= $d->laporan_progres ?>">
                        <input type="hidden" name="order_durasi[]" value="<?= $d->order_durasi?>">
                        <input type="hidden" name="order_target_progres[]" value="<?= $d->order_target_progres?>">
                      </td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
              <?php endforeach; ?>
            </table>
            <br>
            <div class="mt-3">
              <button type="submit" name="button" class="btn btn-sm btn-success col-12">Simpan Data &nbsp&nbsp<span class="fa fa-arrow-right"></span> </button>
            </div>
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
