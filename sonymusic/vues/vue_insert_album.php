<section id="album" class="container-fluid">
<h4> Ajout d'un Album </h4>

<form method="post">

<div class="mb-12">

    <table>
        <tr>
            <td><input type="text" name="nom" placeholder="Donnez un nom..." value="<?= ($lAlbum!=null)?$lAlbum['nom']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="text" name="anneeSortie" placeholder="Donnez une annee de sortie..." value="<?= ($lAlbum!=null)?$lAlbum['anneeSortie']:'' ?>" ></td>
        </tr>
        <tr>
            <td>
                <select name="idartiste">
                    <?php
                        foreach($lesArtistes as $unArtiste){
                            echo "<option value='".$unArtiste['iduser']."'>";
                            echo $unArtiste['prenom']." - ".$unArtiste['nomDeScene'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler" />
                <input class="btn btn-primary" type="submit" 
            <?= ($lAlbum!=null) ? 'name="Modifier" value="Modifier"' :
                 'name="Valider" value="Valider"' ?>>
            </td>
        </tr>
        <?= ($lAlbum!=null)?'<input type="hidden" name="idalbum" value="'.$lAlbum['idalbum'].'">':''?>
    </table>

</div>

</form>

</section>