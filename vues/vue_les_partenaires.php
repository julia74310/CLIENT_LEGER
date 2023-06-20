<div class="divider"></div>

<h4>Liste des Partenaires</h4>
<form method="post">
    <input type="text" placeholder="Recherche..." name="mot" />
    <input class="btn btn-primary" type="submit" name="Filtrer" value="Filtrer" />
</form>
</br></br>
<form method="post">
	<table id="tableau" class="table table-dark table-striped container" border="1">
		<tr>
			<td>Id User</td>
			<td>Nom</td>
			<td>Email</td>
			<td>Téléphone</td>
			<td>Rôle</td>
            <td>Adresse</td>
            <td>Sigle</td>
            <td>Url</td>
            <td>nbSites</td>
            <td>Statut</td>
            <td>Opérations</td>
			
			
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
		            //Opération de suppression et de modification
					echo "<td> <a href='index.php?page=2&action=sup&iduser=".$unPartenaire['iduser']."'>
	                   	<img src='images/delete.png' heigth='20' width='20'></a>";
	                echo "<a href='index.php?page=2&action=edit&iduser=".$unPartenaire['iduser']."'>
	                   	<img src='images/edit.png' heigth='20' width='20'></a></td>";    
					echo "</tr>";
				}
			?>
		</tr>
	</table>
</form>