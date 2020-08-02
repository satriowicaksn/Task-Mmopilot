<?php
/**
 *
 */
class Job extends CI_Controller
{

  public function __construct()
  {
    date_default_timezone_set('Asia/Jakarta');
    parent::__construct();
    $this->load->model('job_model');
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
    $data['konten'] = 'job_view';
    $data['job'] = $this->job_model->get_job();
    $data['game'] = $this->game_model->get_game();
    $data['item'] = $this->item_model->get_item();
    $this->load->view('template', $data);
  }
  public function delete_temjob()
  {
    $id = $this->input->post('id');
    $this->db->query("DELETE FROM mmo_temjob WHERE id_temjob = '$id'");
    redirect('job');
  }
    public function edit_temjob()
  {
    $id = $this->input->post('id');
    $temjob = $this->input->post('name');
    $game = $this->input->post('game');
    $price = $this->input->post('price');
    $this->db->query("UPDATE mmo_temjob SET nama_temjob = '$temjob', harga_temjob = '$price', id_game = '$game' WHERE id_temjob = '$id'");
    redirect('job');
  }
  public function halaman_add()
  {
    $data['game'] = $this->game_model->get_game();
    $data['konten'] = 'halaman_add_template';
    $this->load->view('template', $data);
  }
  public function buat_template()
  {
    $this->job_model->buat_template();
    redirect('job');
  }
  public function kelola_item()
  {
    $data['konten'] = 'kelola_item';
    $this->load->view('template', $data);
  }


  public function details()
  {
    $id = $this->input->post('id');
    $this->job_model->add_job($id);
    $data['template'] = $this->input->post('id');
    $data['konten'] = 'kosong_tambah';
    $this->load->view('template', $data);
  }
  public function details_sub()
  {
    $id = $this->input->post('id');
    $this->job_model->add_subjob($id);
    $data['template'] = $this->input->post('id');
    $data['konten'] = 'kosong_tambah';
    $this->load->view('template', $data);
  }
  public function hapus_item()
  {
    $data['id'] = $this->input->post('id');
    $item = $this->input->post('item');
    $this->db->query("DELETE FROM mmo_job_item WHERE id_job_item = '$item'");
    $this->db->query("DELETE FROM mmo_job_item WHERE id_parent = '$item'");
    $this->db->query("DELETE FROM mmo_job_day WHERE id_job_item = '$item'");
    $data['konten'] = 'kosong_hapus';
    $this->load->view('template', $data);
  }
  public function detail()
  {
    $id = $this->input->post('id');
    $data['konten'] = 'detail';
    $data['item'] = $this->item_model->get_item();
    $data['tem'] = $this->job_model->get_template_detail($id);
    $data['parent'] = $this->db->query("SELECT * FROM mmo_job_item WHERE id_temjob = '$id'")->result();
    $this->load->model('treeview_m');
    $this->load->view('template', $data);
  }
  public function get_detail_edit()
  {
    $id = $this->input->post('id');
    $data = $this->job_model->get_detail_edit($id);
    echo json_encode($data);
  }
  public function edit_item()
  {
    $id = $this->input->post('id');
    $this->job_model->edit_item($id);
    $data['template'] = $this->input->post('id');
    $data['konten'] = 'kosong_tambah';
    $this->load->view('template', $data);
  }
}

 ?>
