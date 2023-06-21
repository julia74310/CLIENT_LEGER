<section id="partenaire" class="container-fluid">
<h4> Ajout d'un Partenaire </h4>

<form method="post">

<div class="mb-12">

    <table>
        <tr>
            <td><input type="text" name="nom" placeholder="Donnez un nom..." value="<?= ($lePartenaire!=null)?$lePartenaire['nom']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="email" placeholder="Donnez un Email..." value="<?= ($lePartenaire!=null)?$lePartenaire['email']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="telephone" placeholder="Donnez un téléphone..." value="<?= ($lePartenaire!=null)?$lePartenaire['telephone']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="password" name="mdp" placeholder="Donnez un mdp..." value="<?= ($lePartenaire!=null)?$lePartenaire['mdp']:'' ?>" ></td>
        </tr>
        <tr>
            <td>
                <select name="role">
                    <option value="partenaire">Partenaire</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="adresse" placeholder="Donnez une adresse..." value="<?= ($lePartenaire!=null)?$lePartenaire['adresse']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="sigle" placeholder="Donnez un sigle..." value="<?= ($lePartenaire!=null)?$lePartenaire['sigle']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="url" placeholder="Donnez un url..." value="<?= ($lePartenaire!=null)?$lePartenaire['url']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="nbSites" placeholder="Donnez le nombre de sites..." value="<?= ($lePartenaire!=null)?$lePartenaire['nbSites']:'' ?>" ></td>
        </tr>
        <tr>
            <td>
                <select name="statut">
                    <option value="physique">Physique</option>
                    <option value="digital">Digital</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler" />
                <input class="btn btn-primary" type="submit"
            <?= ($lePartenaire!=null) ? 'name="Modifier" value="Modifier"' :
                 'name="Valider" value="Valider"' ?>>
            </td>

            <td>
                <a href="index.php?page=12">
                <input class="btn btn-primary" type="button" name="Rechercher" value="Rechercher"/>
                </a>
            </td>
        </tr>
        <?= ($lePartenaire!=null)?'<input type="hidden" name="iduser" value="'.$lePartenaire['iduser'].'">':''?>
    </table>
    
</div>

</form>

</section>