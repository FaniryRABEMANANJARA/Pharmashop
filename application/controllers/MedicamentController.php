<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MedicamentController extends CI_Controller
{
    public function index($nbrPage = 1)
    {
        $debut = ($nbrPage - 1) * 9;

        $this->load->helper('url');

        $this->load->model('medicament');
        $this->load->model('categorie');

        $listeCat = $this->categorie->getAllCategorie();
        $listeAllMedic = $this->medicament->allMedic($debut, 9);
        $pageMax = $this->medicament->countMedic() / 9;
        $composants = $this->medicament->getAllComposants();
        $data = array();
        $data['listeCat'] = $listeCat;
        $data['listeAllMedic'] = $listeAllMedic;
        $data['page'] = "model";
        $data['nbrPage'] = $nbrPage;
        $data['pageMax'] = ceil($pageMax);
        $data['url'] = 'index';
        $data['composants'] = $composants;

        $this->load->view('index', $data);
    }

    public function categorie($id, $nbrPage = 1)
    {
        $debut = ($nbrPage - 1) * 9;

        $this->load->helper('url');


        $this->load->model('medicament');
        $this->load->model('categorie');

        $listeCat = $this->categorie->getAllCategorie();
        $listeAllMedic = $this->medicament->getMedicByCategorie($id, $debut, 9);
        $pageMax = $this->medicament->countMedicCategorie($id) / 9;
        $composants = $this->medicament->getAllComposants();

        $data = array();
        $data['listeCat'] = $listeCat;
        $data['listeAllMedic'] = $listeAllMedic;
        $data['page'] = "model";
        $data['nbrPage'] = $nbrPage;
        $data['pageMax'] = ceil($pageMax);
        $data['url'] = 'categorie';
        $data['composants'] = $composants;

        $this->load->view('index', $data);
    }

    public function getOneMedic($id)
    {
        $this->load->helper('url');


        $this->load->model('medicament');
        $this->load->model('categorie');

        $medic = $this->medicament->getOneMedic($id);

        $data = array();
        $data['medic'] = $medic;
        $data['page'] = "model-details";

        $this->load->view('index', $data);
    }

    public function search($nbrPage = 1)
    {
        $this->load->helper('url');

        $this->load->model('medicament');
        $this->load->model('categorie');

        $nom = $this->input->get('query');
        $listeCat = $this->categorie->getAllCategorie();
        $debut = ($nbrPage - 1) * 9;
        $medics = $this->medicament->rechercheSimple($nom, $debut, 9);
        $pageMax = $this->medicament->countMedicRecherche($nom) / 9;
        $composants = $this->medicament->getAllComposants();

        $data = array();
        $data['listeCat'] = $listeCat;
        $data['listeAllMedic'] = $medics;
        $data['page'] = "model";
        $data['nbrPage'] = $nbrPage;
        $data['pageMax'] = ceil($pageMax);
        $data['url'] = 'search';
        $data['query'] = $nom;
        $data['composants'] = $composants;

        $this->load->view('index', $data);
    }

    public function adv_search($nbrPage = 1)
    {
        $this->load->helper('url');
        $this->load->model('medicament');
        $this->load->model('categorie');
        $query;
        $min;
        $max;
        $comps = array();
        foreach ($_GET as $key => $value) {
            switch($key) {
                case "query":
                    $query = $value;
                    break;
                case "min":
                    $min = $value;
                    break;
                case "max":
                    $max = $value;
                    break;
                case "composant":
                    break;
                default:
                    array_push($comps, $value);
            }
        }
        if($min == "") {
            $min = 0;
        }
        if($max == "") {
            $max = 10000000;
        }
        $listeCat = $this->categorie->getAllCategorie();
        $debut = ($nbrPage - 1) * 9;
        $medics = $this->medicament->rechercheAvance($query, $min, $max, $comps, $debut, 9);
        $pageMax = $this->medicament->countMedicRechercheAvance($query, $min, $max, $comps) / 9;
        $composants = $this->medicament->getAllComposants();

        $data = array();
        $data['listeCat'] = $listeCat;
        $data['listeAllMedic'] = $medics;
        $data['page'] = "model";
        $data['nbrPage'] = $nbrPage;
        $data['pageMax'] = ceil($pageMax);
        $data['url'] = 'adv_search';
        $data['composants'] = $composants;
        $data['query'] = $query;
        $data['min'] = $min;
        $data['max'] = $max;
        $data['comps'] = $comps;

        $this->load->view('index', $data);
    }

    public function addToCart($id)
    {
        $this->load->model('medicament');
        $nb = $this->session->userdata('nb');
        $list = $this->session->userdata('list');
        if($nb == "") {
            $nb = array();
        }
        if($list == "") {
            $list = array();
        }
        $medic = $this->medicament->getOneMedic($id);
        $found = false;
        for($i = 0; $i < count($list); $i++) {
            if($list[$i]['Id'] == $medic['Id']) {
                $nb[$i] ++;
                $found = true;
            }
        }
        if(!$found) {
            array_push($list, $medic);
            array_push($nb, 1);
        }
        $this->session->set_userdata('nb', $nb);
        $this->session->set_userdata('list', $list);
        redirect(site_url('/MedicamentController'), 'refresh');
    }

    public function checkout()
    {
        if($this->session->userdata('user') == '') {
            redirect(site_url('/Welcome/connection'), 'refresh');
        } else {
            $this->load->model('achat');
            $this->achat->checkout();
            redirect(site_url('index.php/Welcome/cart'), 'refresh');
        }
    }

    public function listeMedicAdmin()
    {
        $this->load->helper('url');
        $admin = $this->session->userdata('administrateur');

        $this->load->model('medicament');

        $medics = $this->medicament->allMedicNoPage();

        $data = array();
        $data['administrateur'] = $admin;
        $data['medics'] = $medics;
        $data['page'] = "listeMedic";

        $this->load->view('admin/index', $data);
    }
}
