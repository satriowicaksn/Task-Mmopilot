<?php
/**
 *
 */
class Login extends CI_Controller
{

  public function __construct()
  {
    date_default_timezone_set('Asia/Jakarta');
    parent::__construct();
    $this->load->model('login_model');
  }
  public function index()
  {
    if ($this->session->userdata('masuk') == TRUE) {
      redirect('home');
    }
    $this->load->view('login_view');
  }
  public function cek_login()
  {
    $username = $this->input->post('email');
    $password = $this->input->post('password');
    $cek_staff = $this->login_model->cek_staff();
  }
  public function salah()
  {
    $this->load->view('salah');
  }
  public function logout()
  {
    session_destroy();
    redirect('login');
  }

}

 ?>
