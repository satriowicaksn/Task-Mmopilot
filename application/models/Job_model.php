<?php
class Job_model extends CI_Model
{
  public function get_template_detail($id)
  {
    $this->db->select('*');
    $this->db->from('mmo_temjob');
    $this->db->join('mmo_game', 'mmo_game.id_game = mmo_temjob.id_game');
    $this->db->where('mmo_temjob.id_temjob', $id);
    return $this->db->get()->result();
  }
  public function get_detail_edit($id)
  {
    $this->db->select('*');
    $this->db->from('mmo_job_item');
    $this->db->join('mmo_job_day', 'mmo_job_day.id_job_item = mmo_job_item.id_job_item');
    $this->db->where('mmo_job_item.id_job_item', $id);
    $select = $this->db->get()->result();
    return $select;
  }
  public function edit_item($id)
  {
    $id_ortem = $this->input->post('id_ortem');
    $durasi = $this->input->post('cek_target');
    $qty = $this->input->post('qty');
    $tanggal = $this->input->post('tanggal');
    $hari = $this->input->post('hari');
    $id_job = $this->input->post('id_job_item');
    $jam = $this->input->post('jam');
    $jam_bulan = $this->input->post('jam_bulan');
    $jam_minggu = $this->input->post('jam_minggu');
    $target = $this->input->post('job_target');
    if ($durasi == 'day') {
      $this->db->query("UPDATE mmo_job_item SET job_qty = '$qty', job_durasi = '$durasi', job_target = '$target' WHERE id_job_item = '$id_job'");
      $this->db->query("UPDATE mmo_job_day SET cek_target = '$durasi', jam = '$jam' WHERE id_job_item = '$id_job'");
      $this->db->query("UPDATE mmo_order_item SET jam = '$jam' WHERE id_ortem = '$id_job'");


    }
    if ($durasi == 'week') {
      $this->db->query("UPDATE mmo_job_item SET job_qty = '$qty', job_durasi = '$durasi', job_target = '$target' WHERE id_job_item = '$id_job'");
      $this->db->query("UPDATE mmo_job_day SET cek_target = '$durasi', jam = '$jam_minggu', hari = '$hari' WHERE id_job_item = '$id_job'");
      $this->db->query("UPDATE mmo_order_item SET jam = '$jam_minggu', hari = '$hari' WHERE id_ortem = '$id_job'");
    }
    if ($durasi == 'month') {
      $this->db->query("UPDATE mmo_job_item SET job_qty = '$qty', job_durasi = '$durasi', job_target = '$target' WHERE id_job_item = '$id_job'");
      $this->db->query("UPDATE mmo_job_day SET cek_target = '$durasi', jam = '$jam_bulan', tanggal = '$tanggal' WHERE id_job_item = '$id_job'");
      $this->db->query("UPDATE mmo_order_item SET jam = '$jam_bulan', tanggal = '$tanggal' WHERE id_ortem = '$id_job'");
    }
  }
  public function buat_template()
  {
    $nama_temjob = $this->input->post('nama_temjob');
    $harga_temjob = $this->input->post('harga_temjob');
    $game = $this->input->post('game');
    $time = time();

    $data = array(
      'nama_temjob' => $nama_temjob,
      'harga_temjob' => $harga_temjob,
      'id_game' => $game,
      'kode_temjob' => $time,
    );
    $this->db->insert('mmo_temjob', $data);
  }

  public function get_job()
  {
    $this->db->select('*');
    $this->db->from('mmo_temjob');
    $this->db->join('mmo_game', 'mmo_game.id_game = mmo_temjob.id_game');
    return $this->db->get()->result();
  }
  public function get_detail($id)
  {
    $this->db->select('*');
    $this->db->from('mmo_job_item');
    $this->db->join('mmo_temjob', 'mmo_job_item.id_temjob = mmo_temjob.id_temjob');
    $this->db->where('mmo_job_item.id_temjob', $id);
    return $this->db->get()->result();
  }

  public function add_job($id)
  {
    $job_item = $this->input->post('item');
    $job_qty = $this->input->post('qty');
    $job_target = $this->input->post('job_target');
    $job_durasi = $this->input->post('cek_target');
    $jam = $this->input->post('jam');
    $week_jam = $this->input->post('week_jam');
    $month_jam = $this->input->post('month_jam');
    $hari = $this->input->post('hari');
    $tanggal = $this->input->post('tanggal');
    $time = time();
    $data = array(
      'id_temjob' => $id,
      'job_item' => $job_item,
      'job_qty' => $job_qty,
      'job_durasi' => $job_durasi,
      'job_target' => $job_target,
      'id_parent' => '0',
      'job_time' => $time,
    );
    $this->db->insert('mmo_job_item', $data);
    $select = $this->db->query("SELECT * FROM mmo_job_item WHERE job_time = '$time'")->result();
    foreach ($select as $s) {
      $id_job_item = $s->id_job_item;
    }

    if ($job_durasi == 'day') {
      $item = array(
        'cek_target' => 'day',
        'id_job_item' => $id_job_item,
        'jam' => $jam,
        'hari' => '0',
        'tanggal' => '0',
      );
      $this->db->insert('mmo_job_day', $item);
    }
    if ($job_durasi == 'week') {
      $item = array(
        'cek_target' => 'week',
        'id_job_item' => $id_job_item,
        'jam' => $week_jam,
        'hari' => $hari,
        'tanggal' => '0',
      );
      $this->db->insert('mmo_job_day', $item);
    }
    if ($job_durasi == 'month') {
      $item = array(
        'cek_target' => 'month',
        'id_job_item' => $id_job_item,
        'jam' => $month_jam,
        'hari' => '0',
        'tanggal' => $tanggal,
      );
      $this->db->insert('mmo_job_day', $item);
    }

  }



  public function add_subjob($id)
  {
    $job_item = $this->input->post('item');
    $job_qty = $this->input->post('qty');
    $parent = $this->input->post('parent');
    $job_target = $this->input->post('job_target');
    $job_durasi = $this->input->post('cek_target');
    $jam = $this->input->post('jam');
    $week_jam = $this->input->post('week_jam');
    $month_jam = $this->input->post('month_jam');
    $hari = $this->input->post('hari');
    $tanggal = $this->input->post('tanggal');
    $time = time();
    $data = array(
      'id_temjob' => $id,
      'job_item' => $job_item,
      'job_qty' => $job_qty,
      'job_durasi' => $job_durasi,
      'job_target' => $job_target,
      'id_parent' => $parent,
      'job_time' => $time,
    );
    $this->db->insert('mmo_job_item', $data);
    $select = $this->db->query("SELECT * FROM mmo_job_item WHERE job_time = '$time'")->result();
    foreach ($select as $s) {
      $id_job_item = $s->id_job_item;
    }

    if ($job_durasi == 'day') {
      $item = array(
        'cek_target' => 'day',
        'id_job_item' => $id_job_item,
        'jam' => $jam,
        'hari' => '0',
        'tanggal' => '0',
      );
      $this->db->insert('mmo_job_day', $item);
    }
    if ($job_durasi == 'week') {
      $item = array(
        'cek_target' => 'week',
        'id_job_item' => $id_job_item,
        'jam' => $week_jam,
        'hari' => $hari,
        'tanggal' => '0',
      );
      $this->db->insert('mmo_job_day', $item);
    }
    if ($job_durasi == 'month') {
      $item = array(
        'cek_target' => 'month',
        'id_job_item' => $id_job_item,
        'jam' => $month_jam,
        'hari' => '0',
        'tanggal' => $tanggal,
      );
      $this->db->insert('mmo_job_day', $item);
    }

  }
}
?>
