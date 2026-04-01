<?php
// Connexion à la base de données via PDO.
// J'inclus ce fichier dans chaque page qui a besoin d'accéder à la BDD ($pdo sera disponible).
try {
    $pdo = new PDO(
        // Port 8889 = port MySQL par défaut de MAMP sur Mac (différent du 3306 standard)
        'mysql:host=localhost;port=8889;dbname=compte_utilisateur;charset=utf8',
        'root',   // identifiants par défaut de MAMP — à ne JAMAIS utiliser en production
        'root',
        // ERRMODE_EXCEPTION : si une requête SQL échoue, PHP lève une exception
        // au lieu de continuer silencieusement avec un résultat faux
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    // Si la BDD est inaccessible, on arrête tout et on affiche l'erreur
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
