<?php
/**
 *
 */
class Laporan_shift extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('laporan_shift_model');
    $this->load->model('user_model');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('login');
    }
    if ($this->session->userdata('role') == '2') {
      redirect('home');
    }
  }

  public function index()
  {
    $data['operator'] = $this->laporan_shift_model->get_operator();
    $data['laporan'] = $this->laporan_shift_model->get_laporan();
    $data['konten'] = 'laporan_shift';
    $this->load->view('template', $data);
  }

}

 ?>
