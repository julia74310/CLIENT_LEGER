<?php
require_once('modele/modele.class.php');

class Controleur{
    private $unModele; // instance de la classe modele

    public function __construct($serveur, $bdd, $user, $mdp){
        //Instanciation du modele
        $this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
    }
    public function setTable($uneTable){
        $this->unModele->setTable($uneTable);
     }

    /*********************************Les Classes  *********************************/
    public function modifierAdmin($tab){
        $this->unModele->modifierAdmin($tab);
    }
    public function selectAll($liste="*"){
        $resultats = $this->unModele->selectAll($liste);
        return $resultats;
    }
    public function selectWhere($where){
        $resultats = $this->unModele->selectWhere($where);
        return $resultats;
    }
    public function selectSearch($mot, $liste){
        $resultats= $this->unModele->selectSearch($mot, $liste);
        return $resultats;
    }
    public function insert($tab){
        $this->unModele->insert($tab);
    }
    public function update($tab, $where){
        $this->unModele->update($tab, $where);
    }
    public function delete($where){
        $this->unModele->delete($where);
    }
    public function callProcedure($nom, $tab){
        $this->unModele->callProcedure($nom, $tab);
    }
    
    public function selectUser($email, $mdp){
		return $this->unModele->selectUser($email, $mdp);
	}
}

?>