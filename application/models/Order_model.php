<?php
/**
 *
 */
class Order_model extends CI_Model
{
  public function delete_order()
  {
    $id = $this->input->post('id');
    $this->db->query("DELETE FROM mmo_order WHERE id_order = '$id'");
    $this->db->query("DELETE FROM mmo_order_item WHERE id_order = '$id'");
  }
  public function update_status()
  {
    $id = $this->input->post('id');
    $status = $this->input->post('status');
    $this->db->query("UPDATE mmo_order SET order_status = '$status' WHERE id_order = '$id'");
  }
  public function update_order()
  {
    $id_order_item = $this->input->post('id_order_item');
    $priority = $this->input->post('priority');
    $data = array();
    foreach ($id_order_item as $i => $value) {
      $data[] = array(
        'id_order_item' => $id_order_item[$i],
        'order_priority' => $priority[$i],
      );
      $this->db->update_batch('mmo_order_item',$data,'id_order_item');
    }
  }

  public function get_orderA()
  {
    $status = 'aktif';
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client_game = mmo_order.id_user');
    $this->db->join('mmo_temjob', 'mmo_temjob.id_temjob = mmo_order.order');
    $this->db->where('mmo_order.order_status', $status);
    $query = $this->db->get();
    return $query->result();

  }
  public function get_orderB()
  {
    $status = 'selesai';
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_client_game', 'mmo_client_game.id_client_game = mmo_order.id_user');
    $this->db->join('mmo_temjob', 'mmo_temjob.id_temjob = mmo_order.order');
    $this->db->where('mmo_order.order_status', $status);
    $query = $this->db->get();
    return $query->result();

  }
  public function get_order_detailA()
  {
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order = mmo_order.id_order');
    $this->db->join('mmo_priority', 'mmo_priority.id_priority = mmo_order_item.order_priority');
    $query = $this->db->get();
    return $query->result();

  }
  public function get_order_detailB()
  {
    $this->db->select('*');
    $this->db->from('mmo_order');
    $this->db->join('mmo_order_item', 'mmo_order_item.id_order = mmo_order.id_order');
    $this->db->join('mmo_priority', 'mmo_priority.id_priority = mmo_order_item.order_priority');
    $query = $this->db->get();
    return $query->result();

  }
  public function get_order_detail($id)
  {
    $this->db->select('*');
    $this->db->from('mmo_temjob');
    $this->db->join('mmo_job_item', 'mmo_job_item.id_temjob = mmo_temjob.id_temjob');
    $this->db->join('mmo_job_day', 'mmo_job_item.id_job_item = mmo_job_day.id_job_item');
    $this->db->where('mmo_job_item.id_temjob' ,$id);
    $query = $this->db->get();
      foreach ($query->result_array() as $d) {
        $data[] = array(
          'id' => $d['id_job_item'],
          'parent' => $d['id_parent'],
          'item' => $d['job_item'],
          'qty' => $d['job_qty'],
          'time' => $d['job_durasi'],
          'target' => $d['job_target'],
          'priority' => '0',
          'cek_target' => $d['cek_target'],
          'hari' => $d['hari'],
          'tanggal' => $d['tanggal'],
          'jam' => $d['jam'],
          'price' => $d['harga_temjob'],
        );
      }
      return $data;

    }
    public function get_order_item()
    {
      $data = $this->db->query("SELECT * FROM mmo_job_item");
      return $data->result_array();
    }
    public function get_priority()
    {
      $data = $this->db->get('mmo_priority');
      return $data->result();
    }
    public function added_order($client,$temjob,$price)
    {
      $date = time();
      $data = [
        'id_user' => $client,
        'orderDate' => $date,
        'order' => $temjob,
        'order_price' => $price,
      ];
      $this->db->insert('mmo_order', $data);
      $select = $this->db->query("SELECT * FROM mmo_order WHERE orderDate = '$date'")->result();
      foreach ($select as $s) {
        $id = $s->id_order;
      }
      $order_item = $this->input->post('order_item');
      $order_qty = $this->input->post('order_qty');
      $order_durasi = $this->input->post('order_durasi');
      $order_target = $this->input->post('order_target');
      $order_priority = $this->input->post('order_priority');
      $id_ortem = $this->input->post('id_ortem');
      $order_parent = $this->input->post('order_parent');
      $jam = $this->input->post('jam');
      $tanggal = $this->input->post('tanggal');
      $hari = $this->input->post('hari');
      $order_kode = 'MMO'.time();
      $order_date = date('d M Y');
      $cek_hari = date('N');
      $cek_tanggal = date('j');
      $cek_bulan = date('n');
      $item = array();
      foreach ($order_item as $key => $value) {
        // Pengecekan jika dipilih minggu
        if ($order_durasi[$key] == 'week') {
          // jika hari nya minggu
          if ($cek_hari == '7') {
            $a = 7;
            $b = $hari[$key];
            if ($a == $b) {
              $sisa[$key] = 7;
            }
            if ($a > $b) {
              $sisa[$key] = $a-$b;
            }
          }
          // jika harinya senin
          if ($cek_hari == '1') {
            $a = 1;
            $b = $hari[$key];
            if ($a == $b) {
              $sisa[$key] = 7;
            }
            if ($a < $b) {
              $sisa[$key] = $b-$a;
            }
          }
          // Jika harinya selasa
          if ($cek_hari == '2') {
            $a = 2;
            $b = $hari[$key];
            if ($a == $b) {
              $sisa[$key] = 7;
            }
            if ($a > $b) {
              $sisa[$key] = $a-$b+1;
            }
            if ($a < $b) {
              $sisa[$key] = $b-$a;
            }
          }
          // Jika harinya rabu
          if ($cek_hari == '3') {
            $a = 3;
            $b = $hari[$key];
            if ($a == $b) {
              $sisa[$key] = 7;
            }
            if ($a > $b) {
              $sisa[$key] = $a-$b+1;
            }
            if ($a < $b) {
              $sisa[$key] = $b-$a;
            }
          }
          // Jika harinya kamis
          if ($cek_hari == '4') {
            $a = 4;
            $b = $hari[$key];
            if ($a == $b) {
              $sisa[$key] = 7;
            }
            if ($a > $b) {
              $sisa[$key] = $a-$b+1;
            }
            if ($a < $b) {
              $sisa[$key] = $b-$a;
            }
          }
          // Jika harinya jumat
          if ($cek_hari == '5') {
            $a = 5;
            $b = $hari[$key];
            if ($a == $b) {
              $sisa[$key] = 7;
            }
            if ($a > $b) {
              $sisa[$key] = $a-$b+1;
            }
            if ($a < $b) {
              $sisa[$key] = $b-$a;
            }
          }
          // Jika harinya sabtu
          if ($cek_hari == '6') {
            $a = 6;
            $b = $hari[$key];
            if ($a == $b) {
              $sisa[$key] = 7;
            }
            if ($a > $b) {
              $sisa[$key] = $a-$b+1;
            }
            if ($a < $b) {
              $sisa[$key] = $b-$a;
            }
          }
        }


        // Pengecekan di pilih bulan
        if ($order_durasi[$key] == 'month') {
          $a = $tanggal[$key];
          $b = $cek_tanggal;
          $c = $cek_bulan;
          if ($a == $b) {
            $sisa[$key] = 30;
          }
          if ($a > $b) {
            $sisa[$key] = $a-$b;
          }
          if ($a < $b) {
            $sisa[$key] = (31-$b)+$a;
          }
        }
        // pengecekan di pilih Hari
        if ($order_durasi[$key] == 'day') {
          $sisa[$key] = 0;
        }
        $item[] = array(
          'order_item' => $order_item[$key],
          'order_qty' => $order_qty[$key],
          'order_progres' => '0',
          'order_target' => $order_target[$key],
          'order_target_progres' => '0',
          'order_durasi' => $order_durasi[$key],
          'order_date' => date('d M Y'),
          'jam' => $jam[$key],
          'tanggal' => $tanggal[$key],
          'hari' => $hari[$key],
          'sisa' => $sisa[$key],
          'order_priority' => $order_priority[$key],
          'id_ortem' => $id_ortem[$key],
          'order_parent' => $order_parent[$key],
          'id_order' => $id,
        );
      }
      $this->db->insert_batch('mmo_order_item', $item);


    }


    public function tampil_priority()
    {
      return $this->db->query("SELECT * FROM mmo_priority")->result();
    }
  }
 ?>
