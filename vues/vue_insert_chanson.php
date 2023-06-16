<section id="chanson" class="container-fluid">
<h4> Ajout d'une Chanson </h4>

<form method="post">

<div class="mb-12">

    <table>
        <tr>
            <td><input type="text" name="titre" placeholder="Donnez un titre..." value="<?= ($laChanson!=null)?$laChanson['titre']:'' ?>" ></td>
        </tr>
        <tr>
            <td><input type="date" name="sortie" value="<?= ($laChanson!=null)?$laChanson['sortie']:'' ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="duree" placeholder="Donnez une durée..." value="<?= ($laChanson!=null)?$laChanson['duree']:'' ?>" ></td>
        </tr>
        <tr>
            <td>
                <select name="idcategorie">
                    <?php
                        foreach($lesCategories as $uneCategorie){
                            echo "<option value='".$uneCategorie['idcategorie']."'>";
                            echo $uneCategorie['type'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <select name="idalbum">
                    <?php
                        foreach($lesAlbums as $unAlbum){
                            echo "<option value='".$unAlbum['idalbum']."'>";
                            echo $unAlbum['nom']." - ".$unAlbum['anneeSortie'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler" />
                <input class="btn btn-primary" type="submit"
            <?= ($laChanson!=null) ? 'name="Modifier" value="Modifier"' :
                 'name="Valider" value="Valider"' ?>>
            </td>
        </tr>
        <?= ($laChanson!=null)?'<input type="hidden" name="idchanson" value="'.$laChanson['idchanson'].'">':''?>
    </table>

</div>

</form>

</section>