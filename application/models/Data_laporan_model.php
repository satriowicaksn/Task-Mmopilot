<?php
class Data_laporan_model extends CI_Model
{
  public function get_all($awal, $akhir)
  {
    $this->db->select('*');
    $this->db->from('mmo_laporan');
    $this->db->join('mmo_laporan_item', 'mmo_laporan.id_laporan = mmo_laporan_item.id_laporan');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client_game = mmo_laporan.client');
    $this->db->join('mmo_order', 'mmo_order.id_order = mmo_laporan.laporan_order');
    $this->db->join('mmo_temjob', 'mmo_temjob.id_temjob = mmo_order.order');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order_item = mmo_laporan_item.id_order_item');
    $this->db->group_by('mmo_laporan.id_laporan');
    return $this->db->get()->result();

  }
  public function get_by_date($awal, $akhir)
  {
    $this->db->select('*');
    $this->db->from('mmo_laporan');
    $this->db->join('mmo_laporan_item', 'mmo_laporan.id_laporan = mmo_laporan_item.id_laporan');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client_game = mmo_laporan.client');
    $this->db->join('mmo_order', 'mmo_order.id_order = mmo_laporan.laporan_order');
    $this->db->join('mmo_temjob', 'mmo_temjob.id_temjob = mmo_order.order');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order_item = mmo_laporan_item.id_order_item');
    $this->db->where('mmo_laporan.laporan_date >=', $awal);
    $this->db->where('mmo_laporan.laporan_date <=', $akhir);
    $this->db->group_by('mmo_laporan.id_laporan');
    return $this->db->get()->result();

  }
  public function get_detail()
  {
    $this->db->select('*');
    $this->db->from('mmo_laporan');
    $this->db->join('mmo_laporan_item', 'mmo_laporan.id_laporan = mmo_laporan_item.id_laporan');
    return $this->db->get()->result();
  }
  public function edit_laporan($id)
  {
    $this->db->select('*');
    $this->db->from('mmo_laporan');
    $this->db->join('mmo_laporan_item', 'mmo_laporan.id_laporan = mmo_laporan_item.id_laporan');
    $this->db->group_by('mmo_laporan.id_laporan');
    $this->db->where('mmo_laporan.id_laporan', $id);
    return $this->db->get()->result();
  }
  public function edit_laporan_detail($id)
  {
    $this->db->select('*');
    $this->db->from('mmo_laporan');
    $this->db->join('mmo_laporan_item', 'mmo_laporan.id_laporan = mmo_laporan_item.id_laporan');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order_item = mmo_laporan_item.id_order_item');
    $this->db->where('mmo_laporan.id_laporan', $id);
    return $this->db->get()->result();
  }
  public function update()
  {
    $qty = $this->input->post('qty');
    $total = $this->input->post('total');
    $progres = $this->input->post('progres');
    $id_laporan_item = $this->input->post('id_laporan_item');
    $id_order_item = $this->input->post('id_order_item');
    $order_durasi = $this->input->post('order_durasi');
    $order_date = $this->input->post('order_date');
    $cek_date = $this->input->post('cek_date');
    $order_target_progres = $this->input->post('order_target_progres');
    $cek = date('d M Y');
    $update = array();
    foreach ($id_order_item as $i => $value) {
      $update[] = array(
        'id_laporan_item' => $id_laporan_item[$i],
        'laporan_progres' => $progres[$i],
      );
    }
      $this->db->update_batch('mmo_laporan_item',$update,'id_laporan_item');

      // UPDATE KE ORDER DATA
      $order = array();
      foreach ($id_order_item as $o => $value) {
        if ($order_durasi[$o] == 'day') {
          if ($cek == $cek_date[$o]) {
            $order[] = array(
              'id_order_item' => $id_order_item[$o],
              'order_target_progres' => ($order_target_progres[$o]-$total[$o])+$progres[$o],
              'order_progres' => ($qty[$o]-$total[$o])+$progres[$o],
            );
          }
          if ($cek != $cek_date[$o]) {
            $order[] = array(
              'id_order_item' => $id_order_item[$o],
              'order_progres' => ($qty[$o]-$total[$o])+$progres[$o],
            );
          }
        }
        if ($order_durasi[$o] == 'week') {
          if ($cek == $cek_date[$o]) {
            $order[] = array(
              'id_order_item' => $id_order_item[$o],
              'order_target_progres' => ($order_target_progres[$o]-$total[$o])+$progres[$o],
              'order_progres' => ($qty[$o]-$total[$o])+$progres[$o],
            );
          }
          if ($cek != $cek_date[$o]) {
            $order[] = array(
              'id_order_item' => $id_order_item[$o],
              'order_target_progres' => ($order_target_progres[$o]-$total[$o])+$progres[$o],
              'order_progres' => ($qty[$o]-$total[$o])+$progres[$o],
            );
          }
        }
        if ($order_durasi[$o] == 'month') {
          if ($cek == $cek_date[$o]) {
            $order[] = array(
              'id_order_item' => $id_order_item[$o],
              'order_target_progres' => ($order_target_progres[$o]-$total[$o])+$progres[$o],
              'order_progres' => ($qty[$o]-$total[$o])+$progres[$o],
            );
          }
          if ($cek != $cek_date[$o]) {
            $order[] = array(
              'id_order_item' => $id_order_item[$o],
              'order_target_progres' => ($order_target_progres[$o]-$total[$o])+$progres[$o],
              'order_progres' => ($qty[$o]-$total[$o])+$progres[$o],
            );
          }
        }

      }
        $this->db->update_batch('mmo_order_item',$order,'id_order_item');

  }
}

 ?>
