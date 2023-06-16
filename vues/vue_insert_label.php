<section id="label" class="container-fluid">
<h4> Ajout d'un Label </h4>

<form method="post">

<div class="mb-12">

    <table>
        <tr>
            <td><input type="text" name="nom" placeholder="Donnez un nom..." value="<?= ($leLabel!=null)?$leLabel['nom']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="adresse" placeholder="Donnez une adresse..." value="<?= ($leLabel!=null)?$leLabel['adresse']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="telephone" placeholder="Donnez un téléphone..." value="<?= ($leLabel!=null)?$leLabel['telephone']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="email" placeholder="Donnez un email..." value="<?= ($leLabel!=null)?$leLabel['email']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="password" name="mdp" placeholder="Donnez un mdp..." value="<?= ($leLabel!=null)?$leLabel['mdp']:'' ?>" ></td>
        </tr>
        <tr>
            <td>
                <select name="role">
                    <option value="label">Label</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="nbEmployes" placeholder="Le nombre d'employes..." value="<?= ($leLabel!=null)?$leLabel['nbEmployes']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler" />
                <input class="btn btn-primary" type="submit"
            <?= ($leLabel!=null) ? 'name="Modifier" value="Modifier"' :
                 'name="Valider" value="Valider"' ?>>
            </td>
        </tr>
        <?= ($leLabel!=null)?'<input type="hidden" name="iduser" value="'.$leLabel['iduser'].'">':''?>
    </table>

</div>

</form>

</section>