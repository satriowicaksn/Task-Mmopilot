<?php
Class Treeview_m extends CI_Model {
  public function __construct(){
    parent::__construct();
  }
  public function kotaGetAll()
  {
      $query="SELECT * FROM kota";
      return $this->db->query($query)->result_array();
  }
  public function get_template_parent($id)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_temjob = '$id' && id_parent = '0'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub2($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub3($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub4($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub5($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub6($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub7($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub8($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub9($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_sub10($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }
  public function get_subx($ids)
  {
    $query="SELECT * FROM mmo_job_item WHERE id_parent = '$ids'";
    return $this->db->query($query)->result_array();
  }



}
