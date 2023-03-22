<div class="divider"></div>

<h4>Liste des Catégories</h4>
<form method="post">
    <input type="text" placeholder="Recherche..." name="mot" />
    <input class="btn btn-primary" type="submit" name="Filtrer" value="Filtrer" />
</form>
</br></br>
<form method="post">
<table id="tableau" class="table table-dark table-striped container" border="1">
		<tr>
			<td>ID Catégorie</td>
			<td>Type</td>
            <td>Opérations</td>
			
			
		</tr>
		<tr>
			<?php
				foreach($lesCategories as $uneCategorie){
					echo "<tr>";
					echo "<td>".$uneCategorie['idcategorie']."</td>";
            		echo "<td>".$uneCategorie['type']."</td>";
		            //Opération de suppression et de modification
					echo "<td> <a href='index.php?page=8&action=sup&idcategorie=".$uneCategorie['idcategorie']."'>
	                   	<img src='images/delete.png' heigth='20' width='20'></a>";
	                echo "<a href='index.php?page=8&action=edit&idcategorie=".$uneCategorie['idcategorie']."'>
	                   	<img src='images/edit.png' heigth='20' width='20'></a></td>";    
					echo "</tr>";
				}
			?>
		</tr>
	</table>
</form>