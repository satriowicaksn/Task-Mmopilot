<section class="no-padding-top no-padding-bottom">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-list"></span>&nbsp&nbsp Data Item
      </div>
      <div class="card-body">
        <div class="alert alert-warning" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="fa fa-n"></span> Data Item Item MMOPILOT
      </div>
        <a style="border-radius: 20px;" class="btn btn-sm btn-danger text-light col-6" data-toggle="modal" data-target="#tambah"><span class="fa fa-plus"></span>&nbsp <b>Tambah Item</b></a>

        <div class="table-responsive">
          <br>
          <table class="table table-striped table-sm mt-3 text-center" id="tabel">
            <thead class="text-white bg-info">
              <tr>
                <th>Game</th>
                <th>Item</th>
                <th>Deskripsi</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($item as $i) { ?>
              <tr>
                <td><?= $i->nama_game ?></td>
                <td><?= $i->item ?></td>
                <td><?= $i->item_desc ?></td>
                <td>
                  <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?=$i->id_item?>"><span class="fa fa-edit"></span></a>
                  <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?=$i->id_item?>"><span class="fa fa-trash"></span></a>
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
<!-- Modal Tambah-->
<div id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Tambah Item</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">*Please Fill all</p>
        <form action="<?= base_url();  ?>index.php/item/add_item" method="post">
          <div class="form-group">
            <label>Pilih Game</label>
            <select class="form-control" name="game" required>
              <option value="">Pilih Game</option>
              <?php foreach ($game as $g): ?>
                <option value="<?= $g->id_game ?>"><?= $g->nama_game ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Item</label>
            <input type="text" placeholder="Item Name" class="form-control" name="item" required id="item_add">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" placeholder="Item Description" class="form-control" name="desc" required id="desc_add">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-success" id="add_item">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah-->
<?php foreach ($item as $i) { ?>
<div id="edit<?=$i->id_item?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Update Item</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">*Isi semua form</p>
        <form action="<?= base_url();  ?>index.php/item/edit_item" method="post">
          <div class="form-group">
            <label>Pilih Game</label>
            <select class="form-control" name="game" required>
              <option value="<?= $i->id_game ?>"><?= $i->nama_game ?></option>
              <?php foreach ($game as $g): ?>
                <option value="<?= $g->id_game ?>"><?= $g->nama_game ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Item</label>
            <input type="hidden" placeholder="Item Name" class="form-control" name="id" value="<?= $i->id_item?>" required>
            <input type="text" placeholder="Item Name" class="form-control" name="item" value="<?= $i->item?>" required>
          </div>
          <div class="form-group">
            <label>Deskripsi Item</label>
            <input type="text" placeholder="Item Description" class="form-control" name="desc" value="<?= $i->item_desc?>" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-sm">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php  } ?>

<!-- Modal Hapus-->
<?php foreach ($item as $i) { ?>
<div id="hapus<?=$i->id_item?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Hapus Item</strong>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-danger">*Hapus Item <?=$i->item?> dari database ?</p>
        <form action="<?= base_url();  ?>index.php/item/delete_item" method="post">
          <input type="hidden" name="id" value="<?=$i->id_item?>">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary" id="delete">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php  } ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/fc-3.3.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/fc-3.3.1/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabel').DataTable();
    // $('#add_item').click(function(){
    //   var item = $('#item_add').val();
    //   var desc = $('#desc_add').val();
    //   $.ajax({
    //     method: 'POST',
    //     url : "<?= base_url()?>index.php/item/add_item",
    //     dataType: "JSON",
    //     data: {item:item,desc:desc},
    //     success: function(data){
    //       $('#alert').show();
    //       $('#tambah').modal('hide');
    //     }
    //   });
    //
    // });
  });
</script>
