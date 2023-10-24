<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Model{
  public function authentificate($email, $password){
    $queryString = "SELECT * FROM client WHERE Email = '%s' AND Password = '%s'";
    $queryString = sprintf($queryString, $email, $password);
		$query = $this->db->query($queryString);
    $array = $query->result_array();
    if(count($array) != 0){
      echo $array[0];
      $userdata = array(
        'id'  => $array[0]['Id'],
        'nom'  => $array[0]['Nom'],
        'prenom'  => $array[0]['Prenom'],
        'email'  => $array[0]['Email'],
        'argent'  => $array[0]['Argent'],
        'password'  => $array[0]['Password']
      );
      $this->session->set_userdata('user', $userdata);
      return true;
    }
    return false;
  }

  public function signup($nom, $prenom, $email, $password){
    $queryString = "SELECT * FROM client WHERE email = '%s'";
    $queryString = sprintf($queryString, $email);
		$query = $this->db->query($queryString);
    $array = $query->result_array();
    if(count($array) != 0)
      return false;
    else{
      $queryString = "INSERT INTO client VALUES(null, '%s', '%s', '%s', 5000, '%s')";
      $queryString = sprintf($queryString, $nom, $prenom, $email, $password);
  		$query = $this->db->query($queryString);
      $this->authentificate($email, $password);
      return true;
    }
  }

  public function allClients($debut,$offset){
    $query = $this->db->query('SELECT*from client LIMIT '.$debut.','.$offset);
    $rep = $query->result_array();
    return $rep;
  }

  public function countClients(){
    $query = $this->db->query('SELECT count(*) as nombre FROM Client order by Id Desc');
    $rep = $query->row_array();
    return $rep['nombre'];
  }

  public function deleteClient($id){
    $queryString="Delete from Client where Id=".$id;
    $this->db->query($queryString);
  }

  public function addClient($nom,$prenom,$email,$argent,$password){
    $queryString="INSERT INTO client( Nom, Prenom, Email, Argent, Password) VALUES ('".$nom."','".$prenom."','".$email."',".$argent.",'".$password."')";
    $this->db->query($queryString);
  }

  public function getClientById($id){
    $queryString="SELECT*from Client where Id=".$id;
    $query = $this->db->query($queryString);
    $row = $query->row_array();
    return $row;
  }
  
  public function updateClient($id,$nom,$prenom,$email,$argent,$password){
    $queryString="Update client set Nom='".$nom."',Prenom='".$prenom."',Email='".$email."',Argent=".$argent.",Password='".$password."' where Id=".$id;
    $this->db->query($queryString);
  }
}