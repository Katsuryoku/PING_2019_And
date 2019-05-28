# PING_2019_Andrice

index.php : le contrôleur (chef d'orchestre)

indexView.php : la vue (page HTML...)

model.php : le modèle (requêtes SQL...)

Comment configurer la BDD MySQL :
	1) Lancer wamp
	2) Clique droit sur l'icone -> Mysql -> my.ini
	3) changer la ligne 46 :
		datadir="(Addresse du projet git)/Data"
	4) sauvegarder
	5) redémarrer les services Mysql (Clique droit sur l'icone -> Mysql -> Administration -> redémarrer le service)
	6) Aller sur "http://localhost/phpmyadmin/index.php"
	6bis) Aller sur "http://localhost/PING_2019_And/Model/model.php" et qu'il n'y ai pas d'erreur.
	7) Pas de mot de passe et vérifier que la BDD est bien présente