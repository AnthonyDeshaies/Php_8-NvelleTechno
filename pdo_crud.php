<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Débuter en PHP - PDO et CRUD - MySQL (PHP8)</title>
</head>
<body>
    <?php
        // phpinfo();
        // Constantes d'environnement (qui vont contenir les informations d'accès à la base de donnée). On les crée avec "define" en leur donnant le nom qu'on veut (DBHOST, DBUSER...).
        define("DBHOST", "localhost"); // Serveur (host=hôte).
        define("DBUSER", "root"); // Utilisateur de la bdd (DB).
        define("DBPASS", ""); // Mot de passe.
        define("DBNAME", "php8"); // Nome de la DB (bdd) (déja créée s muSQL).

        // Pour se connecter à une bdd (DB) MySql, 2 façons :
        // MySqli : Dédié UNIQUEMENT à mySql.
        // PDO (Php Data Object). Permet de changer de service de bdd sans modifier le code

        // DSN de connexion : (Data Source Name / Nom de la source de donnée) (string qui va indiquer le chemin de la connexion)
        $dsn = "mysql:dbname=php8;host=localhost";
        $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

        // On va se connecter à la base :
        try // Esayes ce qu'il y a dans "try"
        {
            // On va instancier PDO (créér une instance, créér un PDO) :
            $db = new PDO($dsn, DBUSER, DBPASS);

            echo "On est connecté";

            // On s'assure d'être en UTF8 :
            $db->exec("SET NAMES utf8"); // Requête SQL - Définit que ts les echanges entre php et la bdd seront en utf-8 ( bon pour les accents etc...)
        }
        catch(PDOException $e) // Si ça marche pas, "Attrape l'exception" et fait :
        // PDOException $e: Utilisation d'un objet.
        {
            die("Erreur Mr Deshaies :".$e->getMessage()); // "die" pour arrêter le Php - Le "." pour la contènation seulement.
            // $e->getMessage() : Méthode de l'objet.
        }

    ?>
</body>
</html>