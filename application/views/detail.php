<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="<?=base_url();?>assets/bootstrap-treeview-1.2.0/public/css/bootstrap.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

   </head>
<body>
<section>
  <div class="card">
    <div class="card-header bg-dark text-white">
      <span class="fa fa-bars"></span>&nbsp&nbsp Template dan Item
    </div>
    <div class="card-body">
      <div class="alert alert-warning" id="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="fa fa-n"></span> Menampilkan detail item pada template
    </div>
      <?php foreach ($tem as $m) { ?>
        <h4 class="text-dark"> <b><?= $m->nama_game ?></b> </h4>
    <h4 class="text-dark"><?= $m->nama_temjob ?> / <?= $m->harga_temjob ?> $</h4>

    <h5 class="">Struktur Item</h5>
    <br>
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div id="treeview23" class="text-dark"></div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="buton mb-3">
          <a href="#" class="btn btn-md btn-info col-md-5" id="btn_add_utama"> <span class="fa fa-plus"></span> &nbsp&nbsp Tambah Item Utama</a>
          <a href="#" class="btn btn-md btn-info col-md-5 ml-2" id="btn_add_sub"> <span class="fa fa-plus"></span> &nbsp&nbsp Tambah Item Sub</a>
          <a href="#" class="btn btn-md btn-success col-md-5 mt-2" id="btn_edit"> <span class="fa fa-edit"></span> &nbsp&nbsp Edit Item</a>
          <a href="#" class="btn btn-md btn-danger col-md-5 ml-2 mt-2" id="btn_delete"> <span class="fa fa-trash"></span> &nbsp&nbsp Delete Item</a>
        </div>
        <br>
        <div class="buton mb-3 mt-2">

        </div>
        <br>
        <div class="" id="former">
          <form class="mt-3" action="<?= base_url() ?>index.php/job/details" method="post" id="form_add_utama">
            <label for="" class="text-dark">Tambah Item Utama</label>
            <input type="hidden" name="id" value="<?= $m->id_temjob?>">
            <input type="hidden" name="cek_target" value="" id="cek_target">
              <select class="form-control" name="item" required id="pilih_item">
                <option value="">---</option>
                <?php foreach ($item as $j){ ?>
                  <?php if ($j->id_game == $m->id_game): ?>
                    <option value="<?=  $j->item?>"><?=  $j->item?></option>
                  <?php endif; ?>
                <?php } ?>
              </select>
              <br>
              <input type="number" name="qty" class="form-control" placeholder="Jumlah yang dibutuhkan" required>
              <br>
              <label for="" class="text-dark">Pilih Target Pengerjaan</label>
              <div class="row ml-1 mb-3">
                <a href="#" id="target_day_utama" class="btn btn-sm btn-light text-dark col-md-3"> <span class="fa fa-clock-o"></span>&nbsp Per Hari </a>
                <a href="#" id="target_week_utama" class="btn btn-sm btn-light text-dark col-md-3 ml-3"> <span class="fa fa-clock-o"></span>&nbsp Per Minggu </a>
                <a href="#" id="target_month_utama" class="btn btn-sm btn-light text-dark col-md-3 ml-3"> <span class="fa fa-clock-o"></span>&nbsp Per Bulan </a>
              </div>
              <div class="" id="form_utama_day">
                <label for="">Atur Jam</label>
                <input type="time" name="jam" class="form-control mb-2">
              </div>
              <div class="" id="form_utama_week">
                <label for="">Atur Hari</label>
                <select class="form-control mb-2" name="hari">
                  <option value="7">Minggu</option>
                  <option value="1">Senin</option>
                  <option value="2">Selasa</option>
                  <option value="3">Rabu</option>
                  <option value="4">Kamis</option>
                  <option value="5">Jum'at</option>
                  <option value="6">Sabtu</option>
                </select>
                <label for="">Atur Jam</label>
                <input type="time" name="week_jam" class="form-control mb-2">
              </div>
              <div class="" id="form_utama_month">
                <label for="">Atur Tanggal</label>
                <select class="form-control mb-2" name="tanggal">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
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
                <label for="">Atur Jam</label>
                <input type="time" name="month_jam" class="form-control mb-2">
              </div>
              <div class="" id="form_target_utama">
                <label for="">Berapa Target nya ?</label>
                <input type="number" name="job_target" class="form-control mb-2" required>
              </div>
              <button class="btn btn-sm btn-info text-white col-12" type="submit" id="view_add" onclick="view_add()">Simpan</button>
          </form>
          <br>
          <form class="" action="<?= base_url() ?>index.php/job/details_sub" method="post" id="form_add_sub">
            <label for="">Tambah Sub Item</label>
            <input type="hidden" name="id" value="<?= $m->id_temjob?>">
            <input type="hidden" name="cek_target" value="" id="cek_target_sub">
              <select class="form-control" name="parent" required>
                <option value="" class="form-control">Pilih Parent Item</option>
                <?php foreach ($parent as $p) { ?>
                  <option value="<?=$p->id_job_item?>">Item : <?= $p->job_item?> // ID : <?=$p->id_job_item?> </option>
                <?php  } ?>
              </select>
              <br>
              <select class="form-control" name="item" required>
                <option value="">Pilih Item</option>
                <?php foreach ($item as $j){ ?>
                  <?php if ($j->id_game == $m->id_game): ?>
                    <option value="<?=  $j->item?>"><?=  $j->item?></option>
                  <?php endif; ?>
                <?php } ?>
              </select>
              <br>
              <input type="number" name="qty" class="form-control" placeholder="Jumlah yang dibutuhkan" required>
              <br>
              <label for="" class="text-dark">Pilih Target Pengerjaan</label>
              <div class="row ml-1 mb-3">
                <a href="#" id="target_day_sub" class="btn btn-sm btn-light text-dark col-md-3"> <span class="fa fa-clock-o"></span>&nbsp Per Hari </a>
                <a href="#" id="target_week_sub" class="btn btn-sm btn-light text-dark col-md-3 ml-3"> <span class="fa fa-clock-o"></span>&nbsp Per Minggu </a>
                <a href="#" id="target_month_sub" class="btn btn-sm btn-light text-dark col-md-3 ml-3"> <span class="fa fa-clock-o"></span>&nbsp Per Bulan </a>
              </div>
              <div class="" id="form_sub_day">
                <label for="">Atur Jam</label>
                <input type="time" name="jam" class="form-control mb-2">
              </div>
              <div class="" id="form_sub_week">
                <label for="">Atur Hari</label>
                <select class="form-control mb-2" name="hari">
                  <option value="7">Minggu</option>
                  <option value="1">Senin</option>
                  <option value="2">Selasa</option>
                  <option value="3">Rabu</option>
                  <option value="4">Kamis</option>
                  <option value="5">Jum'at</option>
                  <option value="6">Sabtu</option>
                </select>
                <label for="">Atur Jam</label>
                <input type="time" name="week_jam" class="form-control mb-2">
              </div>
              <div class="" id="form_sub_month">
                <label for="">Atur Tanggal</label>
                <select class="form-control mb-2" name="tanggal">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
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
                <label for="">Atur Jam</label>
                <input type="time" name="month_jam" class="form-control mb-2">
              </div>
              <div class="" id="form_target_utama">
                <label for="">Berapa Target nya ?</label>
                <input type="number" name="job_target" class="form-control mb-2" required>
              </div>
              <button class="btn btn-sm btn-info text-white col-12" type="submit" id="view_add" onclick="view_add()">Simpan</button>
          </form>

          <form class="mt-3" action="<?= base_url() ?>index.php/job/edit_item" method="post" id="form_edit">
            <label for="text-dark">Edit Item</label>
            <input type="hidden" name="id" value="<?= $m->id_temjob?>">
            <input type="hidden" name="id_job_item" id="id_job_item" value="">
            <input type="hidden" name="cek_target" value="" id="cek_edit">
              <select class="form-control" name="item" id="select_item" required>
                <option value="">Pilih Item</option>
                <?php foreach ($parent as $p) { ?>
                  <option value="<?=$p->id_job_item?>">Item : <?= $p->job_item?> // ID : <?=$p->id_job_item?> </option>
                <?php  } ?>
              </select>
              <br>
              <input type="number" name="qty" id="qty" class="form-control" placeholder="Jumlah yang dibutuhkan" required>
              <br>
              <label for="" class="text-dark">Pilih Target Pengerjaan</label>
              <div class="row ml-1 mb-3">
                <a href="#" id="target_day_edit" class="btn btn-sm btn-light text-dark col-md-3"> <span class="fa fa-clock-o"></span>&nbsp Per Hari </a>
                <a href="#" id="target_week_edit" class="btn btn-sm btn-light text-dark col-md-3 ml-3"> <span class="fa fa-clock-o"></span>&nbsp Per Minggu </a>
                <a href="#" id="target_month_edit" class="btn btn-sm btn-light text-dark col-md-3 ml-3"> <span class="fa fa-clock-o"></span>&nbsp Per Bulan </a>
              </div>
              <div class="" id="form_edit_day">
                <label for="">Atur Jam</label>
                <input type="time" name="jam" class="form-control mb-2" id="jam">
              </div>
              <div class="" id="form_edit_week">
                <label for="">Atur Hari</label>
                <select class="form-control mb-2" name="hari" id="hari">
                  <option value="7">Minggu</option>
                  <option value="1">Senin</option>
                  <option value="2">Selasa</option>
                  <option value="3">Rabu</option>
                  <option value="4">Kamis</option>
                  <option value="5">Jum'at</option>
                  <option value="6">Sabtu</option>
                </select>
                <label for="">Atur Jam</label>
                <input type="time" name="jam_minggu" class="form-control mb-2" id="jam_hari">
              </div>
              <div class="" id="form_edit_month">
                <label for="">Atur Tanggal</label>
                <select class="form-control mb-2" name="tanggal" id="tanggal">
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
                <label for="">Atur Jam</label>
                <input type="time" name="jam_bulan" class="form-control mb-2" id="jam_tanggal">
              </div>
              <div class="" id="form_target_edit">
                <label for="">Berapa Target nya ?</label>
                <input type="number" name="job_target" class="form-control mb-2" required id="target">
              </div>
              <br>

              <button class="btn btn-sm btn-success text-light col-12" type="submit">Edit</button>
          </form>


          <form class="mt-3" action="<?= base_url() ?>index.php/job/hapus_item" method="post" id="form_delete">
            <label for="">Hapus Item</label>
            <input type="hidden" name="id" value="<?= $m->id_temjob?>">
              <select class="form-control" name="item" required>
                <option value="" class="form-control">Pilih Item</option>
                <?php foreach ($parent as $p) { ?>
                  <option value="<?=$p->id_job_item?>">Item : <?= $p->job_item?> // ID : <?=$p->id_job_item?> </option>
                <?php  } ?>
              </select>
              <br>
              <button class="btn btn-sm btn-danger text-light col-12" type="submit">Hapus</button>
          </form>


          <br>
          <br>
        </div>
      </div>
    </div>
    </div>

  </div>
   <!-- <div><a class="btn btn-sm btn-danger text-light col-12"><span class="fa fa-plus"></span>&nbsp&nbsp Add</a></div> -->
</section>
<?php  } ?>
<!-- iki end e foreach template -->

