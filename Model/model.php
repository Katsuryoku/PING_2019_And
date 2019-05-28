<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=andrice;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM salarie');
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
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

$reponse->closeCursor(); // Termine le traitement de la requête

?>