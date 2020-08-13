<?php
class Home_model extends CI_Model
{
  public function logout_aja()
  {
    $id_client = $this->input->post('id_client');
    $session_id = $this->session->userdata('id');
    $date = date('d M Y');
    $belum = 'belum';
    $id_laporan = $this->input->post('id_laporan');
    $this->db->query("UPDATE mmo_client SET client_shift = '$belum' WHERE id_client = '$id_client'");
    $this->db->query("UPDATE mmo_user SET operator_status = '$belum' WHERE id_user = '$session_id'");
    $this->db->query("UPDATE mmo_laporan_shift SET status_shift = '$belum' WHERE id_laporan_shift = '$id_laporan'");
  }
  public function login_client_akun()
  {
    $id_client = $this->input->post('id_client');
    $session_id = $this->session->userdata('id');
    $date = date('d M Y');
    $status = 'login';
    $belum = 'belum';
    $cek = $this->db->query("SELECT * FROM mmo_laporan_shift WHERE id_user = '$session_id' && date_shift = '$date' && status_shift = '$belum'")->result();
    foreach ($cek as $c) {
      $id = $c->id_laporan_shift;
    }
    $this->db->query("UPDATE mmo_laporan_shift SET id_client = '$id_client', status_shift = '$status' WHERE id_laporan_shift = '$id'");
    $this->db->query("UPDATE mmo_user SET operator_status = '$belum' WHERE id_user = '$session_id'");
    $this->db->query("UPDATE mmo_client SET client_shift = '$status' WHERE id_client = '$id_client'");
  }

  public function logout_client_akun()
  {
    $id_client = $this->input->post('id_client');
    $session_id = $this->session->userdata('id');
    $date = date('d M Y');
    $status = 'login';
    $belum = 'belum';
    $cek_login = $this->db->query("SELECT * FROM mmo_laporan_shift WHERE id_user = '$session_id' && date_shift = '$date'");
    foreach ($cek_login->result() as $c) {
      $id = $c->id_laporan_shift;
      $status_login = $c->status_shift;
      $id_client_lama = $c->id_client;
    }
    if ($status_login == $status) {
      $this->db->query("UPDATE mmo_laporan_shift SET id_client = '$id_client', status_shift = '$status' WHERE id_laporan_shift = '$id'");
    }
    $this->db->query("UPDATE mmo_client SET client_shift = '$belum' WHERE id_client = '$id_client_lama'");
    $this->db->query("UPDATE mmo_client SET client_shift = '$status' WHERE id_client = '$id_client'");


  }

  public function get_detail_shift()
  {
    $session_id = $this->session->userdata('id');
    $date = date('d M Y');
    $this->db->select('*');
    $this->db->from('mmo_laporan_shift');
    $this->db->where('mmo_laporan_shift.id_user', $session_id);
    $this->db->where('mmo_laporan_shift.date_shift', $date);
    return $this->db->get()->result();
  }
  public function get_detail_client()
  {
    $session_id = $this->session->userdata('id');
    $date = date('d M Y');
    $this->db->select('*');
    $this->db->from('mmo_laporan_shift');
    $this->db->join('mmo_client', 'mmo_client.id_client = mmo_laporan_shift.id_client');
    $this->db->where('mmo_laporan_shift.id_user', $session_id);
    $this->db->where('mmo_laporan_shift.date_shift', $date);
    return $this->db->get()->result();
  }
  public function cek_shift()
  {
    $session_id = $this->session->userdata('id');
    $date = date('d M Y');
    $this->db->select('*');
    $this->db->from('mmo_laporan_shift');
    $this->db->where('id_user', $session_id);
    $this->db->where('date_shift', $date);
    return $this->db->get()->num_rows();
  }
  public function cek_shift_login()
  {
    $session_id = $this->session->userdata('id');
    $date = date('d M Y');
    $status = 'login';
    $this->db->select('*');
    $this->db->from('mmo_laporan_shift');
    $this->db->where('id_user', $session_id);
    $this->db->where('date_shift', $date);
    $this->db->where('status_shift', $status);
    return $this->db->get()->num_rows();
  }

