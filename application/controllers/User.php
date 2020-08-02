<?php
class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('user_model');
    $this->load->model('game_model');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('login');
    }
    if ($this->session->userdata('role') == '2') {
      redirect('home');
    }
    if ($this->session->userdata('role') == '3') {
      redirect('home');
    }
    if ($this->session->userdata('role') == '4') {
      redirect('home');
    }
  }
  public function client_data()
  {
    $data['role'] = $this->user_model->get_role();
    $data['client'] = $this->user_model->get_client();
    $data['client_detail'] = $this->user_model->get_client_akun();
    $data['konten'] = 'data_client';
    $this->load->view('template', $data);
  }
  public function tampil_client()
  {
    $data = $this->user_model->get_client();
    echo json_encode($data);
  }
  public function halaman_add_client()
  {
    $data['game'] = $this->game_model->get_game();
    $data['konten'] = 'halaman_add_client';
    $this->load->view('template', $data);
  }
  public function halaman_edit_client()
  {
    $id = $this->input->post('id');
    $data['client'] = $this->user_model->get_client_edit($id);
    $data['detail_client'] = $this->user_model->get_client_detail($id);
    $data['game'] = $this->game_model->get_game();
    $data['konten'] = 'halaman_edit_client';
    $this->load->view('template', $data);
  }
  public function staff_data()
  {
    $data['role'] = $this->user_model->get_role();
    $data['staff'] = $this->user_model->get_staff();
    $data['konten'] = 'data_staff';
    $this->load->view('template', $data);
  }
  public function add_staff()
  {
    $this->user_model->add_user();
    redirect('user/staff_data');
  }
  public function add_client()
  {
    $this->user_model->add_client();
    redirect('user/client_data');
  }
  public function update_staff()
  {
    $this->user_model->update_user();
    redirect('user/staff_data');
  }
  public function update_client()
  {
    $this->user_model->update_client();
    redirect('user/client_data');
  }
  public function hapus_staff()
  {
    $this->user_model->delete_user();
    redirect('user/staff_data');
  }
  public function hapus_client()
  {
    $this->user_model->delete_client();
    redirect('user/client_data');
  }
}

 ?>
