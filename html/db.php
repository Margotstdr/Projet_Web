<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;port=8889;dbname=compte_utilisateur;charset=utf8',
        'root',
        'root',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