  public function login_shift()
  {
    $session_id = $this->session->userdata('id');
    $shift = $this->input->post('shift');
    $time = time();
    $data = array(
      'shift' => $shift,
      'id_user' => $session_id,
      'status_shift' => 'belum',
      'jam_shift' => $time,
      'date_shift' => date('d M Y'),
    );
    $this->db->insert('mmo_laporan_shift', $data);
  }
  public function get_client_akun()
  {
    $this->db->select('*');
    $this->db->from('mmo_client');
    return $this->db->get()->result();
  }
  public function get_priority()
  {
    return $this->db->get('mmo_priority')->result();
  }
  public function edit_priority()
  {
    $id = $this->input->post('id');
    $priority = $this->input->post('order_priority');
    $this->db->query("UPDATE mmo_order_item SET order_priority = '$priority' WHERE id_order_item = '$id'");
  }
  public function get_total_aktif()
  {
    $status = 'aktif';
    $this->db->select('count(*) as jml');
    $this->db->from('mmo_order');
    $this->db->where('order_status', $status);
    return $this->db->get()->result();
  }
  public function get_total_selesai()
  {
    $status = 'selesai';
    $this->db->select('count(*) as jml');
    $this->db->from('mmo_order');
    $this->db->where('order_status', $status);
    return $this->db->get()->result();
  }
  public function get_total_template()
  {
    $this->db->select('count(*) as jml');
    $this->db->from('mmo_temjob');
    return $this->db->get()->result();
  }
  public function get_order()
  {
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order = mmo_order.id_order');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client_game = mmo_order.id_user');
    $this->db->join('mmo_laporan_shift', 'mmo_laporan_shift.id_client = mmo_client_game.id_client');
    $this->db->join('mmo_temjob', 'mmo_order.order = mmo_temjob.id_temjob');
    $this->db->join('mmo_priority', 'mmo_priority.priority = mmo_order_item.order_priority');
    // $this->db->order_by('order_priority', 'ASC');
    $query =  $this->db->get()->result();
    $jam = date('H:i:s');
    $date = date('d M Y');
    $hari = date('N');
    $tanggal = date('d');
    // Melakukan Pengecekan Jika Sudah melebihi Jam Target
    foreach ($query as $q) {
      // Jika target nya tiap hari
      if ($q->order_durasi == 'day') {
        if ($q->order_date != $date) {
          if ($q->order_target_progres >= $q->order_target) {
            if ($jam > $q->jam) {
              $update = array();
              $update[] = array(
                'id_order_item' => $q->id_order_item,
                'order_target_progres' => '0',
                'order_date' => $date,
              );
              $this->db->update_batch('mmo_order_item',$update,'id_order_item');
              $this->db->query("UPDATE mmo_order_item SET order_target_progres = '0', order_date = '$date' WHERE id_order_item = '$q->id_order_item'");
            }
          }
        }
      }
      // Jika target nya tiap minggu
      if ($q->order_durasi == 'week') {
          if ($q->order_target_progres >= $q->order_target) {
            if ($q->hari == $hari) {
              if ($jam > $q->jam) {
                  $this->db->query("UPDATE mmo_order_item SET order_target_progres = '0' WHERE id_order_item = '$q->id_order_item'");
              }
            }
        }
      }
      // Jika target nya tiap bulan
      if ($q->order_durasi == 'month') {
          if ($q->order_target_progres >= $q->order_target) {
            if ($q->tanggal == $tanggal) {
              if ($jam > $q->jam) {
                  $this->db->query("UPDATE mmo_order_item SET order_target_progres = '0' WHERE id_order_item = '$q->id_order_item'");
              }
            }
        }
      }
      //SELESAI CEK
    }
    // SELESAI FOREACH
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order = mmo_order.id_order');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client_game = mmo_order.id_user');
    $this->db->join('mmo_temjob', 'mmo_order.order = mmo_temjob.id_temjob');
    $this->db->join('mmo_priority', 'mmo_priority.priority = mmo_order_item.order_priority');
    $this->db->order_by('order_priority', 'ASC');
    $get =  $this->db->get()->result();
    return $get;

  }
  public function get_order_search($id, $order)
  {
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order = mmo_order.id_order');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client_game = mmo_order.id_user');
    $this->db->join('mmo_temjob', 'mmo_order.order = mmo_temjob.id_temjob');
    $this->db->join('mmo_priority', 'mmo_priority.priority = mmo_order_item.order_priority');
    $this->db->where('mmo_order.id_user', $id);
    $this->db->where('mmo_order_item.id_order', $order);
    $this->db->order_by('order_priority', 'ASC');
    return $this->db->get()->result();
  }
  public function get_row_order($id, $order)
  {
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order = mmo_order.id_order');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client_game = mmo_order.id_user');
    $this->db->join('mmo_temjob', 'mmo_order.order = mmo_temjob.id_temjob');
    $this->db->join('mmo_priority', 'mmo_priority.priority = mmo_order_item.order_priority');
    $this->db->where('mmo_order.id_user', $id);
    $this->db->where('mmo_order_item.id_order', $order);
    $this->db->order_by('order_priority', 'ASC');
    return $this->db->get()->num_rows();
  }
  public function get_row_order_semua()
  {
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order = mmo_order.id_order');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client_game = mmo_order.id_user');
    $this->db->join('mmo_temjob', 'mmo_order.order = mmo_temjob.id_temjob');
    $this->db->join('mmo_priority', 'mmo_priority.priority = mmo_order_item.order_priority');
    return $this->db->get()->num_rows();
  }
  public function get_dropdown($client)
  {
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_temjob', 'mmo_temjob.id_temjob = mmo_order.order');
    $this->db->where('mmo_order.id_user' ,$client);
    $query = $this->db->get();
      foreach ($query->result_array() as $d) {
        $data[] = array(
          'order' => $d['id_order'],
          'nama_order' => $d['nama_temjob'],
        );
      }
      return $data;
  }
}

?>
