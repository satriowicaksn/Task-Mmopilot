<section>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-user"></span>&nbsp&nbsp Data Staff dan Operator
      </div>
      <div class="card-body">
        <div class="alert alert-warning" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="fa fa-n"></span> Data Staff dan Operator MMOPILOT
      </div>
        <a href="#" data-toggle="modal" data-target="#modal_add" style="border-radius: 20px;" class="btn btn-sm btn-danger col-6 mb-5"><span class="fa fa-plus"></span>&nbsp&nbsp Add Staff</a>
        <div class="table-responsive">
          <table class="table table-striped table-sm" id="tabel">
            <thead class="text-info">
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Jabatan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($staff as $c) { ?>

                  <tr>
                    <td><?= $c->name?></td>
                    <td><?= $c->email?></td>
                    <td><?= $c->role_name?></td>

                    <td>
                      <!-- <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_detail<?= $c->id_user ?>"> <span class="fa fa-eye"></span></a> -->
                      <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_edit<?= $c->id_user ?>"> <span class="fa fa-edit"></span></a>
                       <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete<?= $c->id_user ?>"> <span class="fa fa-trash"></span></a>
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


<!-- Modal Tambah -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;">Tambah Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?= base_url() ?>index.php/user/add_staff" method="post">
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="name" value="" class="form-control" required>
          </div>
          <div class="row">
            <div class="form-group col-6">
              <label for="">Username</label>
              <input type="text" name="email" value="" class="form-control" required>
            </div>
            <div class="form-group col-6">
              <label for="">Password</label>
              <input type="password" name="password" value="" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label for="">Pilih Role / Jabatan</label>
            <select class="form-control" name="role" required>
              <option value="">Pilih Role</option>
              <?php foreach ($role as $r): ?>
                <?php if ($r->id_role != '3'): ?>

                    <option value="<?= $r->id_role ?>"><?= $r->role_name ?></option>

                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Ubah -->
<?php foreach ($staff as $c): ?>
  <div class="modal fade" id="modal_edit<?= $c->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;">Edit Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?= base_url() ?>index.php/user/update_staff" method="post">
            <input type="hidden" name="id" value="<?= $c->id_user?>">
            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" name="name" value="<?= $c->name?>" class="form-control" required>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label for="">Username</label>
                <input type="text" name="email" value="<?= $c->email ?>" class="form-control" required>
              </div>
              <div class="form-group col-6">
                <label for="">Password</label>
                <input type="password" name="password" value="<?= $c->password?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label for="">Pilih Role / Jabatan</label>
              <select class="form-control" name="role" required>
                <option value="<?= $c->id_role?>"><?= $c->role_name?></option>
                <?php foreach ($role as $r): ?>
                  <?php if ($r->id_role != '3'): ?>
                      <option value="<?= $r->id_role ?>"><?= $r->role_name ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal Ubah -->
<?php foreach ($staff as $c): ?>
  <div class="modal fade" id="modal_delete<?= $c->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;">Hapus Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?= base_url() ?>index.php/user/hapus_staff" method="post">
            <input type="hidden" name="id" value="<?= $c->id_user?>">
            <p>Hapus Data <?= $c->name ?></p>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal Ubah -->
<?php foreach ($staff as $c): ?>
  <div class="modal fade" id="modal_detail<?= $c->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <h6>Nama : <?= $c->name ?></h6>
            <h6>Email / Username : <?= $c->email ?></h6>
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
