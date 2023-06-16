<section id="categorie" class="container-fluid">
<h4> Ajout d'une Catégorie </h4>

<form method="post">

<div class="mb-12">

    <table>
        <tr>
            <td><input type="text" name="type" placeholder="Donnez une catégorie" value="<?= ($laCategorie!=null)?$laCategorie['type']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler" />
                <input class="btn btn-primary" type="submit" 
            <?= ($laCategorie!=null) ? 'name="Modifier" value="Modifier"' :
                 'name="Valider" value="Valider"' ?>>
            </td>
        </tr>
        <?= ($laCategorie!=null)?'<input type="hidden" name="idcategorie" value="'.$laCategorie['idcategorie'].'">':''?>
    </table>

</div>

</form>

</section>