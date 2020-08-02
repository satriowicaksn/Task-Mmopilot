<?php
/**
 *
 */
class Data_laporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
    $this->load->model('data_laporan_model');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('login');
    }
    if ($this->session->userdata('role') == '2') {
      redirect('home');
    }
    if ($this->session->userdata('role') == '3') {
      redirect('home');
    }
  }
  public function index()
  {
    $data['konten'] = 'data_laporan';
    $this->load->view('template', $data);
  }
  public function get_by_date()
  {
    $awal = $this->input->post('awal');
    $akhir = $this->input->post('akhir');
    $data['laporan'] = $this->data_laporan_model->get_by_date($awal, $akhir);
    $data['laporan_detail'] = $this->data_laporan_model->get_detail();
    $data['konten'] = 'get_laporan';
    $this->load->view('template', $data);
  }
  public function get_all()
  {
    $awal = '1';
    $akhir = '2';
    $data['laporan'] = $this->data_laporan_model->get_all($awal, $akhir);
      $data['laporan_detail'] = $this->data_laporan_model->get_detail();
    $data['konten'] = 'get_laporan';
    $this->load->view('template', $data);
  }
  public function edit_laporan()
  {
    $id = $this->input->post('id');
    $data['laporan'] = $this->data_laporan_model->edit_laporan($id);
    $data['laporan_detail'] = $this->data_laporan_model->edit_laporan_detail($id);
    $data['konten'] = 'edit_laporan';
    $this->load->view('template', $data);
  }
  public function update()
  {
    $this->data_laporan_model->update();
    $data['konten'] = 'kosong_laporan';
    $this->load->view('template', $data);
  }
}

 ?>
