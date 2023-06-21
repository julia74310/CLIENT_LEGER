<section id="partenaire" class="container-fluid">
<h4> Recherche d'un Partenaire </h4>

<?php
$unControleur->setTable ("vuePartenaires");
$lesPartenaires = $unControleur->selectAll();
    $lePartenaire=null;



?>


<form method="post">

<div class="mb-12">

    <table>
        <tr>
            <td><input type="text" name="nom"  placeholder="Donnez un nom..." value="<?= ($lePartenaire!=null)?$lePartenaire['nom']:'' ?>">
        </tr>
        
        <tr>
            <td><input class="btn btn-primary" type="reset" name="Annuler" value="Annuler" />
                <input class="btn btn-primary" type="submit" name="Rechercher"  value="Rechercher" >
            </td>

        </tr>

        <tr>
			<?php
				foreach($lesPartenaires as $unPartenaire){
					echo "<tr>";
					echo "<td>".$unPartenaire['iduser']."</td>";
            		echo "<td>".$unPartenaire['nom']."</td>";
		            echo "<td>".$unPartenaire['email']."</td>";
		            echo "<td>".$unPartenaire['telephone']."</td>";
		            echo "<td>".$unPartenaire['role']."</td>";
                    echo "<td>".$unPartenaire['adresse']."</td>";
                    echo "<td>".$unPartenaire['sigle']."</td>";
                    echo "<td>".$unPartenaire['url']."</td>";
                    echo "<td>".$unPartenaire['nbSites']."</td>";
                    echo "<td>".$unPartenaire['statut']."</td>";
					echo "</tr>";
				}
			?>
		</tr>
    
    </table>



    <table>
        <tr>
            <td><input type="text" name="nom"  placeholder="Donnez un nom..." value="<?= ($lePartenaire!=null)?$lePartenaire['nom']:'' ?>">
        </tr>
        
        <tr>
                <input class="btn btn-primary" type="submit" name="Rechercher"  value="Rechercher" >
            </td>

        </tr>
    
    </table>





    
</div>

</form>

</section>


