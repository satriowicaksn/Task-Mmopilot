<?php
class Home_model extends CI_Model
{
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
