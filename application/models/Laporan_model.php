<?php
/**
 *
 */
class Laporan_model extends CI_Model
{
  public function get_staff()
  {
    return $this->db->query("SELECT * FROM mmo_user WHERE id_role = '2'")->result();
  }
  public function get_order()
  {
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_temjob', 'mmo_temjob.id_temjob = mmo_order.order');
    $this->db->join('mmo_user', 'mmo_order.id_user = mmo_user.id_user');
    return $this->db->get()->result();
  }
  public function get_item($order)
  {
    $this->db->select('*');
    $this->db->from('mmo_order_item');
    $this->db->join('mmo_order', 'mmo_order.id_order = mmo_order_item.id_order');
    $this->db->join('mmo_temjob', 'mmo_temjob.id_temjob = mmo_order.order');
    $this->db->where('mmo_order_item.id_order', $order);
    $this->db->order_by('order_priority', 'ASC');
    return $this->db->get()->result();
  }
  public function add_laporan()
  {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    $kode = time();
    $manager = $this->session->userdata('name');
    $order = $this->input->post('order');
    $staff = $this->input->post('staff');
    $client = $this->input->post('client');
    $order_target_progres = $this->input->post('order_target_progres');
    $order_progres = $this->input->post('order_progres');
    $order_item = $this->input->post('order_item');
    $order_durasi = $this->input->post('order_durasi');
    $order_date = $this->input->post('order_date');
    $cek_date = date('d M Y');
    $id_order_item = $this->input->post('id_order_item');
    $add_laporan = array(
      'manager' => $manager,
      'staff' => $staff,
      'client' => $client,
      'laporan_order' => $order,
      'laporan_date' => $date,
      'laporan_kode' => $kode,
      'cek_date' => date('d M Y'),
    );
    $this->db->insert('mmo_laporan', $add_laporan);
    $select = $this->db->query("SELECT * FROM mmo_laporan WHERE laporan_kode = '$kode'")->result();
    foreach ($select as $s) {
      $id_laporan = $s->id_laporan;
    }
    $laporan_item = array();
    foreach ($id_order_item as $i => $value) {
      $laporan_item[] = array(
        'id_laporan' => $id_laporan,
        'id_order_item' => $id_order_item[$i],
        'laporan_item' => $order_item[$i],
        'laporan_progres' => $order_target_progres[$i],
      );
    }
    $this->db->insert_batch('mmo_laporan_item', $laporan_item);

    $update = array();
    foreach ($id_order_item as $i => $value) {
        $update[] = array(
          'id_order_item' => $id_order_item[$i],
          'order_progres' => $order_progres[$i]+$order_target_progres[$i],
          'order_target_progres' => $order_target_progres[$i],
        );
    }
      $this->db->update_batch('mmo_order_item',$update,'id_order_item');
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
