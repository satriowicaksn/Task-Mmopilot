<section>
  <div class="col-12">
    <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <span class="fa fa-home"></span>&nbsp&nbsp
          Dashboard MMOPILOT
        </div>
        <div class="card-body">
          <div class="alert alert-warning" id="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="fa fa-n"></span> Selamat datang di Dashboard !!
        </div>

          <?php if ($this->session->userdata('role') != '2'): ?>
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block bg-success text-white" style="border: 0.1px solid;">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-cart-plus text-white"></i></div>Active Order
                    </div>

                  </div>
                  <?php foreach ($total_aktif as $t): ?>
                    <div class="number"><?= $t->jml?></div>
                  <?php endforeach; ?>

                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block bg-danger text-white" style="border: 0.1px solid;">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-check text-white"></i></div>Done Order
                    </div>

                  </div>
                  <?php foreach ($total_selesai as $t): ?>
                    <div class="number"><?= $t->jml?></div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="statistic-block block bg-info text-white" style="border: 1px solid;">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-book text-white"></i></div>Template
                    </div>

                  </div>
                  <?php foreach ($total_template as $t): ?>
                    <div class="number"><?= $t->jml?></div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <br>
        <h5 class="text-dark"><span class="fa fa-book"></span>&nbsp Job Priority</h5>
        <br>
        <div class="search">
          <form class="" action="<?= base_url() ?>index.php/home/search" method="post">
            <div class="form-group col-12">
              <div class="row">
                <select class="form-control col-md-4" name="client" id="client" required>
                  <option value="">-- pilih ID Client --</option>
                  <?php foreach ($client as $c){ ?>
                    <option value="<?= $c->id_client_game ?>"><?= $c->username_game ?></option>
                  <?php } ?>
                </select>
                <select class="form-control col-md-4 ml-3" name="order" id="order" required>
                  <option value="">-- pilih order --</option>
                </select>
                &nbsp&nbsp
                <button type="submit" name="button" class="btn btn-sm btn-info "> <span class="fa fa-search"></span>&nbsp&nbsp Search</button>

                  </form>
              </div>
            </div>
        </div>
        <!-- <div class="search">
          <form class="" action="" method="post">
            <div class="form-group col-12">
              <div class="row">
                <input type="text" name="seacrh" value="" class="form-control col-4" placeholder="Cari berdasarkan item">
                &nbsp&nbsp
                <button type="submit" name="button" class="btn btn-xs btn-success "> <span class="fa fa-search"></span> </button>
                  </form>
              </div>
            </div>
        </div> -->
        <?php if ($this->session->userdata('role') != '5') { ?>
          <div class="table-responsive">
            <table class="table table-striped table-sm text-center" id="tab">
              <thead class="text-white" style="background: #2d3035;">
                <tr>
                  <th>User Id</th>
                  <!-- <th>Order</th> -->
                  <th>Item</th>
                  <th>Selesai / Total </th>
                  <th>Batas Waktu</th>
                  <th>Target</th>
                  <th>Laporan terakhir</th>
                  <th>Priority</th>

                </tr>
              </thead>
              <tbody id="prio">
                <?php if ($row_order == '0'): ?>
                  <tr>
                    <td colspan="6">
                      <div class="alert alert-danger" id="alert">

                      <span class="fa fa-warning"></span>&nbsp&nbsp Tidak ada data yang ditemukan !!
                    </div>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php foreach ($order as $o){ ?>
                  <?php if ($o->order_progres < $o->order_qty): ?>
                    <?php if ($o->order_target_progres < $o->order_target){ ?>
                    <tr>
                      <td><?= $o->username_game ?></td>
                      <!-- <td><?= $o->nama_temjob ?></td> -->
                      <td><?= $o->order_item ?></td>
                      <td><?= $o->order_progres ?> / <?= $o->order_qty ?></td>
                      <?php if ($o->order_durasi == 'day'){ ?>
                        <td>Pukul : <b class="text-danger"><?= $o->jam ?></b></td>
                      <?php } ?>
                      <?php if ($o->order_durasi == 'week'){ ?>
                      <?php if ($o->hari == '1')  { ?>
                        <td>Hari : Senin -- <b class="text-danger"><?= $o->jam ?></b></td>
                      <?php } ?>
                      <?php if ($o->hari == '2')  { ?>
                        <td>Hari : Selasa -- <b class="text-danger"><?= $o->jam ?></b></td>
                      <?php } ?>
                      <?php if ($o->hari == '3')  { ?>
                        <td>Hari : Rabu -- <b class="text-danger"><?= $o->jam ?></b></td>
                      <?php } ?>
                      <?php if ($o->hari == '4')  { ?>
                        <td>Hari : Kamis -- <b class="text-danger"><?= $o->jam ?></b></td>
                      <?php } ?>
                      <?php if ($o->hari == '5')  { ?>
                        <td>Hari : Jumat -- <b class="text-danger"><?= $o->jam ?></b></td>
                      <?php } ?>
                      <?php if ($o->hari == '6')  { ?>
                        <td>Hari : Sabtu -- <b class="text-danger"><?= $o->jam ?></b></td>
                      <?php } ?>
                      <?php if ($o->hari == '7')  { ?>
                        <td>Hari : Minggu -- <b class="text-danger"><?= $o->jam ?></b></td>
                      <?php } ?>
                      <?php } ?>

                      <?php if ($o->order_durasi == 'month'){ ?>
                        <td>Tanggal : <?= $o->tanggal ?> -- <b class="text-danger"><?= $o->jam ?></b></td>
                      <?php } ?>

                      <td><?= $o->order_target ?></td>
                      <td><?= $o->order_target_progres ?></td>
                      <td>
                        <?php if ($o->order_priority == '1'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-danger text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>
                        <?php if ($o->order_priority == '2'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-primary text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>
                        <?php if ($o->order_priority == '3'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-warning text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>
                        <?php if ($o->order_priority == '4'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-warning text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>
                        <?php if ($o->order_priority == '5'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-warning text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>
                        <?php if ($o->order_priority == '6'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-info text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>
                        <?php if ($o->order_priority == '7'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-info text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>
                        <?php if ($o->order_priority == '8'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-info text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>
                        <?php if ($o->order_priority == '9'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-success text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>
                        <?php if ($o->order_priority == '10'){ ?>
                          <button data-toggle="modal" data-target="#priority<?=$o->id_order_item?>" type="button" name="button" class="btn btn-sm btn-success text-light">Priority <?= $o->order_priority ?></button>
                        <?php } ?>

                      </td>
                    </tr>
                    <?php } ?>
                  <?php endif; ?>

                <?php } ?>
              </tbody>
            </table>
          </div>
      <?php } ?>

        </div>

      </div>
    </div>
      </div>
  </div>
</section>

<!-- Modal Hapus-->
<?php foreach ($order as $o) { ?>
<div id="priority<?=$o->id_order_item?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Update Priority</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url();  ?>index.php/home/edit_priority" method="post">
          <input type="hidden" name="id" value="<?=$o->id_order_item?>">
          <div class="form-group">
            <label for="">Priority</label>
            <select class="form-control" name="order_priority" required>
              <option value="<?= $o->order_priority ?>">Priority <?= $o->order_priority ?></option>
              <?php foreach ($priority as $p): ?>
                <?php if ($p->id_priority != $o->order_priority): ?>
                  <option value="<?= $p->id_priority ?>"><?= $p->keterangan ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-success" id="delete">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php  } ?>
<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#client').change(function(){
  var client = $('#client').val();
  console.log(client);
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/home/get_dropdown",
    dataType: "JSON",
    data: {client:client},
    success: function(data)
    {
      var view = '';
      var i;
      for (var i = 0; i < data.length; i++) {
        view += '<option value="'+data[i].order+'">'+data[i].nama_order+'</option>';
      }
      $('#order').html(view);
    }
  });
});
});
</script>
