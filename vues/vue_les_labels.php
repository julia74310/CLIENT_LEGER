<div class="divider"></div>

<h4>Liste des Labels</h4>
<form method="post">
    <input type="text" placeholder="Recherche..." name="mot" />
    <input class="btn btn-primary" type="submit" name="Filtrer" value="Filtrer" />
</form>
</br></br>
<form method="post">
	<table id="tableau" class="table table-dark table-striped container" border="1">
		<tr>
			<td>Id Label</td>
			<td>Nom</td>
			<td>Adresse</td>
			<td>Téléphone</td>
			<td>Email</td>
            <td>Nb. Employés</td>
            <td>Opérations</td>
			
			
		</tr>
		<tr>
			<?php
				foreach($lesLabels as $unLabel){
					echo "<tr>";
					echo "<td>".$unLabel['iduser']."</td>";
            		echo "<td>".$unLabel['nom']."</td>";
		            echo "<td>".$unLabel['adresse']."</td>";
		            echo "<td>".$unLabel['telephone']."</td>";
		            echo "<td>".$unLabel['email']."</td>";
                    echo "<td>".$unLabel['nbEmployes']."</td>";
		            //Opération de suppression et de modification
					echo "<td> <a href='index.php?page=1&action=sup&iduser=".$unLabel['iduser']."'>
	                   	<img src='images/delete.png' heigth='20' width='20'></a>";
	                echo "<a href='index.php?page=1&action=edit&iduser=".$unLabel['iduser']."'>
	                   	<img src='images/edit.png' heigth='20' width='20'></a></td>";    
					echo "</tr>";
				}
			?>
		</tr>
	</table>
</form>