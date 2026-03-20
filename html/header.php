<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$role = $_SESSION['role'] ?? null;
$nom  = $_SESSION['nom']  ?? null;

// Lien permanences selon le rôle
$lienPerm = ($role === 'prof') ? 'permanences_prof.php' : 'permanences.php';
?>
<link rel="stylesheet" href="../css/header.css">

<header class="header">
    <div class="logo">
        <img src="../data/img/logo.svg" alt="Logo de l'EFREI" class="logo-image">
    </div>

    <nav class="nav">
        <a href="accueil.php">Accueil</a>

        <?php if ($role !== 'prof'): ?>
            <a href="cours.php">Cours + formations</a>
            <a href="enseignants.php">Enseignants</a>
            <a href="quiz.php">Quiz formation</a>
            <a href="plan.php">Plan interactif</a>
        <?php endif; ?>

        <?php if ($role): ?>
            <a href="<?= $lienPerm ?>">Permanences</a>
        <?php else: ?>
            <a href="permanences.php">Permanences</a>
        <?php endif; ?>

        <?php if ($role): ?>
            <a href="deconnexion.php" style="background:rgba(255,80,80,0.22); border-color:rgba(255,150,150,0.50);">
                <?= htmlspecialchars($nom) ?> · Déconnexion
            </a>
        <?php else: ?>
            <a href="connexion.php" style="background:rgba(255,255,255,0.30); border-color:rgba(255,255,255,0.70);">
                Connexion
            </a>
        <?php endif; ?>
    </nav>
</header>
