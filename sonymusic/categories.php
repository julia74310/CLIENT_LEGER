<h3>Gestion des Catégories</h3>

<?php
$unControleur->setTable ("categorie");
$lesCategories = $unControleur->selectAll();
    $laCategorie=null;
    if(isset($_GET['action']) && isset($_GET['idcategorie'])){
        $action=$_GET['action'];
        $idcategorie=$_GET['idcategorie'];

        switch($action){
            case 'sup':
                $chaine = "idcategorie=".$idcategorie;
                $unControleur->delete($chaine);
            break;
            case 'edit':
                $chaine= "idcategorie=".$idcategorie;
                var_dump($chaine);
                $laCategorie=$unControleur->selectWhere($chaine);
            break;
        }
    }


    require_once("vues/vue_insert_categorie.php");
    if (isset($_POST['Valider'])){
        $tab = array("type"=>$_POST['type']); 
         $unControleur->insert($tab);

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
        $idcategorie=$_POST['idcategorie'];
        $tab = array(
        "type"=>$_POST['type']); 
        $chaine= "idcategorie=".$idcategorie;
        $unControleur->update($tab, $chaine);
        header("Location: index.php?page=8");
    }
    if(isset($_POST['Filtrer'])){
        $mot = $_POST['mot'];
        $tab = array(
        "idcategorie",
        "type"); 
        $unControleur->setTable("categorie");
        $lesCategories= $unControleur->selectSearch($mot, $tab);
    }
        else{
        $unControleur->setTable ("categorie");
        $lesCategories = $unControleur->selectAll();
       
        }
        
    require_once("vues/vue_les_categories.php");
?>

