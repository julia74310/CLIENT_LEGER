<h2>Gestion des Artistes</h2>
<?php
    $unControleur->setTable ("vueArtistes");
    $lesArtistes= $unControleur->selectAll();
    $lArtiste=null;
    if(isset($_GET['iduser']) && isset($_GET['action'])){
        $iduser=$_GET['iduser'];
        $action=$_GET['action'];
        switch($action){
            case 'sup':
                $tab = array("iduser"=>$iduser);
                $unControleur->callProcedure("deleteArtiste", $tab);
                
                //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
                echo "<script>document.location.href='index.php?page=4';</script>";
            break;
            case 'edit':
                $lArtiste=$unControleur->selectWhere($iduser);
            break;
        }
    }
    $unControleur->setTable ("vueAgents");
    $lesAgents=$unControleur->selectAll();
    //var_dump($lesLabels);
    require_once("vues/vue_insert_artiste.php");

    if(isset($_POST['Valider'])){
        $tab =array(
            "nom"=> $_POST['nom'],
            "email"=> $_POST['email'],
            "mdp"=> $_POST['mdp'],
            "telephone"=> $_POST['telephone'],
            "role"=> $_POST['role'],
            "prenom"=> $_POST['prenom'],
            "nomDeScene"=> $_POST['nomDeScene'],
            "typePrincipal"=> $_POST['typePrincipal'],
            "idagent"=> $_POST['idagent'] );
            require_once("Upload.php");
            $_POST['fichier'] = $targetfile;
        $unControleur->callProcedure("insertArtiste",$tab);
    }
    if(isset($_POST['Modifier'])){
        $tab =array(
            "iduser"=>$_POST['iduser'],
            "nom"=> $_POST['nom'],
            "email"=> $_POST['email'],
            "mdp"=> $_POST['mdp'],
            "telephone"=> $_POST['telephone'],
            "role"=> $_POST['role'],
            "prenom"=> $_POST['prenom'],
            "nomDeScene"=> $_POST['nomDeScene'],
            "typePrincipal"=> $_POST['typePrincipal'],
            "idagent"=> $_POST['idagent'] );
        $unControleur->callProcedure("updateArtiste", $tab);
        
        //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
        echo "<script>document.location.href='index.php?page=4';</script>";
    }


    if(isset($_POST['Filtrer'])){
        $mot=$_POST['mot'];
        $liste =array(
            "nom",
            "email",
            "telephone",
            "role",
            "prenom",
            "nomDeScene",
            "typePrincipal",
            "idagent");
        $unControleur->setTable ("vueArtistes");
        $lesArtistes= $unControleur->selectSearch($mot, $liste);
    }
    else{
        $unControleur->setTable ("vueArtistes");
        $lesArtistes= $unControleur->selectAll();
    }

    require_once("vues/vue_les_artistes.php");
?>