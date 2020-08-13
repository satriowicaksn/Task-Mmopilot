<section>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-cart-plus"></span>&nbsp&nbsp Data Histori Order
      </div>
      <div class="card-body">
        <div class="alert alert-warning" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="fa fa-n"></span> Data Order MMOPILOT
      </div>
        <a href="<?= base_url();  ?>index.php/order" class="btn btn-sm btn-primary col-6 mb-5" style="border-radius: 20px;"><span class="fa fa-eye"></span>&nbsp&nbsp  Order Aktif</a>
        <div class="table-responsive">
          <table class="table table-striped table-sm" id="tabel">
            <thead class="text-white bg-info">
              <tr>
                <th>User Id</th>
                <th>Order</th>
                <th>Price</th>
                <th>Order Date</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($order as $o) { ?>
              <tr>
                <td> <b><?= $o->username_game?></b></td>
                <td> <b><?= $o->nama_temjob?></b></td>
                <td><?= $o->order_price ?> $</td>
                <td><?= date('d M Y',$o->orderDate)?></td>
                <td>
                  <?php if ($o->order_status == 'aktif'){ ?>
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_edit<?= $o->id_order ?>"> <span class="fa fa-edit"></span>&nbsp <?= $o->order_status?></a>
                  <?php } ?>
                  <?php if ($o->order_status == 'selesai'){ ?>
                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_edit<?= $o->id_order ?>"> <span class="fa fa-edit"></span>&nbsp <?= $o->order_status?></a>
                  <?php } ?>
                </td>
                <td> <form class="" action="<?= base_url() ?>index.php/order/update_order" method="post">
                  <input type="hidden" name="id" value="<?= $o->id_order?>">
                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_detail<?= $o->id_order ?>"> <span class="fa fa-eye"></span></a>
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_update<?= $o->id_order ?>"> <span class="fa fa-edit"></span></a>

                  <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $o->id_order ?>"> <span class="fa fa-trash"></span></a>
                </form></td>
              </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>

<!-- Modal Detail-->
<?php foreach ($order as $o): ?>
<div class="modal fade bd-example-modal-lg" id="modal_detail<?= $o->id_order ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" class="text-dark" style="color:black;">Detail Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Detail Item</h6>
        <table class="table table-sm mt-3" id="tabel_laporan">
          <thead class="bg-info text-center text-white">
            <tr>
              <th>Item</th>
              <th>Total dibutuhkan</th>
              <th>Selesai dikerjakan</th>
              <th>Priority</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php foreach ($order_detail as $d): ?>
              <?php if ($d->id_order == $o->id_order): ?>
                <tr>
                  <td><?= $d->order_item ?></td>
                  <td><?= $d->order_qty ?></td>
                  <td><?= $d->order_progres ?></td>
                  <td><?= $d->order_priority ?></td>
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

<!-- Modal Hapus-->
<?php foreach ($order as $o): ?>
<div class="modal fade bd-example-modal-lg" id="modal_hapus<?= $o->id_order ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" class="text-dark" style="color:black;">Hapus Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?= base_url() ?>index.php/order/delete_order" method="post">
          <input type="hidden" name="id" value="<?= $o->id_order ?>">
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-sm btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal Edit Status-->
<?php foreach ($order as $o): ?>
<div class="modal fade bd-example-modal-lg" id="modal_edit<?= $o->id_order ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" class="text-dark" style="color:black;">Update Order Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?= base_url() ?>index.php/order/update_status" method="post">
          <input type="hidden" name="id" value="<?= $o->id_order ?>">
          <div class="form-group">
            <label for="">Status Order</label>
            <select class="form-control" name="status">
              <option value="<?= $o->order_status ?>"><?= $o->order_status ?></option>
              <option value="aktif">Aktif</option>
              <option value="selesai">Selesai</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-sm btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal Edit Priority-->
<?php foreach ($order as $o): ?>
<div class="modal fade bd-example-modal-lg" id="modal_update<?= $o->id_order ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" class="text-dark" style="color:black;">Update Order Priority</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?= base_url() ?>index.php/order/update_order" method="post">
          <input type="hidden" name="id" value="<?= $o->id_order ?>">
          <table class="table table-sm mt-3" id="tabel_laporan">
            <thead class="bg-info text-center text-white">
              <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Priority</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php foreach ($order_detail as $d): ?>
                <?php if ($d->id_order == $o->id_order): ?>
                  <tr>
                    <td><input type="hidden" name="id_order_item[]" value="<?= $d->id_order_item ?>"> <h6 class="col-6"><?= $d->id_order_item ?></h6> </td>
                    <td><?= $d->order_item ?></td>
                    <td>
                      <select class="form-control" name="priority[]">
                        <option value="<?= $d->order_priority?>"><?= $d->keterangan?></option>
                        <?php foreach ($priority as $p): ?>
                          <option value="<?= $p->id_priority?>"><?= $p->keterangan?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-sm btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){


  $('#template').on('change',function(){
    var harga;
    $('#price').val(harga);
    $.ajax({
      method: 'POST',
      url: "<?= base_url(); ?>index.php/order/get_order_detail",
      dataType: "JSON",
      data: {harga: harga},
      success: function(data)
      {

      }
    });


});

});


</script>
