<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends CI_Model{

  public function getAllCategorie(){
    $query = $this->db->query('SELECT * FROM Categorie');
    $rep = $query->result_array();
    return $rep;
  }

}
