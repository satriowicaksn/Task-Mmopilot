
<section>
  <div class="card ml-3">
    <div class="card-header bg-dark text-white">
      <span class="fa fa-edit"></span>&nbsp&nbsp
      Template & Item
    </div>
    <div class="card-body">
      <div class="alert alert-warning" id="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="fa fa-n"></span> Silahkan masukan nama template, harga dan item utama
    </div>
      <form class="" action="<?= base_url() ?>index.php/job/add_template" method="post">
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
            <input type="number" class="form-control" name="harga_temjob" value="" required>
          </div>
          <!-- <a href="#" class="btn btn-sm btn-light text-info mt-2 ml-3" id="add_item"> <span class="fa fa-plus"></span>&nbsp&nbsp Tambah Item Utama</a> -->
        </div>
        <br>
          <label for="" class="text-dark">Pilih Item Utama</label>
          <select class="form-control" name="job_item" required>
            <option value="">-- pilih --</option>
          </select>
          <br>
          <label for="" class="text-dark">Total Yang dibutuhkan</label>
          <input type="number" name="job_qty" class="form-control" required>
          <input type="hidden" name="job_durasi" value="" id="job_durasi">
          <br>
          <label for="" class="text-dark">Pilih Target Item</label>
          <div class="row ml-3">
            <div class="col-md-3">
              <a href="#" class="btn btn-sm btn-info col-12" id="a"> <span class="fa fa-clock-o"></span>&nbsp&nbsp Per Hari</a>
            </div>
            <div class="col-md-3">
              <a href="#" class="btn btn-sm btn-info col-12" id="b"> <span class="fa fa-clock-o"></span>&nbsp&nbsp Per Minggu</a>
            </div>
            <div class="col-md-3">
              <a href="#" class="btn btn-sm btn-info col-12" id="c"> <span class="fa fa-clock-o"></span>&nbsp&nbsp Per Bulan</a>
            </div>
          </div>
          <div class="col-md-6" id="kolom_day">
            <br>
            <label for="" class="text-dark">Atur Jam</label>
            <input type="time" class="form-control" name="jam">
          </div>
          <div class="col-md-6" id="kolom_week">
            <br>
            <label for="" class="text-dark">Atur Hari</label>
            <select class="form-control" name="hari">
              <option value="Sunday">Minggu</option>
              <option value="Monday">Senin</option>
              <option value="Tuesday">Selasa</option>
              <option value="Wednesday">Rabu</option>
              <option value="Thursday">Kamis</option>
              <option value="Friday">Jum'at</option>
              <option value="Saturday">Sabtu</option>
            </select>
            <br>
            <label for="" class="text-dark">Atur Jam</label>
            <input type="time" class="form-control" name="week_jam">
          </div>
          <div class="col-md-6" id="kolom_month">
            <br>
            <label for="" class="text-dark">Atur Tanggal</label>
            <select class="form-control" name="tanggal">
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
              <option value="06">6</option>
              <option value="07">7</option>
              <option value="08">8</option>
              <option value="09">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
            <br>
            <label for="" class="text-dark">Atur Jam</label>
            <input type="time" class="form-control" name="month_jam">
          </div>
          <div class="col-md-6" id="target_kerja">
            <br>
            <label for="" class="text-dark">Target Pengerjaan</label>
            <input type="number" class="form-control" name="job_target">
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
<script type="text/javascript">
$(document).ready(function(){
$('#kolom_day').hide();
$('#kolom_week').hide();
$('#kolom_month').hide();
$('#target_kerja').hide();
$('#a').click(function(){
  event.preventDefault();
  $('#kolom_day').show(500);
  $('#kolom_week').hide();
  $('#kolom_month').hide();
  $('#target_kerja').show(500);
  $('#job_durasi').val('day');
});
$('#b').click(function(){
  event.preventDefault();
  $('#kolom_day').hide();
  $('#kolom_week').show(500);
  $('#kolom_month').hide();
  $('#target_kerja').show(500);
  $('#job_durasi').val('week');
});
$('#c').click(function(){
  event.preventDefault();
  $('#kolom_day').hide();
  $('#kolom_week').hide();
  $('#kolom_month').show(500);
  $('#target_kerja').show(500);
  $('#job_durasi').val('month');
});
});
</script>
