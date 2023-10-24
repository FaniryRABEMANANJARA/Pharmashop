<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Administrateur extends CI_Model
{
    public function authentificate($nom, $mdp)
    {
        $queryString = "SELECT * FROM administrateur where nom='%s' and password='%s'";
        $queryString = sprintf($queryString, $nom, $mdp);
        $query = $this->db->query($queryString);
        $array = $query->result_array();
        $array = $query->result_array();
        if(count($array) != 0) {
            $userdata = array(
              'id'  => $array[0]['Id'],
              'nom'  => $array[0]['Nom'],
              'password'  => $array[0]['Password']
            );
            $this->session->set_userdata('administrateur', $userdata);
            return true;
        }
        return false;
    }

    public function logOut()
    {
        $this->session->unset_userdata('administrateur');
    }

    public function changerMedicamentStock($id, $stock)
    {
        $queryStringMed = "Update Medicament set stock=" . $stock . " where id=" . $id;
        $this->db->query($queryStringMed);
    }

    public function insertComposantsMedicament($id, $composants)
    {
        //foreach ($composants as $comp ) {
        $queryStringComp = "Insert into  ComposantMedicament (idMedicament,idComposant) values(" . $id . "," . $composants . ")";
        $this->db->query($queryStringComp);
        //}
    }

    public function insertMedicament($nom, $prix, $stock, $description, $composants, $image, $categorie, $date)
    {
        //Inserer Medicament
        $this->load->model('medicament');
        $queryStringMed = "Insert into Medicament (nom,prix,stock,description,date) values('" . $nom . "'," . $prix . "," . $stock . ",'" . $description . "','" . $date . "')";
        $this->db->query($queryStringMed);
        //Insert all composants
        $medic = $this->medicament->getRecentMedic2();
        $id = $medic['Id'];

        $this->deleteMedicamentComposant($id);
        $this->insertComposantsMedicament($id, $composants);
        //Insert image medicament
        $queryStringImage = "Insert into ImageMedicament (idMedicament,nom) values(" . $id . ",'" . $image . "')";
        $this->db->query($queryStringImage);

        //Insert categorie medicament
        $queryStringCat = "Insert into CategorieMedicament (idMedicament,idcategorie) values(" . $id . ",'" . $categorie . "')";
        $this->db->query($queryStringCat);

    }

    public function updateMedicament($id, $nom, $prix, $stock, $description, $categorie)
    {
        $queryStringMed = "Update Medicament set nom='" . $nom . "',prix=" . $prix . ",stock=" . $stock . ",description='" . $description . "' where id=" . $id;
        $this->db->query($queryStringMed);

        //Update categorie
        $queryStringCat = "Update CategorieMedicament set idcategorie=" . $categorie . " where id=" . $id;
        $this->db->query($queryStringCat);

    }

    public function deleteMedicamentComposant($id)
    {
        $queryStringComp = "delete from ComposantMedicament where idMedicament=" . $id;
        $this->db->query($queryStringComp);
    }

    public function deleteMedicament($id)
    {

        //delete from Categorie where medicament
        $queryStringCat = "delete from CategorieMedicament where idMedicament=" . $id;
        $this->db->query($queryStringCat);

        //delete from Composant where
        $this->deleteMedicamentComposant($id);

        //delete from  medicament
        $queryStringMed = "delete from Medicament where id=" . $id;
        $this->db->query($queryStringMed);


    }



}
