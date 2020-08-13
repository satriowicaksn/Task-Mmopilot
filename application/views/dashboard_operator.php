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

        <?php if ($cek_shift == '0'): ?>
          <div class="search">
            <form class="" action="<?= base_url() ?>index.php/home/login_shift" method="post">
              <div class="form-group col-12">
                <h6 class="text-danger"><span class="fa fa-warning"></span>&nbsp&nbsp Silahkan Pilih Shift terlebih dahulu !!</h6>
                <div class="row">
                  <select class="form-control col-6" name="shift" required>
                    <option value="">Pilih Shift</option>
                    <option value="Shift 1">Shift 1</option>
                    <option value="Shift 2">Shift 2</option>
                  </select>
                  &nbsp&nbsp
                  <button type="submit" name="button" class="btn btn-xs btn-success "> <span class="fa fa-sign-in"></span> </button>
                    </form>
                </div>
              </div>
          </div>
        <?php endif; ?>

        <?php if ($cek_shift_login > '0'): ?>
          <div class="table-responsive mb-3 mt-3">
            <h5 class="text-dark">Status Anda</h5>
            <table class="table table-striped table-sm text-center">
              <thead class="text-white" style="background: #2d3035;">
                <tr>
                  <th>Shift</th>
                  <th>Client</th>
                  <th>Logout</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($detail_client as $d): ?>
                  <tr>
                    <td><?= $d->shift ?></td>
                    <td><?= $d->nama_client ?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_logout_aja<?= $d->id_laporan_shift ?>"> <span class="fa fa-sign-out"></span> </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>

        <?php if ($cek_shift_login > '0'): ?>
          <?php foreach ($detail_shift as $d){ ?>

            <div class="table-responsive mb-3 mt-3">
              <h5 class="text-dark">Client Order</h5>
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
                  <?php foreach ($order as $o){ ?>
                    <?php if ($o->id_client == $d->id_client ){ ?>
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
                  <?php } ?>
                </tbody>
              </table>
            </div>


          <?php  } ?>
        <?php endif; ?>



        <?php foreach ($detail_shift as $d): ?>
          <div class="table-responsive mb-3 mt-3">
            <?php if ($cek_shift_login == '0'): ?>
              <h5 class="text-dark">Pilih Client</h5>
            <?php endif; ?>
            <?php if ($cek_shift_login > '0'): ?>
              <h5 class="text-dark">Client Lain</h5>
            <?php endif; ?>
            <table class="table table-striped table-sm text-center">
              <thead class="text-white" style="background: #2d3035;">
                <tr>
                  <th>Status</th>
                  <th>Client</th>
                  <th>Email Client</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($client2 as $c2): ?>
                  <tr>
                    <td>
                      <?php if ($d->id_client == $c2->id_client): ?>
                        <?php if ($d->status_shift == 'login'): ?>
                          <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_konfirmasi_logout"> <span class="fa fa-check"></span>&nbsp Logged in</a>
                        <?php endif; ?>
                        <?php if ($d->status_shift == 'belum'): ?>
                          <a href="#" class="btn btn-sm btn-light text-success" data-toggle="modal" data-target="#modal_konfirmasi_login<?= $c2->id_client ?>">Login</a>
                        <?php endif; ?>

                      <?php endif; ?>
                      <?php if ($d->id_client != $c2->id_client): ?>
                        <?php if ($c2->client_shift == 'belum'): ?>
                          <a href="#" class="btn btn-sm btn-light text-success" data-toggle="modal" data-target="#modal_konfirmasi_login<?= $c2->id_client ?>">Login</a>
                        <?php endif; ?>
                        <?php if ($c2->client_shift == 'login'): ?>
                            <a href="#" class="btn btn-sm btn-danger"> <span class="fa fa-user"></span>&nbsp Logged in</a>
                        <?php endif; ?>
                      <?php endif; ?>




                    </td>
                    <td><?= $c2->nama_client ?></td>
                    <td><?= $c2->email_client ?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_detail<?= $c2->id_client ?>"> <span class="fa fa-eye"></span>&nbsp&nbsp Show Detail </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endforeach; ?>






        </div>

      </div>
    </div>
      </div>
  </div>
</section>


<?php foreach ($client2 as $c2) { ?>
<div id="modal_detail<?= $c2->id_client ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Detail Order</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive mb-3 mt-3">
          <h5 class="text-dark">Client Order</h5>
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
              <?php foreach ($order as $o){ ?>
                <?php if ($c2->id_client == $o->id_client){ ?>
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
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">

      </div>

    </div>
  </div>
</div>
<?php  } ?>

<!-- Modal Konfirmasi-->
<?php foreach ($client2 as $c2): ?>
  <div id="modal_konfirmasi_login<?= $c2->id_client ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <?php if ($cek_shift_login == 0): ?>
        <div class="modal-content">
          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Konfirmasi Login</strong>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url();  ?>index.php/home/login_client_akun" method="post">
              <h6 class="text-dark">Login ke client <?= $c2->nama_client ?> ?</h6>
              <input type="hidden" name="id_client" value="<?= $c2->id_client ?>">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success"> <span class="fa fa-sign-in"></span>&nbsp&nbsp Login</button>
          </div>
          </form>
        </div>
      <?php endif; ?>

      <?php if ($cek_shift_login > 0): ?>
        <div class="modal-content">
          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Warning</strong>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url();  ?>index.php/home/logout_client_akun" method="post">
              <h6 class="text-danger">*anda sekarang sedang login di client lain</h6>
              <h6 class="text-danger">Logout dan Login ke client <?= $c2->nama_client ?> ?</h6>
              <input type="hidden" name="id_client" value="<?= $c2->id_client ?>">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-danger"> <span class="fa fa-sign-in"></span>&nbsp&nbsp Logout & Login</button>
          </div>
          </form>
        </div>
      <?php endif; ?>


    </div>
  </div>
<?php endforeach; ?>

<!-- Modal Konfirmasi-->
<?php foreach ($client2 as $c2): ?>
  <div id="modal_konfirmasi_logout<?= $c2->id_client ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Konfirmasi Logout</strong>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url();  ?>index.php/home/logout_client_akun" method="post">
            <h6 class="text-danger">Logout dari client <?= $c2->nama_client ?> ?</h6>
            <input type="hidden" name="id_client" value="<?= $c2->id_client ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-danger"> <span class="fa fa-sign-in"></span>&nbsp&nbsp Logout</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal Konfirmasi-->
<?php foreach ($detail_shift as $d): ?>
  <div id="modal_logout_aja<?= $d->id_laporan_shift ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-centered">
      <div class="modal-content">
        <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Konfirmasi Logout</strong>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url();  ?>index.php/home/logout_aja" method="post">
            <h6 class="text-danger">Logout dari akun client sekarang ?</h6>
            <input type="hidden" name="id_client" value="<?= $d->id_client ?>">
            <input type="hidden" name="id_laporan" value="<?= $d->id_laporan_shift ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-danger"> <span class="fa fa-sign-in"></span>&nbsp&nbsp Logout</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>




<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

</script>
