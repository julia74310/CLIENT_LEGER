<div class="divider"></div>

<h4>Liste des Artistes</h4>
<form method="post">
    <input type="text" placeholder="Recherche..." name="mot" />
    <input class="btn btn-primary" type="submit" name="Filtrer" value="Filtrer" />
</form>
</br></br>
<form method="post">
	<table id="tableau" class="table table-dark table-striped container" border="1">
		<tr>
			<td>Id Artiste</td>
			<td>Nom</td>
            <td>Email</td>
            <td>Téléphone</td>
			<td>Prénom</td>
			<td>Nom de Scène</td>
            <td>Type Principal</td>
            <td>Id Agent</td>
            <td>Opérations</td>
			
			
		</tr>
		<tr>
			<?php
				foreach($lesArtistes as $unArtiste){
					echo "<tr>";
					echo "<td>".$unArtiste['iduser']."</td>";
            		echo "<td>".$unArtiste['nom']."</td>";
		            echo "<td>".$unArtiste['email']."</td>";
		            echo "<td>".$unArtiste['telephone']."</td>";
		            echo "<td>".$unArtiste['prenom']."</td>";
                    echo "<td>".$unArtiste['nomDeScene']."</td>";
                    echo "<td>".$unArtiste['typePrincipal']."</td>";
                    echo "<td>".$unArtiste['idagent']."</td>";
		            //Opération de suppression et de modification
					echo "<td> <a href='index.php?page=4&action=sup&iduser=".$unArtiste['iduser']."'>
	                   	<img src='images/delete.png' heigth='20' width='20'></a>";
	                echo "<a href='index.php?page=4&action=edit&iduser=".$unArtiste['iduser']."'>
	                   	<img src='images/edit.png' heigth='20' width='20'></a></td>";    
					echo "</tr>";
				}
			?>
		</tr>
	</table>
</form>