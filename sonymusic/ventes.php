<h3>Gestion des Ventes</h3>

<?php
$unControleur->setTable ("vente");
$lesVentes = $unControleur->selectAll();
    $laVente=null;
    if(isset($_GET['action']) && isset($_GET['idvente'])){
        $action=$_GET['action'];
        $idvente=$_GET['idvente'];

        switch($action){
            case 'sup':
                $chaine = "idvente=".$idvente;
                $unControleur->delete($chaine);
            break;
            case 'edit':
                $chaine= "idvente=".$idvente;
                $laVente=$unControleur->selectWhere($chaine);
            break;
        }
    }

    $unControleur->setTable ("vuePartenaires");
    $lesPartenaires=$unControleur->selectAll();
    $unControleur->setTable ("album");
    $lesAlbums=$unControleur->selectAll();

    require_once("vues/vue_insert_vente.php");
    if (isset($_POST['Valider'])){
        $unControleur->setTable ("vente");
        $tab = array(
            "nbVente"=>$_POST['nbVente'],
            "prixParVente"=>$_POST['prixParVente'],
            "date"=>$_POST['date'],
            "idpartenaire"=>$_POST['idpartenaire'],
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
        $unControleur->setTable ("vente");
        $idvente=$_POST['idvente'];
        $tab = array(
            "nbVente"=>$_POST['nbVente'],
            "prixParVente"=>$_POST['prixParVente'],
            "date"=>$_POST['date'],
            "idpartenaire"=>$_POST['idpartenaire'],
            "idalbum"=>$_POST['idalbum']
        ); 
        $chaine= "idvente=".$idvente;
        $unControleur->update($tab, $chaine);
        header("Location: index.php?page=11");
    }
    if(isset($_POST['Filtrer'])){
        $unControleur->setTable ("vente");
        $mot = $_POST['mot'];
        $tab = array(
            "nbVente"=>$_POST['nbVente'],
            "prixParVente"=>$_POST['prixParVente'],
            "date"=>$_POST['date'],
            "idpartenaire"=>$_POST['idpartenaire'],
            "idalbum"=>$_POST['idalbum']
        ); 
        $unControleur->setTable("vente");
        $lesVentes= $unControleur->selectSearch($mot, $tab);
    }
        else{
        $unControleur->setTable ("vente");
        $lesVentes = $unControleur->selectAll();
       
        }
    require_once("vues/vue_les_ventes.php");
?>

