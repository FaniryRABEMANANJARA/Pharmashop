<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministrateurController extends CI_Controller {
  public function index(){
      $this->load->helper('url');
      $this->load->view('admin/connexion');
  }

  public function index2(){
    $this->load->helper('url');
    $admin = $this->session->userdata('administrateur');
    if(!isset($admin)){
        redirect('/AdministrateurController/index', 'refresh');
    }
    $page="acceuil";
    $data = array();
    $data['administrateur']=$admin;
    $data['page']=$page;
    $this->load->view('admin/index', $data);
  }

  public function logOut(){
    $this->load->helper('url');
      $this->session->sess_destroy();
      redirect('/AdministrateurController/index', 'refresh');
  }

  public function connection(){
    $admin = $this->session->userdata('administrateur');
    if(isset($admin)){
      redirect('/AdministrateurController/index', 'refresh');
    }
    if(isset($admin)){
			$this->load->helper('url');
         redirect('/AdministrateurController/index', 'refresh');
		}
		else
			$this->load->view('admin/connexion');
  }

  public function connect(){
    $username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('administrateur');
		if($this->administrateur->authentificate($username, $password)){
			$this->load->helper('url');
         redirect('/AdministrateurController/index2', 'refresh');
		}
		else
		$this->load->view('admin/connexion');
  }

  public function dashboard(){
    $this->load->helper('url');
    $admin = $this->session->userdata('administrateur');
    if(!isset($admin)){
        redirect('/AdministrateurController/index', 'refresh');
    }
    $page="dashboard";
    $data = array();
    $data['administrateur']=$admin;
    $data['page']=$page;
    $this->load->view('admin/index', $data);

  }
  public function dashMedicaments(){
    	$this->load->model('medicament');
      $data=$this->medicament->getMedicamentsFrequents();
      $responce->cols[] = array(
           "id" => "",
           "label" => "Topping",
           "pattern" => "",
           "type" => "string"
       );
       $responce->cols[] = array(
           "id" => "",
           "label" => "Total",
           "pattern" => "",
           "type" => "number"
       );
       foreach($data as $cd)
           {
           $responce->rows[]["c"] = array(
               array(
                   "v" => "$cd->nom",
                   "f" => null
               ) ,
               array(
                   "v" => (int)$cd->nb,
                   "f" => null
               )
           );
           }

       echo json_encode($responce);



  }
  public function dashMaladies(){
    $this->load->model('medicament');
    $data=$this->medicament->getMaladiesFrequentes();
    $responce->cols[] = array(
         "id" => "",
         "label" => "Topping",
         "pattern" => "",
         "type" => "string"
     );
     $responce->cols[] = array(
         "id" => "",
         "label" => "Total",
         "pattern" => "",
         "type" => "number"
     );
     foreach($data as $cd)
         {
         $responce->rows[]["c"] = array(
             array(
                 "v" => "$cd->nom",
                 "f" => null
             ) ,
             array(
                 "v" => (int)$cd->nb,
                 "f" => null
             )
         );
         }

     echo json_encode($responce);
  }
  public function clients($nbrPage=1){
      $admin = $this->session->userdata('administrateur');
    $debut = ($nbrPage-1)*4;

    $this->load->helper('url');
    if(!isset($admin)){
        redirect('/AdministrateurController/index', 'refresh');
    }

    $this->load->model('client');


    $listeClient = $this->client->allClients($debut, 4);
    $pageMax=  $this->client->countClients()/4;
    $data = array();

    $data['listeClient']=$listeClient;
    $data['page']="listeclient";
    $data['administrateur']=$admin;
    $data['nbrPage']=$nbrPage;
    $data['pageMax']=ceil($pageMax);


    $this->load->view('admin/index', $data);
  }
  public function supprimerClient($id,$nbrPage=1){
    $this->load->model('client');
      $listeClient = $this->client->deleteClient($id);
           redirect('/AdministrateurController/clients/'.$nbrPage, 'refresh');

  }
  public function formulaireClient($type='',$id=''){

    $admin = $this->session->userdata('administrateur');

    $data=array();
    $data['administrateur']=$admin;
    $this->load->helper('url');
    if(!isset($admin)){
        redirect('/AdministrateurController/index', 'refresh');
    }
    $this->load->model("client");
    $data['page']="formClient";

    if($type=="modification"){

        $data['client']=$this->client->getClientById($id);
    }
    $data['type']=$type;
    $data['id']=$id;
      $this->load->view('admin/index', $data);
  }
  public function ajoutClient(){
    $nom = $this->input->post('nom');
    $password = $this->input->post('password');
    $prenom = $this->input->post('prenom');
    $email = $this->input->post('email');
    $argent=$this->input->post('argent');
    $this->load->model('client');
    $this->client->addClient($nom,$prenom,$email,$argent,$password);
     redirect('/AdministrateurController/clients/', 'refresh');
  }
  public function modificationClient(){
    $nom = $this->input->post('nom');
    $password = $this->input->post('password');
    $prenom = $this->input->post('prenom');
    $email = $this->input->post('email');
    $argent=$this->input->post('argent');
    $id=$this->input->post('id');
    $this->load->model('client');
    $this->client->updateClient($id,$nom,$prenom,$email,$argent,$password);
     redirect('/AdministrateurController/clients/', 'refresh');
  }
}
