<?php
class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('home_model');
    $this->load->model('user_model');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('login');
    }
  }
  public function coba()
  {
    $data['konten'] = 'coba';
    $this->load->view('template2', $data);
  }
  public function index()
  {
    $data['client'] = $this->user_model->get_client_akun();
    $data['client2'] = $this->home_model->get_client_akun();
    $data['order'] = $this->home_model->get_order();
    $data['priority'] = $this->home_model->get_priority();
    $data['total_aktif'] = $this->home_model->get_total_aktif();
    $data['total_selesai'] = $this->home_model->get_total_selesai();
    $data['total_template'] = $this->home_model->get_total_template();
    $data['row_order'] = $this->home_model->get_row_order_semua();
    if ($this->session->userdata('role') == '2') {

      $data['cek_shift'] = $this->home_model->cek_shift();
        $data['cek_shift_login'] = $this->home_model->cek_shift_login();
      $data['konten'] = 'dashboard_operator';
      $data['detail_shift'] = $this->home_model->get_detail_shift();
      $data['detail_client'] = $this->home_model->get_detail_client();

    }
    if ($this->session->userdata('role') == '4') {
      $data['konten'] = 'dashboard';
    }
    if ($this->session->userdata('role') == '1') {
      $data['konten'] = 'dashboard';
    }
    if ($this->session->userdata('role') == '3') {
      $data['konten'] = 'dashboard';
    }
    $this->load->view('template', $data);
  }
  public function search()
  {
    $data['client'] = $this->user_model->get_client_akun();
    $id = $this->input->post('client');
    $order = $this->input->post('order');
    $data['order'] = $this->home_model->get_order_search($id, $order);
    $data['row_order'] = $this->home_model->get_row_order($id, $order);
    $data['konten'] = 'dashboard_search';
    $this->load->view('template', $data);
  }
  public function get_dropdown()
  {
    $client = $this->input->post('client');
    $data = $this->home_model->get_dropdown($client);
    echo json_encode($data);
  }
  public function edit_priority()
  {
    $this->home_model->edit_priority();
    redirect('home');
  }
  public function login_shift()
  {
    $this->home_model->login_shift();
    redirect('home');
  }
  public function login_client_akun()
  {
    $this->home_model->login_client_akun();
    redirect('home');
  }
  public function logout_client_akun()
  {
    $this->home_model->logout_client_akun();
    redirect('home');
  }
  public function logout_aja()
  {
    $this->home_model->logout_aja();
    redirect('home');
  }
}

 ?>
