<h3>Gestion des Partenaires</h3>

<?php
$unControleur->setTable ("vuePartenaires");
$lesPartenaires = $unControleur->selectAll();
    $lePartenaire=null;
    if(isset($_GET['action']) && isset($_GET['iduser'])){
        $action=$_GET['action'];
        $iduser=$_GET['iduser'];

        switch($action){
            case 'sup':
                $tab = array("iduser"=>$iduser);
                $unControleur->callProcedure("deletePartenaire",$tab);
            break;
            case 'edit':
                $chaine= "iduser=".$iduser;
                $lePartenaire=$unControleur->selectWhere($chaine);
            break;
        }
    }


    require_once("vues/vue_insert_partenaire.php");
    if (isset($_POST['Valider'])){
        $tab = array("nom"=>$_POST['nom'],
        "email"=>$_POST['email'],
        "mdp"=>$_POST['mdp'],
        "telephone"=>$_POST['telephone'],
        "role"=>$_POST['role'],
        "adresse"=>$_POST['adresse'],
        "sigle"=>$_POST['sigle'],
        "url"=>$_POST['url'],
         "nbSites"=>$_POST['nbSites'],
         "statut"=>$_POST['statut']); 
         $unControleur->callProcedure("insertPartenaire", $tab);

       /*  //je vérifie la présence d'un user avec le meme email 
         if
         // si c'est le cas : erreur 
         {
           echo "L'email existe déjà pour un rôle !";
         }else{
         //sinon on appelle la procédure 
        $unControleur->callProcedure("insertLabel", $tab);
         }*/
    }
    if (isset($_POST['Modifier'])){
        $tab = array(
        "iduser"=>$_POST['iduser'],
        "nom"=>$_POST['nom'],
        "email"=>$_POST['email'],
        "mdp"=>$_POST['mdp'],
        "telephone"=>$_POST['telephone'],
        "role"=>$_POST['role'],
        "adresse"=>$_POST['adresse'],
        "sigle"=>$_POST['sigle'],
        "url"=>$_POST['url'],
        "nbSites"=>$_POST['nbSites'],
        "statut"=>$_POST['statut']); 
        $unControleur->callProcedure("updatePartenaire", $tab);
        header("Location: index.php?page=2");
    }
    if(isset($_POST['Filtrer'])){
        $mot = $_POST['mot'];
        $tab = array(
        "iduser",
        "nom",
        "email",
        "mdp",
        "telephone",
        "role",
        "adresse",
        "sigle",
        "url",
         "nbSites",
         "statut"); 
        $unControleur->setTable ("vuePartenaires");
        $lesPartenaires= $unControleur->selectSearch($mot, $tab);
    }
        else{
        $unControleur->setTable ("vuePartenaires");
        $lesPartenaires = $unControleur->selectAll();
       
        }
    require_once("vues/vue_les_partenaires.php");
?>

