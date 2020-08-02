<section>
  <div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-dark text-white">
        <span class="fa fa-cart-plus"></span>&nbsp&nbsp
        Tambah Order Baru
      </div>
      <div class="card-body">

              <form class="form-group" action="<?= base_url() ?>index.php/order/add_order" method="post">
                <div class="row ml-1">
                  <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-info">ID PASS Client</button>
                    </div>
                    <select class="form-control" name="client" required id="client">
                      <option value="">-- Select --</option>
                      <?php foreach ($user as $s) { ?>
                      <option value="<?= $s->id_client_game ?>"><?= $s->username_game ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-info">Pilih Template</button>
                    </div>
                    <select class="form-control" name="template" id="template" required>
                      <option value="">-- Select --</option>
                      <?php foreach ($template as $t) { ?>
                      <option value="<?= $t->id_temjob ?>"><?= $t->nama_temjob ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <!-- <a href="#" class="btn btn-sm btn-light text-info mt-2 ml-3" id="add_item"> <span class="fa fa-plus"></span>&nbsp&nbsp Tambah Item Utama</a> -->
                </div>
                <div class="form-group col-12">
                  <input type="hidden" name="price" class="form-control" id="price" readonly>
                </div>
                <div class="form-group col-12 mt-2">

                    <div class="" id="tempat">
                      <br>
                      <button type="button" name="button" class="btn btn-sm btn-light text-dark col-2" id="tombol" style="border-radius: 20px;"> <span class="fa fa-eye"></span>&nbsp&nbsp Item Priority</button>

                      <button type="submit" name="button" class="btn btn-sm btn-success col-3 ml-2" style="border-radius: 20px;"> <span class="fa fa-floppy-o"></span>&nbsp&nbsp Simpan Data</button>

                  </div>




                </div>
                  <table id="tabelku" class="table table-sm mb-3 text-center">
                    <thead class="bg-info text-white">
                      <!-- <th>ID</th>
                      <th>Parent</th> -->
                      <th>Item</th>
                      <th>Qty</th>
                      <th>Target</th>
                      <th>Priority</th>
                    </tr>
                    </thead>
                    <tr>
                    <tbody id="item">
                    </tbody>
                  </table>



              </form>
      </div>
    <!-- <a href="<?= base_url()?>index.php/order" class="btn btn-sm btn-danger mt-2"> <span class="fa fa-backward"></span> Back to order data</a></div> -->

    </div>
  </div>
</div>
</section>
<!-- Modal Priority -->



<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  $('#tabelku').hide();
  var json = '';
  $('#template').on('change', function(){
    event.preventDefault();
    var id = $('#template').val();
    console.log(id);
    $.ajax({
      method: 'get',
      url: '<?= base_url() ?>index.php/order/get_order_detail/'+id,
      dataType: 'JSON',
      success: function(data){
        json = data;
        var ate = JSON.stringify(json);
        var view = '';
        var i;
        for (var i = 0; i < data.length; i++) {
          view += '<tr>'+
                  '<input type="hidden" name="id_ortem[]" value="'+data[i].id+'" class="form-control" readonly>'+
                  '<input type="hidden" name="order_parent[]" value="'+data[i].parent+'" class="form-control" readonly>'+
                  '<td><input type="hidden" name="order_item[]" value="'+data[i].item+'" class="form-control" readonly>'+data[i].item+'</td>'+
                  '<td><input type="hidden" name="order_qty[]" value="'+data[i].qty+'" class="form-control" readonly>'+data[i].qty+'</td>'+
                  '<td><input type="hidden" name="order_durasi[]" value="'+data[i].cek_target+'" class="form-control"><input type="hidden" name="order_target[]" value="'+data[i].target+'" class="form-control" readonly>'+data[i].cek_target+' ( '+data[i].target+' )</td>'+
                  '<td><input type="hidden" name="jam[]" value="'+data[i].jam+'" class="form-control" readonly><input type="hidden" name="hari[]" value="'+data[i].hari+'" class="form-control" readonly><input type="hidden" name="tanggal[]" value="'+data[i].tanggal+'" class="form-control" readonly><select class="form-control" name="order_priority[]" id="kolom_priority">'+
                  '<option value="10">No Priority</option>'+
                  <?php foreach ($priority as $p){ ?>
                    '<option value="<?= $p->priority?>"><?= $p->keterangan ?></option>'+
                  <?php } ?>
                  '</select></td>'+
                  '</tr>';

                  var price = data[i].price;
        }
        console.log(ate);
        $('#item').html(view);
        $('#price').val(price);
      }
    });
  });
  function tampil_priority()
  {
    $.ajax({
      method: 'GET',
      url: "<?= base_url() ?>index.php/order/tampil_priority",
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);
        var view = '';
        var i;
        for (var i = 0; i < data.length; i++) {
          view = '<option value="">qwu</option>';
        }
        $('#kolom_priority').html(view);
      }
    });
  }
   $('#item').on('click','.priority',function(){
    event.preventDefault();
    var id = $(this).attr('data');
    $('[name="id_item"]').val(id);
    $('#priority').modal('show');
  });
  $('#add_priority').click(function(){

    $('#priority').modal('hide');
  });
  $('#tombol').click(function() {
    event.preventDefault();
    $('#tabelku').toggle("slow");

  });
  $('#add_order').click(function(){
      event.preventDefault();
      var client = $('#client').val();
      var temjob = $('#template').val();
      var price = $('#price').val();
      var kirim = JSON.stringify(json);
      $.ajax({
        method: 'POST',
        url: "<?= base_url() ?>index.php/order/add_order/",
        dataType: "JSON",
        data: {client:client, temjob:temjob, price:price, kirim:kirim},
        success: function(data){
          console.log(kirim);

          $('#client').val('');
          $('#template').val('');
          $('#price').val('');
          $('#item').html('');
        }
      });


  });







});

</script>


</script>
