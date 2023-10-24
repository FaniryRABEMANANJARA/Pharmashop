<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends CI_Model{

  public function getAllCategorie(){
    $query = $this->db->query('SELECT * FROM Categorie');
    $rep = $query->result_array();
    return $rep;
  }

  public function getCategorieByNom($nom){
    $query = $this->db->query("SELECT * FROM Categorie WHERE Nom='".$nom."'");
    $rep = $query->row_array();
    return $rep;
  }

}
