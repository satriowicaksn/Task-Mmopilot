<section>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-user"></span>&nbsp&nbsp Data Client
      </div>
      <div class="card-body">
        <div class="alert alert-warning" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="fa fa-n"></span> Data client MMOPILOT
      </div>
        <a href="<?= base_url() ?>index.php/user/halaman_add_client" style="border-radius: 20px;" class="btn btn-sm btn-danger col-6 mb-5"><span class="fa fa-plus"></span>&nbsp&nbsp Add client</a>
        <div class="table-responsive">
          <table class="table table-striped table-sm" id="tabel">
            <thead class="text-info">
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($client as $c) { ?>
              <tr>
                <td><?= $c->nama_client?></td>
                <td><?= $c->username?></td>
                <td><?= $c->email_client?></td>

                <td>
                  <form class="" action="<?= base_url() ?>index.php/user/halaman_edit_client" method="post">
                    <input type="hidden" name="id" value="<?= $c->id_client ?>">
                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_detail<?= $c->id_client ?>"> <span class="fa fa-eye"></span></a>
                    <button type="submit" name="button" class="btn btn-sm btn-success"><span class="fa fa-edit"></span></button>
                     <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete<?= $c->id_client ?>"> <span class="fa fa-trash"></span></a>

                  </form>
                </td>
              </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Modal Hapus -->
<?php foreach ($client as $c): ?>
  <div class="modal fade" id="modal_delete<?= $c->id_client?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;">Hapus Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?= base_url() ?>index.php/user/hapus_client" method="post">
            <input type="hidden" name="id" value="<?= $c->id_client?>">
            <p>Hapus Data <?= $c->nama_client ?> ??</p>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal Detail -->
<?php foreach ($client as $c): ?>
  <div class="modal fade" id="modal_detail<?= $c->id_client?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;">Detail Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="" style="color:black;">
            <p class="text-primary">*data akun</p>
            <h6>Name : <?= $c->nama_client ?></h6>
            <h6>Email : <?= $c->email_client ?></h6>
            <h6>Username : <?= $c->username ?></h6>
            <br>
             <p class="text-primary">*akun game</p>
             <?php foreach ($client_detail as $d): ?>
               <?php if ($d->id_client == $c->id_client): ?>
                 <h6>Game : <?= $d->nama_game ?> </h6>
                 <h6>ID PASS : <?= $d->username_game ?> &nbsp&nbsp</h6>
                 <hr>
               <?php endif; ?>
             <?php endforeach; ?>
            <br>
             <p class="text-primary">*contact</p>
             <h6>Address : <?= $c->address ?></h6>
            <h6>Facebook : <?= $c->facebook ?></h6>
            <h6>Whatsapp / Phone : <?= $c->whatsapp ?></h6>
            <h6>Skypee : <?= $c->skype ?></h6>
            <h6>Discord : <?= $c->discord ?></h6>
          </div>
        </div>

      </div>
    </div>
  </div>
<?php endforeach; ?>





<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabel').DataTable();
  });
</script>
