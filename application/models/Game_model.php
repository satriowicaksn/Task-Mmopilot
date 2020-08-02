<?php
class Game_model extends CI_Model
{
  public function get_game()
  {
    return $this->db->get('mmo_game')->result();
  }
  public function add_game()
  {
    $game = $this->input->post('game');
    $data = array(
      'nama_game' => $game,
    );
    $this->db->insert('mmo_game', $data);
  }
  public function edit_game()
  {
    $id = $this->input->post('id');
    $game = $this->input->post('game');
    $this->db->query("UPDATE mmo_game SET nama_game = '$game' WHERE id_game = '$id'");
  }
  public function delete_game()
  {
    $id = $this->input->post('id');
    $this->db->query("DELETE FROM mmo_game WHERE id_game = '$id'");
  }
}

 ?>
