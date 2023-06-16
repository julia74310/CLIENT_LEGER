<h3>Gestion des Chansons</h3>

<?php
$unControleur->setTable ("chanson");
$lesChansons = $unControleur->selectAll();
    $laChanson=null;
    if(isset($_GET['action']) && isset($_GET['idchanson'])){
        $action=$_GET['action'];
        $idchanson=$_GET['idchanson'];

        switch($action){
            case 'sup':
                $chaine = "idchanson=".$idchanson;
                $unControleur->delete($chaine);

                //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
                echo "<script>document.location.href='index.php?page=10';</script>";
            break;
            case 'edit':
                $chaine= "idchanson=".$idchanson;
                $laChanson=$unControleur->selectWhere($chaine);
            break;
        }
    }

    $unControleur->setTable ("categorie");
    $lesCategories=$unControleur->selectAll();
    $unControleur->setTable ("album");
    $lesAlbums=$unControleur->selectAll();

    require_once("vues/vue_insert_chanson.php");
    if (isset($_POST['Valider'])){
        $unControleur->setTable ("chanson");
        $tab = array(
            "titre"=>$_POST['titre'],
            "sortie"=>$_POST['sortie'],
            "duree"=>$_POST['duree'],
            "idcategorie"=>$_POST['idcategorie'],
            "idalbum"=>$_POST['idalbum']
    
        ); 
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
        $unControleur->setTable ("chanson");
        $idchanson=$_POST['idchanson'];
        $tab = array(
            "titre"=>$_POST['titre'],
            "sortie"=>$_POST['sortie'],
            "duree"=>$_POST['duree'],
            "idcategorie"=>$_POST['idcategorie'],
            "idalbum"=>$_POST['idalbum']
        ); 
        $chaine= "idchanson=".$idchanson;
        $unControleur->update($tab, $chaine);
       
        //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
        echo "<script>document.location.href='index.php?page=10';</script>";
    }
    if(isset($_POST['Filtrer'])){
        $unControleur->setTable ("chanson");
        $mot = $_POST['mot'];
        $tab = array(
            "titre"=>$_POST['titre'],
            "sortie"=>$_POST['sortie'],
            "duree"=>$_POST['duree'],
            "idcategorie"=>$_POST['idcategorie'],
            "idalbum"=>$_POST['idalbum']
        ); 
        $unControleur->setTable("chanson");
        $lesChansons= $unControleur->selectSearch($mot, $tab);
    }
        else{
        $unControleur->setTable ("chanson");
        $lesChansons = $unControleur->selectAll();
       
        }
    require_once("vues/vue_les_chansons.php");
?>

