<section class="no-padding-top no-padding-bottom">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-archive"></span>&nbsp&nbsp
        Data Template
      </div>
      <div class="card-body">
        <div class="alert alert-warning" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="fa fa-n"></span> Data Template MMOPILOT
      </div>
        <a style="border-radius: 20px;" class="btn btn-sm btn-danger text-light col-6" href="<?= base_url() ?>index.php/job/halaman_add"><span class="fa fa-plus"></span>&nbsp <b>New Template</b></a>
        <br>
        <div class="table-responsive">
          <br>
          <table class="table table-striped table-sm text-center mt-3" id="tabel">
            <thead class="text-white bg-info">
              <tr>
                <th>Game</th>
                <th>Template</th>
                <th>Harga</th>
                <th>Item</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($job as $j) { ?>
              <tr>
                <td><?= $j->nama_game ?></td>
                <td> <b><?= $j->nama_temjob ?></b> </td>
                <td><?= $j->harga_temjob ?> $</td>
                <td><form action="<?= base_url(); ?>index.php/job/detail" method="post">
                  <input name="id" type="hidden" value="<?=$j->id_temjob?>">
                  <button type="submit" name="button" class="btn btn-sm btn-info">Kelola Item</button>
                </form>
              </td>
                <td>
                  <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?=$j->id_temjob?>"><span class="fa fa-edit"></span></a>
                  <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?=$j->id_temjob?>"><span class="fa fa-trash"></span></a>
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
<!-- Modal Ubah-->
<?php foreach ($job as $j) { ?>
<div id="edit<?=$j->id_temjob?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit Data</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">*Please Fill all</p>
        <form action="<?= base_url();  ?>index.php/job/edit_temjob" method="post">
          <div class="form-group">
            <label>Game</label>
            <select class="form-control" name="game" required>
              <option value="<?= $j->id_game?>"><?= $j->nama_game ?></option>
              <?php foreach ($game as $g): ?>
                <option value="<?= $g->id_game ?>"><?= $g->nama_game ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Template</label>
            <input type="hidden" placeholder="Item Name" class="form-control" name="id" value="<?= $j->id_temjob?>" required>
            <input type="text" placeholder="Name" class="form-control" name="name" value="<?= $j->nama_temjob?>" required>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" placeholder="Item Description" class="form-control" name="price" value="<?= $j->harga_temjob?>" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php  } ?>

<!-- Modal Hapus-->
<?php foreach ($job as $j) { ?>
<div id="hapus<?=$j->id_temjob?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Item</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">*Delete Template <?=$j->nama_temjob?> from database ?</p>
        <form action="<?= base_url();  ?>index.php/job/delete_temjob" method="post">
          <input type="hidden" name="id" value="<?=$j->id_temjob?>">
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php  } ?>
