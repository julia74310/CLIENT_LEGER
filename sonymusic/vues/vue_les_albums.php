<div class="divider"></div>

<h4>Liste des Albums</h4>
<form method="post">
    <input type="text" placeholder="Recherche..." name="mot" />
    <input class="btn btn-primary" type="submit" name="Filtrer" value="Filtrer" />
</form>
</br></br>
<form method="post">
	<table id="tableau" class="table table-dark table-striped container" border="1">
		<tr>
			<td>Id Album</td>
			<td>Nom</td>
            <td>Année de Sortie</td>
            <td>Id Artiste</td>
            <td>Opérations</td>
			
			
		</tr>
		<tr>
			<?php
				foreach($lesAlbums as $unAlbum){
					echo "<tr>";
					echo "<td>".$unAlbum['idalbum']."</td>";
            		echo "<td>".$unAlbum['nom']."</td>";
		            echo "<td>".$unAlbum['anneeSortie']."</td>";
		            echo "<td>".$unAlbum['idartiste']."</td>";
		            //Opération de suppression et de modification
					echo "<td> <a href='index.php?page=9&action=sup&idalbum=".$unAlbum['idalbum']."'>
	                   	<img src='images/delete.png' heigth='20' width='20'></a>";
	                echo "<a href='index.php?page=9&action=edit&idalbum=".$unAlbum['idalbum']."'>
	                   	<img src='images/edit.png' heigth='20' width='20'></a></td>";    
					echo "</tr>";
				}
			?>
		</tr>
	</table>
</form>