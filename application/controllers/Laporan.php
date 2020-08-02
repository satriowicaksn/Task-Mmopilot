<?php
/**
 *
 */
class Laporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('laporan_model');
    $this->load->model('user_model');
    if ($this->session->userdata('role') == '2') {
      redirect('home');
    }
  }
  public function index()
  {
    $data['staff'] = $this->laporan_model->get_staff();
    $data['konten'] = 'laporan_view';
    $data['order'] = $this->laporan_model->get_order();
    $data['client'] = $this->user_model->get_client_akun();
    $this->load->view('template',$data);
  }
  public function get_item()
  {
    $order = $this->input->post('order');
    $data = $this->laporan_model->get_item($order);
    echo json_encode($data);
  }
  public function add_laporan()
  {
    $this->laporan_model->add_laporan();
    redirect('laporan');
  }
  public function get_dropdown()
  {
    $client = $this->input->post('client');
    $data = $this->laporan_model->get_dropdown($client);
    echo json_encode($data);
  }
}

 ?>
