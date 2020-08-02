<section class="no-padding-top no-padding-bottom">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-gamepad"></span>&nbsp&nbsp
        Data Game
      </div>
      <div class="card-body">
        <div class="alert alert-warning" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="fa fa-n"></span> Data Game MMOPILOT
      </div>
        <a style="border-radius: 20px;" class="btn btn-sm btn-danger text-light col-6" href="#" data-toggle="modal" data-target="#add_game"><span class="fa fa-plus"></span>&nbsp <b>New Game</b></a>
        <br>
        <div class="table-responsive">
          <br>
          <table class="table table-striped table-sm text-center mt-3" id="tab">
            <thead class="text-white bg-info">
              <tr>
                <th>Nama Game</th>
                <th>Edit / Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($game as $g) { ?>
              <tr>
                <td><?= $g->nama_game ?></td>
                <td>
                  <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?=$g->id_game?>"><span class="fa fa-edit"></span></a>
                  <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?=$g->id_game?>"><span class="fa fa-trash"></span></a>
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

<div id="add_game" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Tambah Game</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">*Please Fill all</p>
        <form action="<?= base_url();  ?>index.php/game/add_game" method="post">
          <div class="form-group">
            <label>Nama Game</label>
            <input type="text" placeholder="Tulis Nama Game . . " class="form-control" name="game" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Ubah-->
<?php foreach ($game as $g) { ?>
<div id="edit<?=$g->id_game?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit Game</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">*Please Fill all</p>
        <form action="<?= base_url();  ?>index.php/game/edit_game" method="post">
          <div class="form-group">
            <label>Nama Game</label>
            <input type="hidden" name="id" value="<?=$g->id_game?>">
            <input type="text" class="form-control" value="<?= $g->nama_game ?>" name="game" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php  } ?>

<!-- Modal Hapus-->
<?php foreach ($game as $g) { ?>
<div id="hapus<?=$g->id_game?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Hapus Game</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">*Delete Game <?=$g->nama_game ?> from database ?</p>
        <form action="<?= base_url();  ?>index.php/game/delete_game" method="post">
          <input type="hidden" name="id" value="<?=$g->id_game?>">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php  } ?>
