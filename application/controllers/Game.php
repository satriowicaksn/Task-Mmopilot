<?php
class Game extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('game_model');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('login');
    }
  }
  public function index()
  {
    $data['game'] = $this->game_model->get_game();
    $data['konten'] = 'game_view';
    $this->load->view('template', $data);
  }
  public function add_game()
  {
    $this->game_model->add_game();
    redirect('game');
  }
  public function edit_game()
  {
    $this->game_model->edit_game();
    redirect('game');
  }
  public function delete_game()
  {
    $this->game_model->delete_game();
    redirect('game');
  }

}

 ?>
