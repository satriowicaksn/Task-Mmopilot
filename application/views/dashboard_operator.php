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
        <h5 class="text-dark"><span class="fa fa-book"></span>&nbsp Job Priority</h5>
        <br>
        <div class="search">
          <form class="" action="<?= base_url() ?>index.php/home/search" method="post">
            <div class="form-group col-12">
              <div class="row">
                <select class="form-control col-md-4" name="client" id="client" required>
                  <option value="">-- pilih client --</option>
                  <?php foreach ($client as $c){ ?>
                    <option value="<?= $c->id_user ?>"><?= $c->name ?></option>
                  <?php } ?>
                </select>
                <select class="form-control col-md-4 ml-3" name="order" id="order" required>
                  <option value="">-- pilih order --</option>
                </select>
                &nbsp&nbsp
                <button type="submit" name="button" class="btn btn-sm btn-info "> <span class="fa fa-search"></span>&nbsp&nbsp Search</button>
                  </form>
              </div>
            </div>
        </div>
        <!-- <div class="search">
          <form class="" action="" method="post">
            <div class="form-group col-12">
              <div class="row">
                <input type="text" name="seacrh" value="" class="form-control col-4" placeholder="Cari berdasarkan item">
                &nbsp&nbsp
                <button type="submit" name="button" class="btn btn-xs btn-success "> <span class="fa fa-search"></span> </button>
                  </form>
              </div>
            </div>
        </div> -->




        </div>

      </div>
    </div>
      </div>
  </div>

</section>
<script src="<?= base_url(); ?>assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#client').change(function(){
  var client = $('#client').val();
  console.log(client);
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/home/get_dropdown",
    dataType: "JSON",
    data: {client:client},
    success: function(data)
    {
      var view = '';
      var i;
      for (var i = 0; i < data.length; i++) {
        view += '<option value="'+data[i].order+'">'+data[i].nama_order+'</option>';
      }
      $('#order').html(view);
    }
  });
});
});
</script>