<script type="text/javascript">
$(document).ready(function(){
  $('#pilih_item').select2();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#form_add_sub').hide();
$('#form_add_utama').hide()
$('#form_edit').hide();
$('#form_delete').hide();



// GET EDIT detail
$('#select_item').change(function(){
  var id = $('#select_item').val();
  $.ajax({
    method: 'POST',
    url: "<?= base_url() ?>index.php/job/get_detail_edit",
    dataType: "JSON",
    data: {id:id},
    success: function(data)
    {
      var i;
      for (var i = 0; i < data.length; i++) {
        var qty = data[i].job_qty;
        var durasi = data[i].job_durasi;
        var target = data[i].job_target;
        var hari = data[i].hari;
        var tanggal = data[i].tanggal;
        var jam = data[i].jam;

        var id_job = data[i].id_job_item;

      }
        $('#qty').val(qty);
        $('#target').val(target);
        $('#jam').val(jam);
        $('#jam_hari').val(jam);
        $('#jam_tanggal').val(jam);
        $('#tanggal').val(tanggal);

        $('#hari').val(hari);
        $('#id_job_item').val(id_job);
        $('#cek_edit').val(durasi);
    }
  });

});
// TOMBOL EDIT Target
$('#target_day_edit').click(function(){
  event.preventDefault();
  $('#cek_edit').val('day');
  $('#form_edit_day').show(500);
  $('#form_edit_week').hide(500);
  $('#form_edit_month').hide(500);
});
$('#target_week_edit').click(function(){
  event.preventDefault();
  $('#cek_edit').val('week');
  $('#form_edit_day').hide(500);
  $('#form_edit_week').show(500);
  $('#form_edit_month').hide(500);
});
$('#target_month_edit').click(function(){
  event.preventDefault();
  $('#cek_edit').val('month');
  $('#form_edit_day').hide(500);
  $('#form_edit_week').hide(500);
  $('#form_edit_month').show(500);
});
// TAMBAH ITEM UTAMA
$('#btn_add_utama').click(function(){
  event.preventDefault();
  $('#form_add_utama').show(500);
  $('#form_add_sub').hide(500);
  $('#form_edit').hide(500);
  $('#form_delete').hide(500);
  $('#form_utama_day').hide(500);
  $('#form_utama_week').hide(500);
  $('#form_utama_month').hide(500);
});
$('#target_day_utama').click(function(){
  event.preventDefault();
  $('#cek_target').val('day');
  $('#form_utama_day').show(500);
  $('#form_utama_week').hide(500);
  $('#form_utama_month').hide(500);
});
$('#target_week_utama').click(function(){
  event.preventDefault();
  $('#cek_target').val('week');
  $('#form_utama_day').hide(500);
  $('#form_utama_week').show(500);
  $('#form_utama_month').hide(500);
});
$('#target_month_utama').click(function(){
  event.preventDefault();
  $('#cek_target').val('month');
  $('#form_utama_day').hide(500);
  $('#form_utama_week').hide(500);
  $('#form_utama_month').show(500);
});

// TAMBAH ITEM SUB
$('#btn_add_sub').click(function(){
  event.preventDefault();
  $('#form_add_utama').hide(500);
  $('#form_add_sub').show(500);
  $('#form_edit').hide(500);
  $('#form_delete').hide(500);
  $('#form_sub_day').hide(500);
  $('#form_sub_week').hide(500);
  $('#form_sub_month').hide(500)
});
$('#target_day_sub').click(function(){
  event.preventDefault();
  $('#cek_target_sub').val('day');
  $('#form_sub_day').show(500);
  $('#form_sub_week').hide(500);
  $('#form_sub_month').hide(500);
});
$('#target_week_sub').click(function(){
  event.preventDefault();
  $('#cek_target_sub').val('week');
  $('#form_sub_day').hide(500);
  $('#form_sub_week').show(500);
  $('#form_sub_month').hide(500);
});
$('#target_month_sub').click(function(){
  event.preventDefault();
  $('#cek_target_sub').val('month');
  $('#form_sub_day').hide(500);
  $('#form_sub_week').hide(500);
  $('#form_sub_month').show(500);
});


// EDIT ITEM
$('#btn_edit').click(function(){
  event.preventDefault();
  $('#form_add_utama').hide(500);
  $('#form_add_sub').hide(500);
  $('#form_edit').show(500);
  $('#form_delete').hide(500);
  $('#form_edit_day').hide(500);
  $('#form_edit_week').hide(500);
  $('#form_edit_month').hide(500)
});


$('#btn_delete').click(function(){
  event.preventDefault();
  $('#form_add_utama').hide(500);
  $('#form_add_sub').hide(500);
  $('#form_edit').hide(500);
  $('#form_delete').show(500);
});

});
</script>


