<?php
    try {
        // Paramètres de connexion à la base de données
        $host = 'localhost'; // Adresse de l'hôte MySQL
        $dbname = 'emploienv'; // Nom de la base de données
        $user = 'root'; // Nom d'utilisateur
        $password = ''; // Mot de passe (dans ce cas, pas de mot de passe)

        // Création de l'objet PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        // Configuration de PDO pour générer des exceptions en cas d'erreur SQL
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // En cas d'erreur de connexion
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }