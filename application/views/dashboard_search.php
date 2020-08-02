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
                <a href="<?= base_url();  ?>index.php/home" class="btn btn-sm btn-primary ml-2"><span class="fa fa-search"></span>&nbsp&nbsp Show All</a>
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

        <div class="table-responsive">
          <table class="table table-striped table-sm text-center" id="tab">
            <thead class="text-white" style="background: #2d3035;">
              <tr>
                <th>User Id</th>
                <th>Order</th>
                <th>Item</th>
                <th>Selesai / Total</th>
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
                    <td><?= $o->nama_temjob ?></td>
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
                        <button type="button" name="button" class="btn btn-sm btn-danger text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>
                      <?php if ($o->order_priority == '2'){ ?>
                        <button type="button" name="button" class="btn btn-sm btn-primary text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>
                      <?php if ($o->order_priority == '3'){ ?>
                        <button type="button" name="button" class="btn btn-sm btn-warning text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>
                      <?php if ($o->order_priority == '4'){ ?>
                        <button type="button" name="button" class="btn btn-sm btn-warning text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>
                      <?php if ($o->order_priority == '5'){ ?>
                        <button type="button" name="button" class="btn btn-sm btn-warning text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>
                      <?php if ($o->order_priority == '6'){ ?>
                        <button type="button" name="button" class="btn btn-sm btn-info text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>
                      <?php if ($o->order_priority == '7'){ ?>
                        <button type="button" name="button" class="btn btn-sm btn-info text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>
                      <?php if ($o->order_priority == '8'){ ?>
                        <button type="button" name="button" class="btn btn-sm btn-info text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>
                      <?php if ($o->order_priority == '9'){ ?>
                        <button type="button" name="button" class="btn btn-sm btn-success text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>
                      <?php if ($o->order_priority == '10'){ ?>
                        <button type="button" name="button" class="btn btn-sm btn-success text-light">Priority <?= $o->order_priority ?></button>
                      <?php } ?>

                    </td>
                  </tr>
                  <?php } ?>
                <?php endif; ?>

              <?php } ?>
            </tbody>
          </table>
        </div>


        </div>

      </div>
    </div>
      </div>
  </div>

</section>
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
