<?php

/**
 *
 */
class Laporan_shift_model extends CI_Model
{
  public function get_laporan()
  {
    $this->db->select('*');
    $this->db->from('mmo_laporan_shift');
    $this->db->join('mmo_client', 'mmo_client.id_client = mmo_laporan_shift.id_client');
    $this->db->join('mmo_user', 'mmo_user.id_user = mmo_laporan_shift.id_user');
    return $this->db->get()->result();
  }
  public function get_operator()
  {
    $id = '2';
    $belum = 'belum';
    $this->db->select('*');
    $this->db->from('mmo_user');
    $this->db->where('id_role', $id);
    $this->db->where('operator_status', $belum);
    return $this->db->get()->result();
  }
}

 ?>
