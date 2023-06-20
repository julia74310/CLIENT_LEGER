<div class="divider"></div>
</br></br>
<h1>Liste C.A. par Artiste</h1>
<form method="post">
	<table id="tableau" class="table table-dark table-striped container" border="1">
		<tr>
			<td>Rang</td>
			<td>NomDeScene</td>
			<td>CA</td>
			
			
		</tr>
		<tr>
			<?php
            var_dump($lesCAVentes);
                $compt=1;
				foreach($lesCAVentes as $unCAVentes){
					echo "<tr>";
					echo "<td>".$compt."</td>";
            		echo "<td>".$unCAVentes['nomDeScene']."</td>";
		            echo "<td>".$unCAVentes['CA']."</td>";
					echo "</tr>";
                    $compt++;
				}
			?>
		</tr>
	</table>
</form>
<h1>Liste ventes totales par Artiste</h1>
<form method="post">
	<table id="tableau" class="table table-dark table-striped container" border="1">
		<tr>
			<td>Rang</td>
			<td>NomDeScene</td>
			<td>nbVentesTotale</td>
			
			
		</tr>
		<tr>
			<?php
                $compt=1;
				foreach($lesNbVentes as $unNbVentes){
					echo "<tr>";
					echo "<td>".$compt."</td>";
            		echo "<td>".$unNbVentes['nomDeScene']."</td>";
		            echo "<td>".$unNbVentes['nbVentesTotale']."</td>";
					echo "</tr>";
                    $compt++;
				}
			?>
		</tr>
	</table>
</form>