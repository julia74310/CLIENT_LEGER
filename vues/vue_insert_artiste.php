<section id="artiste" class="container-fluid">
<h4> Ajout d'un Artiste </h4>

<form method="post">

<div class="mb-12">
    
    <table>
        <tr>
            <td><input type="text" name="nom" placeholder="Donnez un nom..." value="<?= ($lArtiste!=null)?$lArtiste['nom']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="email" placeholder="Donnnez un Email..." value="<?= ($lArtiste!=null)?$lArtiste['email']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="telephone" placeholder="Donnez un téléphone..." value="<?= ($lArtiste!=null)?$lArtiste['telephone']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="password" name="mdp" placeholder="Donnez un mdp..." value="<?= ($lArtiste!=null)?$lArtiste['mdp']:'' ?>" ></td>
        </tr>
        <tr>
            <td>
                <select name="role">
                    <option value="artiste">Artiste</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="prenom" placeholder="Donnez un prenom..." value="<?= ($lArtiste!=null)?$lArtiste['prenom']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="nomDeScene" placeholder="Donnez un nom de scène..." value="<?= ($lArtiste!=null)?$lArtiste['nomDeScene']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="typePrincipal" placeholder="Donnez un type principal..." value="<?= ($lArtiste!=null)?$lArtiste['typePrincipal']:'' ?>" ></td>
        </tr>
        <tr>
            <td>
                <select name="idagent">
                    <?php
                        foreach($lesAgents as $unAgent){
                            echo "<option value='".$unAgent['iduser']."'>";
                            echo $unAgent['prenom'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr> 
            <td>
            <input type="file" name="image" accept=".jpg, .jpeg, .png" placeholder="Donnez une image..."  value="<?= ($lArtiste!=null)?$lArtiste['image']:'' ?>">
            </td>
        </tr>
        <tr>
            <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler" />
                <input class="btn btn-primary" type="submit"
            <?= ($lArtiste!=null) ? 'name="Modifier" value="Modifier"' :
                 'name="Valider" value="Valider"' ?>>
            </td>
        </tr>
        <?= ($lArtiste!=null)?'<input type="hidden" name="iduser" value="'.$lArtiste['iduser'].'">':''?>
    </table>

</div>

</form>

</section>