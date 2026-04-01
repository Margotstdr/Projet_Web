<?php
session_start();
include 'db.php';

$erreur = '';

// ─── Traitement du formulaire ───────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // trim() supprime les espaces avant/après le login (utile quand on copie-colle)
    $login = trim($_POST['login'] ?? '');
    $mdp   = $_POST['mdp'] ?? '';

    if ($login && $mdp) {
        // Étudiants et enseignants sont dans deux tables séparées,
        // donc je dois tester les deux. J'essaie les étudiants en premier.

        // 1. Chercher dans les étudiants
        $stmt = $pdo->prepare("SELECT * FROM Etudiant WHERE login_etu = ?");
        $stmt->execute([$login]);
        $etu = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($etu && $mdp === $etu['mdp_etu']) {
            // Mot de passe comparé en clair (pas de hachage dans ce projet scolaire)
            // En production il faudrait utiliser password_hash() / password_verify()
            $_SESSION['user_id'] = $etu['id_etu'];
            $_SESSION['role']    = 'etudiant';
            $_SESSION['nom']     = $etu['prenom_etu'] . ' ' . $etu['nom_etu'];
            header('Location: accueil.php');
            exit();
        }

        // 2. Chercher dans les enseignants
        $stmt = $pdo->prepare("SELECT * FROM Enseignants WHERE login_ens = ?");
        $stmt->execute([$login]);
        $ens = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($ens && $mdp === $ens['mdp_ens']) {
            $_SESSION['user_id'] = $ens['id_ens'];
            $_SESSION['role']    = 'prof';
            $_SESSION['nom']     = $ens['prenom_ens'] . ' ' . $ens['nom_ens'];
            header('Location: accueil.php');
            exit();
        }

        $erreur = 'Identifiant ou mot de passe incorrect.';
    } else {
        $erreur = 'Veuillez remplir tous les champs.';
    }
}

// Si déjà connecté, inutile d'afficher la page de login → on redirige directement
if (isset($_SESSION['role'])) {
    header('Location: accueil.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — EFREI</title>
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="page-connexion">
        <div class="carte-connexion">
            <h1>Connexion</h1>
            <p class="sous-titre">Étudiants &amp; Enseignants</p>

            <?php if ($erreur): ?>
                <div class="message-erreur"><?= htmlspecialchars($erreur) ?></div>
            <?php endif; ?>

            <form method="POST" action="connexion.php">
                <div class="groupe">
                    <label for="login">Identifiant</label>
                    <!-- htmlspecialchars() pour re-remplir le champ sans risque XSS
                         (si quelqu'un entre <script> dans le login, ça s'affiche en texte) -->
                    <input type="text" id="login" name="login"
                           value="<?= htmlspecialchars($_POST['login'] ?? '') ?>"
                           placeholder="Votre login" required autofocus>
                </div>
                <div class="groupe">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" id="mdp" name="mdp"
                           placeholder="Votre mot de passe" required>
                </div>
                <button type="submit" class="btn-connexion">Se connecter</button>
            </form>

            <a href="accueil.php" class="lien-retour">← Retour à l'accueil</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
