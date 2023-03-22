<h2>Gestion des Agents</h2>
<?php
    $unControleur->setTable ("vueAgents");
    $lesAgents= $unControleur->selectAll();
    $lAgent=null;
    if(isset($_GET['iduser']) && isset($_GET['action'])){
        $iduser=$_GET['iduser'];
        $action=$_GET['action'];
        switch($action){
            case 'sup':
                $tab = array("iduser"=>$iduser);
                $unControleur->callProcedure("deleteAgent", $tab);
                header("Location: index.php?page=3");
            break;
            case 'edit':
                $lAgent=$unControleur->selectWhere($iduser);
            break;
        }
    }
    $unControleur->setTable ("vueLabels");
    $lesLabels=$unControleur->selectAll();
    require_once("vues/vue_insert_agent.php");

    if(isset($_POST['Valider'])){
        $tab =array(
            "nom"=> $_POST['nom'],
            "email"=> $_POST['email'],
            "mdp"=> $_POST['mdp'],
            "telephone"=> $_POST['telephone'],
            "role"=> $_POST['role'],
            "prenom"=> $_POST['prenom'],
            "dateEmbauche"=> $_POST['dateEmbauche'],
            "idlabel"=> $_POST['idlabel'] );
        $unControleur->callProcedure("insertAgent",$tab);
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
            "dateEmbauche"=> $_POST['dateEmbauche'],
            "idlabel"=> $_POST['idlabel'] );
        $unControleur->callProcedure("updateAgent", $tab);
        header("Location: index.php?page=3");
    }


    if(isset($_POST['Filtrer'])){
        $mot=$_POST['mot'];
        $liste =array(
            "nom",
            "email",
            "telephone",
            "role",
            "prenom",
            "dateEmbauche",
            "idlabel");
        $unControleur->setTable ("vueAgents");
        $lesAgents= $unControleur->selectSearch($mot, $liste);
    }
    else{
        $unControleur->setTable ("vueAgents");
        $lesAgents= $unControleur->selectAll();
    }

    require_once("vues/vue_les_agents.php");
?>