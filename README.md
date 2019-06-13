# PING_2019_Andrice

index.php : le contrôleur (chef d'orchestre)

indexView.php : la vue (page HTML...)

model.php : le modèle (requêtes SQL...)

Comment installer le projet avec wamp :

1)  installer wamp
	
2)  cloner le repo dans "(dossier de Wamp)/www/"

Comment configurer la BDD MySQL :
1)	En local :

	a.	Installer WAMP.

	b.	Démarrer les services en vérifiant que l’icône de wamp devient bien verte.

	c.	Aller sur : http://localhost/phpmyadmin/index.php

	d.	Se connecter avec pour nom d’utilisateur « root », sans mot de passe et le serveur Mysql.

	e.	Aller dans l’onglet « Importer ».

	f.	Choisir comme fichier à importer : (Adresse du Projet) /Data/AndriceSQL/andrice.sql

	g.	Laisser les configurations par défaut puis exécuter.

	h.	Vérifier que la base de données « andrice » est bien apparue sur le côté.

2)	Sur serveur :

	a.	Aller dans le fichier : (Adresse du Projet) /Model/access.php

	b.	Configurer les variables $host, $dbname, $ndc et $password.

	c.	Aller dans votre client base de données et installer au moins :
	
	(Adresse du Projet) /Data/AndriceSQL/andrice_noDonnee.sql
