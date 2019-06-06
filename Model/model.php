<?php
include("access.php");

$query = 'SELECT * FROM salarie';
$reponse =mysqli_query($con, $query);
// On affiche chaque entrée une à une
while ($donnees =mysqli_fetch_array($reponse))
{
?>
    <p>
    <strong>idSalaries</strong> : <?php echo $donnees['idsalaries']; ?><br />
    Nom : <?php echo $donnees['Nom']; ?>, prénom <?php echo $donnees['Prenom']; ?> <br />
    Ce jeu fonctionne sur <?php echo $donnees['Trigramme']; ?> et on peut y jouer à <?php echo $donnees['Nationalite']; ?> au maximum<br />
    <?php echo $donnees['Sexe']; ?> a laissé ces commentaires sur <?php echo $donnees['Famille']; ?> : <em><?php echo $donnees['Categorie']; ?></em>
   </p>
<?php
}
?>