<h3>Gestion des labels</h3>

<?php
$unControleur->setTable ("vueLabels");
$lesLabels = $unControleur->selectAll();
    $leLabel=null;
    if(isset($_GET['action']) && isset($_GET['iduser'])){
        $action=$_GET['action'];
        $iduser=$_GET['iduser'];

        switch($action){
            case 'sup':
                $tab = array("iduser"=>$iduser);
                $unControleur->callProcedure("deleteLabel",$tab);
            break;
            case 'edit':
                $chaine= "iduser=".$iduser;
                $leLabel=$unControleur->selectWhere($chaine);
            break;
        }
    }


    require_once("vues/vue_insert_label.php");
    if (isset($_POST['Valider'])){
        $tab = array("nom"=>$_POST['nom'],
        "email"=>$_POST['email'],
        "mdp"=>$_POST['mdp'],
        "telephone"=>$_POST['telephone'],
        "role"=>$_POST['role'],
        "adresse"=>$_POST['adresse'],
         "nbEmployes"=>$_POST['nbEmployes']); 
         $unControleur->callProcedure("insertLabel", $tab);

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
         "nbEmployes"=>$_POST['nbEmployes']); 
        $unControleur->callProcedure("updateLabel", $tab);
        header("Location: index.php?page=1");
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
         "nbEmployes"); 
        $unControleur->setTable ("vueLabels");
        $lesLabels= $unControleur->selectSearch($mot, $tab);
    }
        else{
        $unControleur->setTable ("vueLabels");
        $lesLabels = $unControleur->selectAll();
       
        }
    require_once("vues/vue_les_labels.php");
?>

