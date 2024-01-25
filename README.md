# Introduction  
Le projet de base de données est axé sur la modélisation des données liées aux Pokémon.
Ce projet a été fait par Jean et Brassica.

## Mise en Place
Téléchager le fichier "script_bdd.sql" sur le repository "Pokemons-SQL". Insérer les requêtes dans votre SGBD(phpmyAdmin), vous obtiendrez une base de donnée "projet_sql_pokemon".
De plus les INSERT INTO permettant de populer la BDD sont inclus dans le fichier "scrip_bdd.sql". Donc elle est prête pour l'utilisation.

## Utilisation des requêtes
Une fois que vous avez la base de donnée, télécharger le fichier "requête_Sql.docx".
Ce fichier contient toutes les requêtes SQL que vous pourrez effectuer. 
Attention, ces requêtes sont à faire dans l'ordre.

## Informations
L'entièreté du projet est consolidé dans le fichier "Projet SQL.docx".

## Back & Front
Le back et le front sont stokés dans le dossier bonus. Pour les faire fonctionner, il vous suffit d'ouvrir le dossier bonus dans un IDE (Visual studio code). D'ouvrir un terminal à ce chemin et d'exécuter la commande suivante : php -S localhost:8000
Une fois le serveur php lancé, ouvrez xampp et lancer le serveur Apache et MySql. Si vous êtes sur xampp et que votre login et mot de passe pour la base de donnée sont ceux de base, vous n'avez aucune modification à faire. Dans le cas contraire, rendez-vous dans le dossier bonus/src et venez éditer le fichier db_identifiant.php afin de rentrer vos propres identifiants.

Une fois tout cela fait, entrez l'url suivante dans votre navigateur "localhost:8000/admin/dresseurs/index.php"

## Petite précision 
Pour que le back et le front fonctionnent correctement, vous devez au préalable avoir éxécuté toutes les requêtes sql et il vous faudra également renommer la colonne "precision" dans la table attaques en "precisions".
