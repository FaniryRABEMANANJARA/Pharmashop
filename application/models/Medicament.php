<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicament extends CI_Model{

  public function randomMedic(){
    $query = $this->db->query('SELECT M.*, C.nom as cat, IM.Nom as image FROM Medicament as M JOIN CategorieMedicament as CM ON M.Id=CM.IdMedicament JOIN ImageMedicament as IM ON M.Id=IM.IdMedicament JOIN Categorie as C ON CM.IdCategorie=C.Id ORDER BY RAND() LIMIT 1');
    $row = $query->row_array();
    return $row;
  }

  public function getRecentMedic(){
    $query = $this->db->query('SELECT M.*, IM.Nom as image FROM Medicament as M JOIN ImageMedicament as IM ON M.Id=IM.IdMedicament ORDER BY Id DESC LIMIT 1');
    $row = $query->row_array();
    return $row;
  }

  public function getRecentMedic2(){
    $query = $this->db->query('SELECT * FROM Medicament as M ORDER BY Id DESC LIMIT 1');
    $row = $query->row_array();
    return $row;
  }

  public function getAllComposants(){
    $query = $this->db->query('SELECT * FROM Composant');
    $rep = $query->result_array();
    return $rep;
  }

  public function allMedic($debut, $offset){
    $query = $this->db->query('SELECT M.*, IM.Nom as image FROM Medicament as M JOIN ImageMedicament as IM ON M.Id=IM.IdMedicament LIMIT '.$debut.','.$offset);
    $rep = $query->result_array();
    return $rep;
  }

  public function allMedicNoPage(){
    $query = $this->db->query('SELECT M . * , C.Nom AS cat FROM Medicament AS M JOIN CategorieMedicament AS CM ON M.Id = CM.IdMedicament JOIN Categorie AS C ON CM.IdCategorie = C.Id');
    $rep = $query->result_array();
    return $rep;
  }

  public function countMedic(){
    $query = $this->db->query('SELECT count(*) as nombre FROM Medicament');
    $rep = $query->row_array();
    return $rep['nombre'];
  }

  public function countMedicCategorie($categorie){
    $query = $this->db->query('SELECT count(*) as nombre FROM Medicament as M JOIN CategorieMedicament as CM ON M.Id=CM.IdMedicament WHERE IdCategorie='.$categorie);
    $rep = $query->row_array();
    return $rep['nombre'];
  }

  public function countMedicRecherche($nom){
    $query = $this->db->query("SELECT count(*) as nombre FROM Medicament WHERE Nom LIKE '%".strtolower($nom)."%' OR Nom LIKE '%".ucfirst($nom)."%'");
    $rep = $query->row_array();
    return $rep['nombre'];
  }

  public function countMedicRechercheAvance($query, $min, $max, $comps){
    if(count($comps) != 0)
      $query = $this->db->query("SELECT count(*) as nombre FROM Medicament as M JOIN ComposantMedicament as CM ON M.Id=CM.IdMedicament JOIN Composant as C ON CM.IdComposant=C.Id WHERE (M.nom LIKE '%".strtolower($query)."%' OR M.nom LIKE '%".ucfirst($query)."%') AND M.Prix>".$min." AND M.Prix<".$max." AND CM.IdComposant IN (".implode(',', $comps).") GROUP BY M.id HAVING COUNT(DISTINCT CM.IdComposant) = ".count($comps));
    else
      $query = $this->db->query("SELECT count(*) as nombre FROM Medicament as M JOIN ComposantMedicament as CM ON M.Id=CM.IdMedicament JOIN Composant as C ON CM.IdComposant=C.Id WHERE (M.nom LIKE '%".strtolower($query)."%' OR M.nom LIKE '%".ucfirst($query)."%') AND M.Prix>".$min." AND M.Prix<".$max." GROUP BY M.id");
    $rep = $query->row_array();
    return $rep['nombre'];
  }

  public function getOneMedic($id){
    $query = $this->db->query('SELECT M.*, IM.Nom as image FROM Medicament as M JOIN ImageMedicament as IM ON M.Id=IM.IdMedicament WHERE M.Id='.$id);
    $row = $query->row_array();
    return $row;
  }

  public function getMedicByCategorie($categorie, $debut, $offset){
    $query = $this->db->query('SELECT M.*, IM.Nom as image FROM Medicament as M JOIN ImageMedicament as IM ON M.Id=IM.IdMedicament JOIN CategorieMedicament as CM ON M.Id=CM.IdMedicament WHERE IdCategorie='.$categorie.' LIMIT '.$debut.','.$offset);
    $rep = $query->result_array();
    return $rep;
  }

  public function rechercheSimple($nom, $debut, $offset){
    $sql = "SELECT M.*, IM.nom as image FROM Medicament as M JOIN ImageMedicament as IM ON M.Id=IM.IdMedicament WHERE M.nom LIKE '%".strtolower($nom)."%' OR M.nom LIKE '%".ucfirst($nom)."%' LIMIT ".$debut.", ".$offset;
    $query = $this->db->query($sql);
    $rep = $query->result_array();
    return $rep;
  }

  public function rechercheAvance($query, $min, $max, $comps, $debut, $offset){
    if(count($comps) != 0)
      $sql = "SELECT M.*, IM.nom as image FROM Medicament as M JOIN ImageMedicament as IM ON M.Id=IM.IdMedicament JOIN ComposantMedicament as CM ON M.Id=CM.IdMedicament JOIN Composant as C ON CM.IdComposant=C.Id WHERE (M.nom LIKE '%".strtolower($query)."%' OR M.nom LIKE '%".ucfirst($query)."%') AND M.Prix>".$min." AND M.Prix<".$max." AND CM.IdComposant IN (".implode(',', $comps).") GROUP BY M.id HAVING COUNT(DISTINCT CM.IdComposant) = ".count($comps)." LIMIT ".$debut.", ".$offset;
    else
      $sql = "SELECT M.*, IM.nom as image FROM Medicament as M JOIN ImageMedicament as IM ON M.Id=IM.IdMedicament JOIN ComposantMedicament as CM ON M.Id=CM.IdMedicament JOIN Composant as C ON CM.IdComposant=C.Id WHERE (M.nom LIKE '%".strtolower($query)."%' OR M.nom LIKE '%".ucfirst($query)."%') AND M.Prix>".$min." AND M.Prix<".$max." GROUP BY M.id LIMIT ".$debut.", ".$offset;

    $query = $this->db->query($sql);
    $rep = $query->result_array();
    return $rep;
  }

  public function getMedicamentsFrequents(){
    $sql = "SELECT M.Nom as nom ,sum( `Nombre` ) as nb  FROM `achatmedicament` A JOIN Medicament M on A.IdMedicament=M.Id where `Etat`=1    GROUP BY A.IdMedicament,M.Nom order by nb desc LIMIT 0 , 5";
    $query = $this->db->query($sql);
    $rep = $query->result();
    return $rep;

  }
  public function getMaladiesFrequentes(){
    $sql = "SELECT C.Nom as nom ,sum( `Nombre` ) as nb  FROM `achatmedicament` A JOIN Medicament M on A.IdMedicament=M.Id Join CategorieMedicament on CategorieMedicament.IdMedicament=M.Id Join Categorie C on CategorieMedicament.IdCategorie=C.Id where `Etat`=1    GROUP BY C.Id order by nb desc LIMIT 0 , 5";
    $query = $this->db->query($sql);
    $rep = $query->result();
    return $rep;

  }

}
 ?>
