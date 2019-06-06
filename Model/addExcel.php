<?php
session_start();
$host = 'localhost';
$dbname = 'andrice';
$ndc = 'root';
$password = '';
/**
* upload du fichier sur le serveur pour pouvoir le traiter
**/

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
if ($_FILES["fileToUpload"]["error"] > 0)
{
	echo "Error: " . $_FILES["fileToUpload"]["error"] . "<br>";
	$uploadOk = 0;
}
else
{
	if(isset($_POST["submit"])) {
		//echo "Upload: " . $_FILES["fileToUpload"]["name"] . "<br>";
		//echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br>";
		//echo "Size: " . ($_FILES["fileToUpload"]["size"] / 1024) . " kB<br>";
		//echo "Stored in: " . $_FILES["fileToUpload"]["tmp_name"];
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
		die('Sorry, there was an error uploading your file.');
	}
	}
}

/**
* Connexion à la base de donnée
**/
try
{
	$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $ndc, $password);
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}




/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
header('Content-Type: text/plain');
$Filepath = $target_file;

	// Excel reader from http://code.google.com/p/php-excel-reader/
require('../libs/SpreadsheetReader/php-excel-reader/excel_reader2.php');
require('../libs/SpreadsheetReader/SpreadsheetReader.php');

date_default_timezone_set('UTC');

try
{
	$Spreadsheet = new SpreadsheetReader($Filepath);

	$Sheets = $Spreadsheet -> Sheets();

	foreach ($Sheets as $Index => $Name)
	{
		$Spreadsheet -> ChangeSheet($Index);

		foreach ($Spreadsheet as $Key => $Row)
		{
			if ($Key <1 || $Row[0] == ""){

			}else{
				//echo $Key.': ';
				if ($Row)
				{
					$id = (int)$Row[0];
					$acquisCPN_1 = (float)$Row[2];
					$prisCPN_1 = (float)$Row[3];
					$soldeCPN_1 = (float)$Row[4];
					$acquisCPN = (float)$Row[5];
					$prisCPN = (float)$Row[6];
					$soldeCPN = (float)$Row[7];
					$acquisJRRCR = (float)$Row[8];
					$prisJRRCR = (float)$Row[9];
					$soldeJRRCR = (float)$Row[10];
					$query = "SELECT idsalaries from solde where idsalaries=".$id;
					$reponse = $bdd->query($query);
					//echo $id." : ".$reponse->rowCount().PHP_EOL;
					try {
						if ($id != 0){
							if ($reponse->rowCount()==0){

								$query = "INSERT INTO solde (`idsalaries`, `ACQUISCPN-1`, `PRISCPN-1`, `SOLDECPN-1`, `ACQUISCPN`, `PRISCPN`, `SOLDECPN`, `ACQUISJRRCR`, `PRISJRRCR`, `SOLDEJRRCR`) VALUES (".$id.", ".$acquisCPN_1.", ".$prisCPN_1.", ".$soldeCPN_1.", ".$acquisCPN.", ".$prisCPN.", ".$soldeCPN.", ".$acquisJRRCR.", ".$prisJRRCR.", ".$soldeJRRCR.")";
								$bdd->exec($query);
							}else{
								$query = "UPDATE solde SET `ACQUISCPN-1` = ".$acquisCPN_1.", `PRISCPN-1` = ".$prisCPN_1.", `SOLDECPN-1` = ".$soldeCPN_1.", `ACQUISCPN` = ".$acquisCPN.", `PRISCPN` = ".$prisCPN.", `SOLDECPN` = ".$soldeCPN.", `ACQUISJRRCR` = ".$acquisJRRCR.", `PRISJRRCR` = ".$prisJRRCR.", `SOLDEJRRCR` = ".$soldeJRRCR." WHERE `solde`.`idsalaries` =".$id;
								$bdd->exec($query);
							}
    				//echo "New record created successfully".PHP_EOL;
						}
					}
					catch(PDOException $e)
					{
						die($sql . "<br>" . $e->getMessage());
					}
				}
				else
				{
					//var_dump($Row);
				}
			}
		}
	}
		//echo "end of file.";*
	// Suppression du fichier local
	unlink($Filepath) or die("Couldn't delete file");
	$_SESSION['varname'] = "WORKED";
	header( "Location: ../View/RH/addExcel.php" );
}
catch (Exception $E)
{
	die($E -> getMessage());
}
?>