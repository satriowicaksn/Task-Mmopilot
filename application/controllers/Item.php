<?php
class Item extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('item_model');
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
  }
  public function index()
  {
    $data['konten'] = 'item_view';
    $data['game'] = $this->game_model->get_game();
    $data['item'] = $this->item_model->get_item();
    $this->load->view('template', $data);
  }
  public function add_item()
  {
    $data = $this->item_model->add_item();
    redirect('item');
  }
  public function edit_item()
  {
    $this->item_model->edit_item();
    redirect('item');
  }
  public function delete_item()
  {
    $this->item_model->delete_item();
    redirect('item');
  }
}
?>
