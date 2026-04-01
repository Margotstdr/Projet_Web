<?php
// Ce fichier est inclus en haut de chaque page via include 'header.php'
// Il gère la navigation et les bulles de fond animées.

// session_status() === PHP_SESSION_NONE : je vérifie avant de démarrer
// pour éviter l'erreur "session already started" si une autre page l'a déjà lancée
if (session_status() === PHP_SESSION_NONE) session_start();

$role = $_SESSION['role'] ?? null;  // 'etudiant', 'prof', ou null si non connecté
$nom  = $_SESSION['nom']  ?? null;

// Le lien "Permanences" dans la nav pointe vers une page différente selon le rôle :
// - étudiant → agenda pour s'inscrire
// - prof → agenda pour gérer ses propres permanences
$lienPerm = ($role === 'prof') ? 'permanences_prof.php' : 'permanences.php';
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/background.css">
<link rel="stylesheet" href="../css/header.css">

<!-- Bulles animées en arrière-plan — purement décoratif (aria-hidden pour les lecteurs d'écran) -->
<!-- L'animation est définie dans background.css, chaque bb-N a une taille et vitesse différente -->
<div class="bg-bubbles" aria-hidden="true">
    <div class="bb bb-1"></div>
    <div class="bb bb-2"></div>
    <div class="bb bb-3"></div>
    <div class="bb bb-4"></div>
    <div class="bb bb-5"></div>
    <div class="bb bb-6"></div>
    <div class="bb bb-7"></div>
    <div class="bb bb-8"></div>
    <div class="bb bb-9"></div>
    <div class="bb bb-10"></div>
    <div class="bb bb-11"></div>
    <div class="bb bb-12"></div>
    <div class="bb bb-13"></div>
    <div class="bb bb-14"></div>
    <div class="bb bb-15"></div>
    <div class="bb bb-16"></div>
    <div class="bb bb-17"></div>
</div>

<header class="header">
    <div class="logo">
        <img src="../data/img/logo.svg" alt="Logo de l'EFREI" class="logo-image">
    </div>

    <nav class="nav">
        <a href="accueil.php">Accueil</a>

        <a href="cours.php">Cours + formations</a>
        <a href="enseignants.php">Enseignants</a>
        <a href="quiz.php">Quiz formation</a>
        <a href="plan.php">Plan interactif</a>

        <?php if ($role): ?>
            <a href="<?= $lienPerm ?>">Permanences</a>
        <?php else: ?>
            <a href="permanences.php">Permanences</a>
        <?php endif; ?>

        <?php if ($role): ?>
            <!-- Connecté : bouton rouge avec le prénom + "Déconnexion" -->
            <a href="deconnexion.php" style="background:rgba(255,80,80,0.22); border-color:rgba(255,150,150,0.50);">
                <?= htmlspecialchars($nom) ?> · Déconnexion
            </a>
        <?php else: ?>
            <!-- Non connecté : bouton blanc neutre -->
            <a href="connexion.php" style="background:rgba(255,255,255,0.30); border-color:rgba(255,255,255,0.70);">
                Connexion
            </a>
        <?php endif; ?>
    </nav>
</header>