<script src="<?=base_url();?>assets/bootstrap-treeview-1.2.0/public/js/jquery.js"></script>
<script src="<?=base_url();?>assets/bootstrap-treeview-1.2.0/public/js/bootstrap-treeview.js"></script>
<script>
   var defaultData = [
      <?php
        $id = $this->input->post('id');
         $utama=$this->treeview_m->get_template_parent($id);
         foreach ($utama as $k) {
           $ids = $k['id_job_item'];
           $sub1=$this->treeview_m->get_sub($ids);
            echo "{text: '  $k[job_item] / ID : $k[id_job_item]',
            tags: ['".($k['job_qty'])."'],
            nodes: [
               ";
               foreach ($sub1 as $s) {
                 $ids = $s['id_job_item'];
                 $sub2=$this->treeview_m->get_sub2($ids);
                  echo "{
                     text: ' $s[job_item] / ID : $s[id_job_item]',
                     tags: ['".($s['job_qty'])."'],
                     nodes: [
                           ";
                           foreach ($sub2  as $ss) {
                             $ids = $ss['id_job_item'];
                             $sub3=$this->treeview_m->get_sub3($ids);
                              echo "{
                                 text: ' $ss[job_item] / ID : $ss[id_job_item]',
                                 tags: ['".($ss['job_qty'])."'],
                                 nodes: [
                                       ";
                                       foreach ($sub3  as $sss) {
                                         $ids = $sss['id_job_item'];
                                         $sub4=$this->treeview_m->get_sub4($ids);
                                          echo "{
                                             text: ' $sss[job_item] / ID : $sss[id_job_item]',
                                             tags: ['".($sss['job_qty'])."'],
                                             nodes: [
                                                   ";
                                                   foreach ($sub4  as $ssss) {
                                                     $ids = $ssss['id_job_item'];
                                                     $sub5=$this->treeview_m->get_sub5($ids);
                                                      echo "{
                                                         text: ' $ssss[job_item] / ID : $ssss[id_job_item]',
                                                         tags: ['".($ssss['job_qty'])."'],
                                                         nodes: [
                                                               ";
                                                               foreach ($sub5  as $sssss) {
                                                                 $ids = $sssss['id_job_item'];
                                                                 $sub6=$this->treeview_m->get_sub6($ids);
                                                                  echo "{
                                                                     text: ' $sssss[job_item] / ID : $sssss[id_job_item]',
                                                                     tags: ['".($sssss['job_qty'])."'],
                                                                     nodes: [
                                                                           ";
                                                                           foreach ($sub6  as $ssssss) {
                                                                             $ids = $ssssss['id_job_item'];
                                                                             $sub7=$this->treeview_m->get_sub7($ids);
                                                                              echo "{
                                                                                 text: ' $ssssss[job_item] / ID : $ssssss[id_job_item]',
                                                                                 tags: ['".($ssssss['job_qty'])."'],
                                                                                 nodes: [
                                                                                       ";
                                                                                       foreach ($sub7  as $x) {
                                                                                         $ids = $x['id_job_item'];
                                                                                         $sub8=$this->treeview_m->get_sub8($ids);
                                                                                          echo "{
                                                                                             text: ' $x[job_item] / ID : $x[id_job_item]',
                                                                                             tags: ['".($x['job_qty'])."'],
                                                                                             nodes: [
                                                                                                   ";
                                                                                                   foreach ($sub8  as $xx) {
                                                                                                     $ids = $xx['id_job_item'];
                                                                                                     $sub9=$this->treeview_m->get_sub9($ids);
                                                                                                      echo "{
                                                                                                         text: ' $xx[job_item] / ID : $xx[id_job_item]',
                                                                                                         tags: ['".($xx['job_qty'])."'],
                                                                                                         nodes: [
                                                                                                               ";
                                                                                                               foreach ($sub9  as $xxx) {
                                                                                                                 $ids = $xxx['id_job_item'];
                                                                                                                 $sub10=$this->treeview_m->get_sub10($ids);
                                                                                                                  echo "{
                                                                                                                     text: ' $xxx[job_item] / ID : $xxx[id_job_item]',
                                                                                                                     tags: ['".($xxx['job_qty'])."'],
                                                                                                                     nodes: [
                                                                                                                           ";
                                                                                                                           foreach ($sub10  as $z) {
                                                                                                                             $ids = $z['id_job_item'];
                                                                                                                             $subx=$this->treeview_m->get_subx($ids);
                                                                                                                              echo "{
                                                                                                                                 text: ' $z[job_item] / ID : $z[id_job_item]',
                                                                                                                                 tags: ['".($z['job_qty'])."'],
                                                                                                                                 nodes: [
                                                                                                                                       ";
                                                                                                                                       foreach ($subx  as $zz) {

                                                                                                                                          echo "{
                                                                                                                                             text: ' $zz[job_item] / ID : $zz[id_job_item]',
                                                                                                                                             tags: ['".($zz['job_qty'])."'],
                                                                                                                                             nodes: [
                                                                                                                                                   ";

                                                                                                                                          echo "
                                                                                                                                             ]
                                                                                                                                             },";
                                                                                                                                       }

                                                                                                                              echo "
                                                                                                                                 ]
                                                                                                                                 },";
                                                                                                                           }

                                                                                                                  echo "
                                                                                                                     ]
                                                                                                                     },";
                                                                                                               }

                                                                                                      echo "
                                                                                                         ]
                                                                                                         },";
                                                                                                   }

                                                                                          echo "
                                                                                             ]
                                                                                             },";
                                                                                       }

                                                                              echo "
                                                                                 ]
                                                                                 },";
                                                                           }

                                                                  echo "
                                                                     ]
                                                                     },";
                                                               }

                                                      echo "
                                                         ]
                                                         },";
                                                   }

                                          echo "
                                             ]
                                             },";
                                       }

                              echo "
                                 ]
                                 },";
                           }

                  echo "
                     ]
                     },";
               }

            echo "]},";
         }
         ?>
   ];
   $('#treeview23').treeview({
      levels: 5,
      showTags: true,
      data: defaultData
   });


</script>
</body>
</html>
