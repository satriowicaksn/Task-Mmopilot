<?php
/**
 *
 */
class Login_model extends CI_Model
{
  public function cek_staff()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $role_admin = '1';
    $role_operator = '2';
    $role_client = '3';
    $role_manager = '4';
    $cek_admin = $this->db->where('email', $email)->where('password', $password)->where('id_role', $role_admin)->get('mmo_user');
    $cek_operator = $this->db->where('email', $email)->where('password', $password)->where('id_role', $role_operator)->get('mmo_user');
    $cek_manager = $this->db->where('email', $email)->where('password', $password)->where('id_role', $role_manager)->get('mmo_user');
    $cek_client = $this->db->where('username', $email)->where('password', $password)->get('mmo_client');
    if ($cek_admin->num_rows() > 0) {
      foreach ($cek_admin->result() as $c) {
        $session = array(
          'masuk' => TRUE,
          'jabatan' => 'Admin',
          'role' => '1',
          'email' => $c->email,
          'name' => $c->name,
          'id' => $c->id_user,
        );
      }
      $this->session->set_userdata($session);
      redirect('home');
    }
    if ($cek_manager->num_rows() > 0) {
      foreach ($cek_manager->result() as $c) {
        $session = array(
          'masuk' => TRUE,
          'jabatan' => 'Manager',
          'role' => '4',
          'email' => $c->email,
          'name' => $c->name,
          'id' => $c->id_user,
        );
      }
      $this->session->set_userdata($session);
      redirect('home');
    }
    if ($cek_operator->num_rows() > 0) {
      foreach ($cek_operator->result() as $c) {
        $session = array(
          'masuk' => TRUE,
          'jabatan' => 'Operator',
          'role' => '2',
          'email' => $c->email,
          'name' => $c->name,
          'id' => $c->id_user,
        );
      }
      $this->session->set_userdata($session);
      redirect('home');
    }
    if ($cek_client->num_rows() > 0) {
      foreach ($cek_client->result() as $c) {
        $session = array(
          'masuk' => TRUE,
          'jabatan' => 'Client',
          'role' => '3',
          'email' => $c->email_client,
          'name' => $c->nama_client,
          'id' => $c->id_client,
        );
      }
      $this->session->set_userdata($session);
      redirect('home');
    }
    else {
      redirect('login/salah');
    }

  }





}

 ?>
