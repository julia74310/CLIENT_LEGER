<h3> Gérer votre compte </h3>
<p>Vous pouvez voir votre profil, et le modifier si vous le désirer</p>
</br>
<form method="post">
    <table>
        <tr>
        <?php
        $unUser= $unControleur->selectUser($_SESSION['email'],$_SESSION['mdp']);
        ?>
            <td><input type="hidden" name="iduser" value="<?= $_SESSION['iduser'] ?>" /></td>
        </tr>
        <tr>
            <td>Nom: </td>
            <td><input type="text" name="nom" value="<?= $unUser['nom'] ?>" /></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input type="text" name="email" value="<?= $unUser['email'] ?>" /></td>
        </tr>
        <tr>
            <td>Mdp: </td>
            <td><input type="text" name="mdp" value="<?= $unUser['mdp'] ?>" /></td>
        </tr>
        <tr>
            <td>Téléphone: </td>
            <td><input type="text" name="telephone" value="<?= $unUser['telephone'] ?>" /></td>
        </tr>
        <tr>
            <td><input type="hidden" name="role" value="<?= $unUser['role'] ?>" /></td>
        </tr>
        <?php
            //Continuité du formulaire en fonction du role

            //Role=label
            if($_SESSION['role']=='label'){
                $unControleur->setTable ("vueLabels");
                $lesLabels= $unControleur->selectAll();
                //Sur tous les labels récupéré on filtre que sur le Label avec iduser de SESSION
                foreach($lesLabels as $unLabel){
                    if($unLabel['iduser']==$_SESSION['iduser']){
                        echo "<tr>
                            <td>Adresse: </td>
                            <td><input type='text' name='adresse' value='".$unLabel['adresse']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td>Nb Employés: </td>
                            <td><input type='text' name='nbEmployes' value='".$unLabel['nbEmployes']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td></td>
                            <td><input class='btn btn-primary' type='submit' name='ModifierLabel' value='Modifier Label'/></td>
                        </tr>";
                    }
                }
            }
            else if($_SESSION['role']=='partenaire'){
                $unControleur->setTable ("vuePartenaires");
                $lesPartenaires= $unControleur->selectAll();
                //Sur tous les partenaires récupéré on filtre que sur le partenaire avec iduser de SESSION
                foreach($lesPartenaires as $unPartenaire){
                    if($unPartenaire['iduser']==$_SESSION['iduser']){
                        echo "<tr>
                            <td>Adresse: </td>
                            <td><input type='text' name='adresse' value='".$unPartenaire['adresse']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td>Sigle: </td>
                            <td><input type='text' name='sigle' value='".$unPartenaire['sigle']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td>URL: </td>
                            <td><input type='text' name='url' value='".$unPartenaire['url']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td>Nb Sites: </td>
                            <td><input type='text' name='nbSites' value='".$unPartenaire['nbSites']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td><input type='hidden' name='statut' value='".$unPartenaire['statut']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td></td>
                            <td><input class='btn btn-primary' type='submit' name='ModifierPartenaire' value='Modifier Partenaire'/></td>
                        </tr>";
                    }
                }
            }
            else if($_SESSION['role']=='agent'){
                $unControleur->setTable ("vueAgents");
                $lesAgents= $unControleur->selectAll();
                //Sur tous les agents récupéré on filtre que sur l'agent avec iduser de SESSION
                foreach($lesAgents as $unAgent){
                    if($unAgent['iduser']==$_SESSION['iduser']){
                        echo "<tr>
                            <td>Prénom: </td>
                            <td><input type='text' name='prenom' value='".$unAgent['prenom']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td><input type='hidden' name='dateEmbauche' value='".$unAgent['dateEmbauche']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td><input type='hidden' name='idlabel' value='".$unAgent['idlabel']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td></td>
                            <td><input class='btn btn-primary' type='submit' name='ModifierAgent' value='Modifier Agent'/></td>
                        </tr>";
                        if(isset($_POST['ModifierAgent'])){
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
                            
                            //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
                            echo "<script>document.location.href='index.php?page=7';</script>";
                        }
                    }
                }
            }
            else if($_SESSION['role']=='artiste'){
                $unControleur->setTable ("vueArtistes");
                $lesArtistes= $unControleur->selectAll();
                //Sur tous les artistes récupéré on filtre que sur l'artiste avec iduser de SESSION
                foreach($lesArtistes as $unArtiste){
                    if($unArtiste['iduser']==$_SESSION['iduser']){
                        echo "<tr>
                            <td>Prénom: </td>
                            <td><input type='text' name='prenom' value='".$unArtiste['prenom']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td>Nom de Scène: </td>
                            <td><input type='text' name='nomDeScene' value='".$unArtiste['nomDeScene']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td>Type Principal: </td>
                            <td><input type='text' name='typePrincipal' value='".$unArtiste['typePrincipal']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td><input type='hidden' name='idagent' value='".$unArtiste['idagent']."'/></td>
                        </tr>";
                        echo "<tr>
                            <td></td>
                            <td><input class='btn btn-primary' type='submit' name='ModifierArtiste' value='Modifier Artiste'/></td>
                        </tr>";
                        if(isset($_POST['ModifierArtiste'])){
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
                            echo "<script>document.location.href='index.php?page=7';</script>";
                        }
                    }
                }
            }
            else{
                echo "<tr>
                        <td></td>
                        <td><input class='btn btn-primary' type='submit' name='ModifierAdmin' value='Modifier Admin'/></td>
                </tr>";
                if(isset($_POST['ModifierAdmin'])){
                    $unControleur->modifierAdmin($_POST);
                    ////Le header Location en php ne fonctionne pas correctement, remplacement par javascript
                    echo "<script>document.location.href='index.php?page=7';</script>";
                }
            }
        ?>
    </table>
</form>