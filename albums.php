<h3>Gestion des Albums</h3>

<?php
$unControleur->setTable ("album");
$lesAlbums = $unControleur->selectAll();
    $lAlbum=null;
    if(isset($_GET['action']) && isset($_GET['idalbum'])){
        $action=$_GET['action'];
        $idalbum=$_GET['idalbum'];

        switch($action){
            case 'sup':
                $chaine = "idalbum=".$idalbum;
                $unControleur->delete($chaine);

                //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
            echo "<script>document.location.href='index.php?page=9';</script>";
            break;
            case 'edit':
                $chaine= "idalbum=".$idalbum;
                $lAlbum=$unControleur->selectWhere($chaine);
            break;
        }
    }

    $unControleur->setTable ("vueArtistes");
    $lesArtistes=$unControleur->selectAll();

    require_once("vues/vue_insert_album.php");
    if (isset($_POST['Valider'])){
        $unControleur->setTable ("album");
        $tab = array(
            "nom"=>$_POST['nom'],
            "anneeSortie"=>$_POST['anneeSortie'],
            "idartiste"=>$_POST['idartiste']
    
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
        $unControleur->setTable ("album");
        $idalbum=$_POST['idalbum'];
        $tab = array(
            "nom"=>$_POST['nom'],
            "anneeSortie"=>$_POST['anneeSortie'],
            "idartiste"=>$_POST['idartiste']
        ); 
        $chaine= "idalbum=".$idalbum;
        $unControleur->update($tab, $chaine);
        
        //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
        echo "<script>document.location.href='index.php?page=9';</script>";
    }
    if(isset($_POST['Filtrer'])){
        $unControleur->setTable ("album");
        $mot = $_POST['mot'];
        $tab = array(
            "idalbum",
            "nom",
            "anneeSortie",
            "idartiste"
        ); 
        $unControleur->setTable("album");
        $lesAlbums= $unControleur->selectSearch($mot, $tab);
    }
        else{
        $unControleur->setTable ("album");
        $lesAlbums = $unControleur->selectAll();
       
        }
    require_once("vues/vue_les_albums.php");
?>

