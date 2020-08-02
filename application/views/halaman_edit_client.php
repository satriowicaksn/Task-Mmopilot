
<section>
  <div class="card ml-3">
    <div class="card-header bg-dark text-white">
      <span class="fa fa-edit"></span>&nbsp&nbsp
      Buat akun untuk client
    </div>
    <div class="card-body">
      <div class="alert alert-warning" id="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="fa fa-n"></span> Silahkan masukan data di bawah ini
    </div>
    <?php foreach ($client as $c): ?>
      <form class="" action="<?= base_url() ?>index.php/user/update_client" method="post">
        <div class="row ml-1 mb-3">
          <h6 class="text-dark ml-3 mb-3">* Data Client</h6>
          <div class="input-group col-md-12">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Nama Client</button>
            </div>
            <input type="hidden" name="id_client" value="<?= $c->id_client ?>">
            <input type="text" class="form-control" name="nama" value="<?= $c->nama_client ?>" required>
          </div>
        </div>
        <div class="row ml-1 mb-3">
          <div class="input-group col-md-12">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Email</button>
            </div>
            <input type="email" class="form-control" name="email" value="<?= $c->email_client ?>" required>
          </div>
        </div>
        <div class="row ml-1 mb-3">
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Username</button>
            </div>
            <input type="text" class="form-control" name="username" value="<?= $c->username ?>" required>
          </div>
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Password</button>
            </div>
            <input type="password" class="form-control" name="password" value="<?= $c->password ?>" required>
          </div>
          <!-- <a href="#" class="btn btn-sm btn-light text-info mt-2 ml-3" id="add_item"> <span class="fa fa-plus"></span>&nbsp&nbsp Tambah Item Utama</a> -->
        </div>
        <br>
        <h6 class="text-dark ml-3 mb-3 mt-2">* Contact Client</h6>
        <div class="row ml-1 mb-3">
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Whatsapp</button>
            </div>
            <input type="text" class="form-control" name="whatsapp" value="<?= $c->whatsapp ?>">
          </div>
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Facebook</button>
            </div>
            <input type="text" class="form-control" name="facebook" value="<?= $c->facebook ?>">
          </div>
          <!-- <a href="#" class="btn btn-sm btn-light text-info mt-2 ml-3" id="add_item"> <span class="fa fa-plus"></span>&nbsp&nbsp Tambah Item Utama</a> -->
        </div>
        <div class="row ml-1 mb-3">
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Skypee</button>
            </div>
            <input type="text" class="form-control" name="skype" value="<?= $c->skype ?>">
          </div>
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Discord</button>
            </div>
            <input type="text" class="form-control" name="discord" value="<?= $c->discord ?>">
          </div>
          <!-- <a href="#" class="btn btn-sm btn-light text-info mt-2 ml-3" id="add_item"> <span class="fa fa-plus"></span>&nbsp&nbsp Tambah Item Utama</a> -->
        </div>
        <div class="row ml-1 mb-3">
          <div class="form-group">
            <label for="" class="ml-3 text-dark">Alamat</label>
              <textarea class="form-control ml-3" name="address" rows="8" cols="100"><?= $c->address ?></textarea>
          </div>
        </div>
        <br>
        <div class="row ml-1 mb-2">
          <h6 class="text-dark ml-3 mb-2">* Data Game Client</h6>
        </div>
        <div class="row ml-1 mb-2">
          <a href="#" class="btn btn-dark btn-sm ml-4 mb-3" id="add_game"> <span class="fa fa-plus"></span> Tambah Data</a>
        </div>
        <div class="row ml-1 mb-2">
          <table class="table table-sm text-center">
            <thead class="bg-info text-white">
              <tr>
                <th>No</th>
                <th>Game</th>
                <th>Username / ID</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php foreach ($detail_client as $d): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    <select class="form-control col-md-12" name="id_game[]" required>
                      <option value="<?= $d->id_game ?>"><?= $d->nama_game ?></option>
                      <?php foreach ($game as $g): ?>
                        <option value="<?= $g->id_game ?>"><?= $g->nama_game ?></option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <td><input type="text" name="idpass[]" value="<?= $d->username_game ?>" class="form-control" required></td>
                  <td><a class="btn btn-sm btn-danger text-white" style="border-radius:20px;" id="delete_row"> <span class="fa fa-trash"></span> </a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tbody id="sub">

            </tbody>
          </table>
        </div>
          <div class="col-12 mt-3">
            <button type="submit" name="button" class="btn btn-sm btn-success col-12" style="border-radius: 20px;">Simpan</button>
          </div>


      </form>
      <?php endforeach; ?>
    </div>
  </div>
  </div>
   <!-- <div><a class="btn btn-sm btn-danger text-light col-12"><span class="fa fa-plus"></span>&nbsp&nbsp Add</a></div> -->
</section>
<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add_game').click(function(){
      event.preventDefault();
      var no = $('tbody tr').length;
      no++;
      var sub = '<tr>'+
                '<td>'+no+'</td>'+
                 '<td><select class="form-control col-md-12" name="id_game[]" required><option value="">Pilih Game</option><?php foreach ($game as $g): ?><option value="<?= $g->id_game ?>"><?= $g->nama_game ?></option><?php endforeach; ?></select></td>'+
                 '<td><input type="text" name="idpass[]" value="" class="form-control" required></td>'+
                 '<td><a class="btn btn-sm btn-danger text-white" style="border-radius:20px;" id="delete_row"> <span class="fa fa-trash"></span> </a></td>'+
                '</tr>';
      $('#sub').append(sub);
    });

          $(document).on('click', '#delete_row', function(e){
      e.preventDefault();
      $(this).parent().parent().remove();
      var no = 1;
      var json = no;
      $('tbody tr').each(function(){
        $(this).find('td:nth-child(1)').html(no);
        no++;
      });
      });


  });
</script>
