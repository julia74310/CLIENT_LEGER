<section id="agent" class="container-fluid">
<h4> Ajout d'un Agent </h4>

<form method="post">
<div class="mb-12">
    <table>
        <tr>
            <td><input type="text" name="nom" placeholder="Donnez un nom..." value="<?= ($lAgent!=null)?$lAgent['nom']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="email" placeholder="Donnez un Email..." value="<?= ($lAgent!=null)?$lAgent['email']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="telephone" placeholder="Donnez un téléphone..." value="<?= ($lAgent!=null)?$lAgent['telephone']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="password" name="mdp" placeholder="Donnez un mdp..." value="<?= ($lAgent!=null)?$lAgent['mdp']:'' ?>" ></td>
        </tr>
        <tr>
            <td>
                <select name="role">
                    <option value="agent">Agent</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="prenom" placeholder="Donnez un prenom..." value="<?= ($lAgent!=null)?$lAgent['prenom']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="date" name="dateEmbauche" ></td>
        </tr>

        <tr>
            <td>
                <select name="idlabel">
                    <?php
                        foreach($lesLabels as $unLabel){
                            echo "<option value='".$unLabel['iduser']."'>";
                            echo $unLabel['nom'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler" />
                <input class="btn btn-primary" type="submit"
            <?= ($lAgent!=null) ? 'name="Modifier" value="Modifier"' :
                 'name="Valider" value="Valider"' ?>>
            </td>
        </tr>
        <?= ($lAgent!=null)?'<input type="hidden" name="iduser" value="'.$lAgent['iduser'].'">':''?>
    </table>
</div>
</form>
</section>