
<section>
  <div class="card ml-3">
    <div class="card-header bg-dark text-white">
      <span class="fa fa-edit"></span>&nbsp&nbsp
      Laporan
    </div>
    <div class="card-body">
      <div class="alert alert-warning" id="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="fa fa-n"></span> Lakukan laporan apabila job sudah selesai !!
    </div>


      <form class="" action="<?= base_url() ?>index.php/laporan/add_laporan" method="post">
        <div class="row ml-1">
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Pilih ID Client</button>
            </div>
            <select class="form-control sm" name="client" id="select_client">
            <option value="">-- SELECT CLIENT --</option>
            <?php foreach ($client as $c): ?>
              <option value="<?= $c->id_client_game ?>"><?= $c->username_game ?></option>
            <?php endforeach; ?>
            </select>
          </div>
          <div class="input-group col-md-6">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Pilih Staff</button>
            </div>
            <select class="form-control sm" name="staff" id="select_staff" required>
            <option value="">-- SELECT STAFF --</option>
            <?php foreach ($staff as $s): ?>
              <option value="<?= $s->name ?>"><?= $s->name ?></option>
            <?php endforeach; ?>
            </select>
          </div>
          <div class="input-group col-md-6 mt-2">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-info">Pilih Order</button>
            </div>
            <select class="form-control sm" name="order" id="select_order">
            <option value="">-- SELECT ORDER --</option>

            </select>
          </div>

        </div>

        <br>
        <div class="row ml-2">
          <div class="col-4">
            <a href="#" class="btn btn-sm btn-light text-dark col-12" id="show" style="border-radius: 20px;"> <span class="fa fa-search"></span>&nbsp&nbsp Tampilkan Item</a>
          </div>
          <div class="col-6">
            <button type="submit" name="button" class="btn btn-sm btn-success col-12 ml-5" style="border-radius: 20px;"> <span class="fa fa-floppy-o"></span>&nbsp&nbsp Simpan Laporan</button>
          </div>
          <div class="col-4">

          </div>
        </div>
        <table class="table table-sm mt-3" id="tabel_laporan">
          <thead class="bg-info text-center text-white">
            <tr>
              <th>Item</th>
              <th>Total Dibutuhkan</th>
              <th>Total Progress</th>
              <th>Target</th>
              <th>Progress Laporan</th>

            </tr>
          </thead>
          <tbody class="text-center" id="itemnya">
            <tr>

            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  </div>
   <!-- <div><a class="btn btn-sm btn-danger text-light col-12"><span class="fa fa-plus"></span>&nbsp&nbsp Add</a></div> -->
</section>
<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#tabel_laporan').hide();
$('#show').click(function(){
  $('#tabel_laporan').toggle('slow');
});
$('#select_client').change(function(){
  var client = $('#select_client').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/laporan/get_dropdown",
    dataType: "JSON",
    data: {client:client},
    success: function(data)
    {
      var view = '';
      var i;
      for (var i = 0; i < data.length; i++) {
        view += '<option value="'+data[i].order+'">'+data[i].nama_order+'</option>';
      }
      $('#select_order').html(view);
      tampil_order();
    }

  });
});
function tampil_order()
{
  var order = $('#select_order').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/laporan/get_item",
    dataType: "JSON",
    data: {order:order},
    success: function(data)
    {
      var view = '';
      var i;
      for (var i = 0; i < data.length; i++) {
        var priority = data[i].order_priority;
        view += '<tr>'+
                '<td><input type="hidden" name="order_name[]" value="'+data[i].nama_temjob+'"><input type="hidden" name="order_item[]" value="'+data[i].order_item+'"><input type="hidden" name="id_order_item[]" value="'+data[i].id_order_item+'">'+data[i].order_item+'</td>'+
                '<td><input type="hidden" name="order_qty[]" value="'+data[i].order_qty+'">'+data[i].order_qty+'</td>'+
                '<td><input type="hidden" name="order_progres[]" value="'+data[i].order_progres+'">'+data[i].order_progres+'</td>'+
                '<td><input type="hidden" name="order_target[]" value="">'+data[i].order_target+' ('+data[i].order_durasi+')</td>'+
                '<td><input type="hidden" name="cek[]" value="'+data[i].order_target_progres+'"><input type="number" name="order_target_progres[]" value="'+data[i].order_target_progres+'" min="0" max="'+data[i].order_qty+'"></td>'+
                '</tr>';
      }
      $('#itemnya').html(view);
      console.log(data);
    }
  });
}
$('#select_order').change(function(){
  var order = $('#select_order').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/laporan/get_item",
    dataType: "JSON",
    data: {order:order},
    success: function(data)
    {
      var view = '';
      var i;
      for (var i = 0; i < data.length; i++) {
        var priority = data[i].order_priority;
        view += '<tr>'+
                '<td><input type="hidden" name="order_date[]" value="'+data[i].order_date+'"><input type="hidden" name="order_name[]" value="'+data[i].nama_temjob+'"><input type="hidden" name="order_item[]" value="'+data[i].order_item+'"><input type="hidden" name="id_order_item[]" value="'+data[i].id_order_item+'">'+data[i].order_item+'</td>'+
                '<td><input type="hidden" name="order_durasi[]" value="'+data[i].order_durasi+'"><input type="hidden" name="order_qty[]" value="'+data[i].order_qty+'">'+data[i].order_qty+'</td>'+
                '<td><input type="hidden" name="order_progres[]" value="'+data[i].order_progres+'">'+data[i].order_progres+'</td>'+
                '<td><input type="hidden" name="order_target[]" value="">'+data[i].order_target+' ('+data[i].order_durasi+')</td>'+
                '<td><input type="hidden" name="cek[]" value="'+data[i].order_target_progres+'"><input type="number" name="order_target_progres[]" value="0" min="0" max="'+data[i].order_qty+'"></td>'+
                '</tr>';
      }
      $('#itemnya').html(view);
      console.log(data);
    }
  });

});
});
</script>
