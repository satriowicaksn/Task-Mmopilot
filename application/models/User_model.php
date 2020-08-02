<?php
/**
 *
 */
class User_model extends CI_Model
{
  public function get_role()
  {
    return $this->db->get('mmo_role')->result();
  }
  public function get_client()
  {
    $this->db->select('*');
    $this->db->from('mmo_client');
    return $this->db->get()->result();
  }
  public function get_client_edit($id)
  {
    $this->db->select('*');
    $this->db->from('mmo_client');
    $this->db->where('id_client', $id);
    return $this->db->get()->result();
  }
  public function get_client_akun()
  {
    $this->db->select('*');
    $this->db->from('mmo_client');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client = mmo_client.id_client');
    $this->db->join('mmo_game', 'mmo_client_game.id_game = mmo_game.id_game');
    return $this->db->get()->result();
  }
  public function get_client_detail($id)
  {
    $this->db->select('*');
    $this->db->from('mmo_client');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client = mmo_client.id_client');
    $this->db->join('mmo_game', 'mmo_client_game.id_game = mmo_game.id_game');
    $this->db->where('mmo_client_game.id_client', $id);
    return $this->db->get()->result();
  }
  public function get_staff()
  {
    $role = '3';
    $this->db->select('*');
    $this->db->from('mmo_user');
    $this->db->join('mmo_role', 'mmo_role.id_role = mmo_user.id_role');
    $this->db->where('mmo_user.id_role !=', $role);
    $get = $this->db->get()->result();
    return $get;
  }

  // /fungsi staff
  public function add_user()
  {
    $role = $this->input->post('role');
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $data = array(
      'id_role' => $role,
      'name' => $name,
      'email' => $email,
      'password' => $password,
    );
    $this->db->insert('mmo_user', $data);

  }

  public function update_user()
  {
    $id = $this->input->post('id');
    $role = $this->input->post('role');
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $this->db->query("UPDATE mmo_user SET id_role = '$role', name = '$name', email = '$email', password = '$password' WHERE id_user = '$id'");

  }
  public function delete_user()
  {
    $id = $this->input->post('id');
    $this->db->query("DELETE FROM mmo_user WHERE id_user = '$id'");
  }

  // fungsi user

  public function add_client()
  {
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $alamat = $this->input->post('address');
    $facebook = $this->input->post('facebook');
    $whatsapp = $this->input->post('whatsapp');
    $skype = $this->input->post('skype');
    $discord = $this->input->post('discord');
    $password = $this->input->post('password');
    $idpass = $this->input->post('idpass');
    $id_game = $this->input->post('id_game');
    $kode = time();
    $data = array(
      'nama_client' => $nama,
      'email_client' => $email,
      'username' => $username,
      'password' => $password,
      'address' => $alamat,
      'facebook' => $facebook,
      'whatsapp' => $whatsapp,
      'skype' => $skype,
      'discord' => $discord,
      'client_kode' => $kode,
    );
    $this->db->insert('mmo_client', $data);
    $select = $this->db->query("SELECT * FROM mmo_client WHERE client_kode = '$kode'")->result();
    foreach ($select as $s) {
      $id_client = $s->id_client;
    }
    $akun = array();
    if ($id_game > 0) {
      foreach ($id_game as $i => $value) {
        $akun[] = array(
          'id_client' => $id_client,
          'id_game' => $id_game[$i],
          'username_game' => $idpass[$i],
        );
      }
      $this->db->insert_batch('mmo_client_game', $akun);
    }
  }
  public function update_client()
  {
    $id_client = $this->input->post('id_client');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $alamat = $this->input->post('address');
    $facebook = $this->input->post('facebook');
    $whatsapp = $this->input->post('whatsapp');
    $skype = $this->input->post('skype');
    $discord = $this->input->post('discord');
    $idpass = $this->input->post('idpass');
    $id_game = $this->input->post('id_game');
    $kode = time();
    $this->db->query("UPDATE mmo_client SET nama_client = '$nama', email_client = '$email', username = '$username', password = '$password', address = '$alamat', facebook = '$facebook', whatsapp = '$whatsapp', discord = '$discord', skype = '$skype' WHERE id_client = '$id_client'");
    $this->db->query("DELETE FROM mmo_client_game WHERE id_client = '$id_client'");
    $akun = array();
    foreach ($id_game as $i => $value) {
      $akun[] = array(
        'id_client' => $id_client,
        'id_game' => $id_game[$i],
        'username_game' => $idpass[$i],
      );
    }
    $this->db->insert_batch('mmo_client_game', $akun);
  }
  public function delete_client()
  {
    $id = $this->input->post('id');
    $this->db->query("DELETE FROM mmo_client WHERE id_client = '$id'");
  }
}


 ?>
