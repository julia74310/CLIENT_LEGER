<div class="divider"></div>

<h4>Liste des Agents</h4>
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
            <td>Prénom</td>
            <td>Date Embauche</td>
            <td>Id Label</td>
            <td>Opérations</td>


        </tr>
        <tr>
            <?php
                foreach($lesAgents as $unAgent){
                    echo "<tr>";
                    echo "<td>".$unAgent['iduser']."</td>";
                    echo "<td>".$unAgent['nom']."</td>";
                    echo "<td>".$unAgent['email']."</td>";
                    echo "<td>".$unAgent['telephone']."</td>";
                    echo "<td>".$unAgent['role']."</td>";
                    echo "<td>".$unAgent['prenom']."</td>";
                    echo "<td>".$unAgent['dateEmbauche']."</td>";
                    echo "<td>".$unAgent['idlabel']."</td>";
                    //Opération de suppression et de modification
                    echo "<td> <a href='index.php?page=3&action=sup&iduser=".$unAgent['iduser']."'>
                           <img src='images/delete.png' heigth='20' width='20'></a>";
                    echo "<a href='index.php?page=3&action=edit&iduser=".$unAgent['iduser']."'>
                           <img src='images/edit.png' heigth='20' width='20'></a></td>";
                    echo "</tr>";
                }
            ?>
        </tr>
    </table>
</form>