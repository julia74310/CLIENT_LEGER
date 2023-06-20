<?php
    $lesCAVentes= $unControleur->recupCAVentes();
    $lesNbVentes=$unControleur->recupNbVentes();
    require_once("vues/vue_les_stats.php");
    require_once("visuelGraph.php");
?>