<?php
class Pos extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_pos');
	}
	public function index(){
		$this->load->view('v_pos');
	}

	public function get_barang(){
		$kode=$this->input->post('kode');
		$data=$this->m_pos->get_data_barang_bykode($kode);
		echo json_encode($data);
	}
}
