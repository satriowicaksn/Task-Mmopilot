<?php
/**
 *
 */
class Order extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('order_model');
    $this->load->model('job_model');
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
    $data['order'] = $this->order_model->get_orderA();
    $data['order_detail'] = $this->order_model->get_order_detailA();
    $data['template'] = $this->job_model->get_job();
    $data['priority'] = $this->order_model->get_priority();
    $data['user'] = $this->user_model->get_client_akun();
    $data['konten'] = 'order_view';
    $this->load->view('template', $data);
  }
  public function history()
  {
    $data['order'] = $this->order_model->get_orderB();
    $data['order_detail'] = $this->order_model->get_order_detailA();
    $data['template'] = $this->job_model->get_job();
    $data['priority'] = $this->order_model->get_priority();
    $data['user'] = $this->user_model->get_client();
    $data['konten'] = 'order_histori';
    $this->load->view('template', $data);
  }
  public function update_order()
  {
    $this->order_model->update_order();
    $data['konten'] = 'kosong_order';
    $this->load->view('template', $data);
  }
  public function delete_order()
  {
    $this->order_model->delete_order();
    $data['konten'] = 'hapus_order';
    $this->load->view('template', $data);
  }
  public function update_status()
  {
    $this->order_model->update_status();
    $data['konten'] = 'kosong_order';
    $this->load->view('template', $data);
  }

  public function halaman_add()
  {
    $data['konten'] = 'add_order';
    $data['order'] = $this->order_model->get_orderA();
    $data['template'] = $this->job_model->get_job();
    $data['user'] = $this->user_model->get_client_akun();;
    $data['priority'] = $this->order_model->get_priority();
    $data['item'] = $this->order_model->get_order_item();
    $this->load->view('template', $data);
   }
  public function get_order_detail($id)
  {
    $data = $this->order_model->get_order_detail($id);
    echo json_encode($data);
}
public function add_order()
{
  $client = $this->input->post('client');
  $temjob = $this->input->post('template');
  $price = $this->input->post('price');
  $data = $this->order_model->added_order($client,$temjob,$price);
  redirect('order');
}
public function tampil_priority()
{
  $data = $this->order_model->tampil_priority();
  echo json_encode($data);
}
}


 ?>
