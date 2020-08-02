<?php
class Item_model extends CI_Model
{
  public function get_item()
  {
    $this->db->select('*');
    $this->db->from('mmo_item');
    $this->db->join('mmo_game', 'mmo_game.id_game = mmo_item.id_game');
    return $this->db->get()->result();
  }
  public function add_item()
  {
    $data  = [
            'id_game' => $this->input->post('game'),
						'item' => $this->input->post('item'),
						'item_desc' => $this->input->post('desc')
		];
    $this->db->insert('mmo_item', $data);
  }
  public function edit_item($id)
  {
    $id = $this->input->post('id');
    $item = $this->input->post('item');
    $game = $this->input->post('game');
    $desc = $this->input->post('desc');
    $this->db->query("UPDATE mmo_item SET item = '$item', item_desc = '$desc' WHERE id_item = '$id'");
  }
  public function delete_item($id)
  {
    $id = $this->input->post('id');
    $delete = $this->db->query("DELETE FROM mmo_item WHERE id_item = '$id'");
    return $delete;
  }
}
?>
