
<section>
  <div class="card ml-3">
    <div class="card-header bg-dark text-white">
      <span class="fa fa-edit"></span>&nbsp&nbsp
      Buat Template
    </div>
    <div class="card-body">
      <div class="alert alert-warning" id="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="fa fa-n"></span> Silahkan masukan nama template, harga dan item utama
    </div>
      <form class="" action="<?= base_url() ?>index.php/job/buat_template" method="post">
        <div class="row ml-1 mb-2">
          <div class="input-group col-md-12">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Pilih Game</button>
            </div>
            <select class="form-control" name="game" required>
              <option value="">- - -</option>
              <?php foreach ($game as $g): ?>
                <option value="<?= $g->id_game ?>"><?= $g->nama_game ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="row ml-1">
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Nama Template</button>
            </div>
            <input type="text" class="form-control" name="nama_temjob" value="" required>
          </div>
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Harga Template</button>
            </div>
            <input type="text" class="form-control" name="harga_temjob" value="" required>
          </div>
          <!-- <a href="#" class="btn btn-sm btn-light text-info mt-2 ml-3" id="add_item"> <span class="fa fa-plus"></span>&nbsp&nbsp Tambah Item Utama</a> -->
        </div>


          <div class="col-12 mt-3">
            <button type="submit" name="button" class="btn btn-sm btn-success col-12" style="border-radius: 20px;">Simpan</button>
          </div>


      </form>
    </div>
  </div>
  </div>
   <!-- <div><a class="btn btn-sm btn-danger text-light col-12"><span class="fa fa-plus"></span>&nbsp&nbsp Add</a></div> -->
</section>
<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
