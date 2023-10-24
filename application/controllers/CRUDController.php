<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CRUDController extends CI_Controller
{
    public function pageAjout()
    {
        $admin = $this->session->userdata('administrateur');
        $this->load->helper('url');
        if(!isset($admin)) {
            redirect('index.php/AdministrateurController/index', 'refresh');
        }
        $this->load->model('categorie');
        $this->load->model('composants');
        $listeCat = $this->categorie->getAllCategorie();
        $listeComposant = $this->composants->getComposant();
        $page = "ajout";
        $data = array();
        $data['listeCat'] = $listeCat;
        $data['administrateur'] = $admin;
        $data['listeComposant'] = $listeComposant;
        $data['page'] = $page;
        $this->load->view('admin/index', $data);
    }

    public function pageModif($id)
    {
        $admin = $this->session->userdata('administrateur');
        $this->load->helper('url');
        if(!isset($admin)) {
            redirect('/AdministrateurController/index', 'refresh');
        }
        $this->load->model('categorie');
        $this->load->model('medicament');
        $this->load->model('composants');
        $listeCat = $this->categorie->getAllCategorie();
        $listeComposant = $this->composants->getComposant();
        $medic = $this->medicament->getOneMedic($id);
        $page = "modifier";
        $data = array();
        $data['listeCat'] = $listeCat;
        $data['administrateur'] = $admin;
        $data['listeComposant'] = $listeComposant;
        $data['page'] = $page;
        $data['medic'] = $medic;
        $this->load->view('admin/index', $data);
    }

    public function ajouter()
    {
        $this->load->helper('url');
        $this->load->model('categorie');
        $this->load->model('composants');
        $this->load->model('administrateur');

        $nom = $this->input->post('nom');
        $date = $this->input->post('date');
        $prix = $this->input->post('prix');
        $stock = $this->input->post('stock');
        $description = $this->input->post('description');
        $categorie = $this->input->post('categorie');
        $composant = $this->input->post('composant');

        $cat = $this->categorie->getCategorieByNom($categorie);
        $idCat = $cat['Id'];

        $comp = $this->composants->getComposantByNom($composant);
        $idComp = $comp['Id'];

        $this->administrateur->insertMedicament($nom, $prix, $stock, $description, $idComp, 1, $idCat, $date);

        redirect('/MedicamentController/listeMedicAdmin', 'refresh');
    }

    public function modifier($id)
    {
        $this->load->helper('url');
        $this->load->model('categorie');
        $this->load->model('administrateur');

        $nom = $this->input->post('nom');
        $prix = $this->input->post('prix');
        $stock = $this->input->post('stock');
        $description = $this->input->post('description');
        $categorie = $this->input->post('categorie');

        $cat = $this->categorie->getCategorieByNom($categorie);
        $idCat = $cat['Id'];

        $this->administrateur->updateMedicament($id, $nom, $prix, $stock, $description, $idCat);

        redirect('/MedicamentController/listeMedicAdmin', 'refresh');
    }

    public function supprimer($id)
    {
        $this->load->helper('url');
        $this->load->model('administrateur');

        $this->administrateur->deleteMedicament($id);

        redirect('/MedicamentController/listeMedicAdmin', 'refresh');
    }
}
