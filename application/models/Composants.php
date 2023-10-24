<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Composants extends CI_Model{
  public function getComposant(){
    $query = $this->db->query('SELECT * FROM Composant');
    $rep = $query->result_array();
    return $rep;
  }

  public function getComposantByNom($nom){
    $query = $this->db->query("SELECT * FROM Composant WHERE Nom='".$nom."'");
    $rep = $query->row_array();
    return $rep;
  }
}
