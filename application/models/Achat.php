<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achat extends CI_Model{

  public function checkout(){
    $nb = $this->session->userdata('nb');
    $list = $this->session->userdata('list');
    $user = $this->session->userdata('user');
    $total = 0;
    for($i = 0; $i < count($list); $i++){
      $total += $nb[$i] * $list[$i]['Prix'];
      $sql = "INSERT INTO AchatMedicament values (null, ".$user['id'].",".$list[$i]['Id'].",".$nb[$i].",1)";
      $this->db->query($sql);
      $sql = "Update Medicament set stock=".($list[$i]['Stock']-$nb[$i])." where id=".$list[$i]['Id'];
      $this->db->query($sql);
    }
    $sql = "Update Client set argent=".($user['argent']-$total)." where id=".$user['id'];
    $this->db->query($sql);
    $this->session->unset_userdata('nb');
    $this->session->unset_userdata('list');
  }

}
