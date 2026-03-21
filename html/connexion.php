<?php
session_start();
include 'db.php';

$erreur = '';

// ─── Traitement du formulaire ───────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $mdp   = $_POST['mdp'] ?? '';

    if ($login && $mdp) {
        // 1. Chercher dans les étudiants
        $stmt = $pdo->prepare("SELECT * FROM Etudiant WHERE login_etu = ?");
        $stmt->execute([$login]);
        $etu = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($etu && $mdp === $etu['mdp_etu']) {
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

// Déjà connecté → accueil
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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            background:
                radial-gradient(ellipse 400px 140px at 12% 10%, rgba(255,255,255,0.95), transparent 65%),
                radial-gradient(ellipse 280px 100px at 54%  7%, rgba(255,255,255,0.90), transparent 62%),
                linear-gradient(180deg,
                    #a8e4fc  0%, #3fc8f8 14%, #0db5e8 28%,
                    #0197c8 42%, #0180b8 54%, #01a0c0 66%,
                    #009eb0 78%, #007890 100%);
            background-attachment: fixed;
        }

        .page-connexion {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
        }

        .carte-connexion {
            width: 100%;
            max-width: 420px;
            padding: 2.4rem 2.2rem 2rem;
            border-radius: 28px;
            position: relative;
            overflow: hidden;
            background: rgba(255,255,255,0.07);
            backdrop-filter: blur(28px) saturate(200%) brightness(1.12);
            -webkit-backdrop-filter: blur(28px) saturate(200%) brightness(1.12);
            border: 1px solid rgba(255,255,255,0.46);
            box-shadow:
                0 16px 48px rgba(0,100,160,0.22),
                0 0 0 1px rgba(120,220,255,0.12),
                0 1px 0 rgba(255,255,255,0.90) inset,
                0 -1px 0 rgba(100,220,255,0.20) inset;
        }

        .carte-connexion::before {
            content: '';
            position: absolute;
            inset: 0 0 65% 0;
            border-radius: 28px 28px 0 0;
            background: linear-gradient(180deg, rgba(255,255,255,0.55) 0%, transparent 100%);
            pointer-events: none;
        }

        .carte-connexion h1 {
            margin: 0 0 0.3rem;
            font-size: 1.7rem;
            font-weight: 900;
            text-align: center;
            position: relative;
            z-index: 1;
            background: linear-gradient(155deg, #e0f6ff 0%, #7dd8f8 30%, #1ab4f0 60%, #d0f0ff 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            filter: drop-shadow(0 2px 8px rgba(0,100,200,0.50));
        }

        .sous-titre {
            text-align: center;
            color: rgba(255,255,255,0.72);
            font-size: 0.85rem;
            margin: 0 0 1.8rem;
            position: relative;
            z-index: 1;
        }

        .groupe {
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .groupe label {
            display: block;
            font-size: 0.82rem;
            font-weight: 700;
            color: rgba(255,255,255,0.88);
            margin-bottom: 0.38rem;
        }

        .groupe input {
            width: 100%;
            padding: 0.65rem 1rem;
            border-radius: 14px;
            font-size: 0.9rem;
            font-family: inherit;
            color: #082030;
            outline: none;
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(255,255,255,0.62);
            box-shadow: 0 1px 0 rgba(255,255,255,0.80) inset, 0 2px 8px rgba(0,80,130,0.10);
            transition: background .15s, border-color .15s;
        }

        .groupe input:focus {
            background: rgba(255,255,255,0.88);
            border-color: rgba(0,160,220,0.55);
        }

        .message-erreur {
            background: rgba(255,80,80,0.18);
            border: 1px solid rgba(255,120,120,0.45);
            border-radius: 12px;
            padding: 0.6rem 1rem;
            margin-bottom: 1rem;
            font-size: 0.84rem;
            color: #ffe0e0;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .btn-connexion {
            width: 100%;
            padding: 0.70rem;
            border-radius: 999px;
            font-size: 0.95rem;
            font-weight: 800;
            font-family: inherit;
            cursor: pointer;
            border: 1px solid rgba(255,255,255,0.52);
            color: rgba(255,255,255,0.97);
            position: relative;
            z-index: 1;
            margin-top: 0.5rem;
            background: rgba(255,255,255,0.18);
            backdrop-filter: blur(14px);
            box-shadow:
                0 1px 0 rgba(255,255,255,0.75) inset,
                0 6px 20px rgba(0,100,160,0.26);
            transition: background .15s, transform .15s;
        }

        .btn-connexion:hover {
            background: rgba(255,255,255,0.28);
            transform: translateY(-2px);
        }

        .lien-retour {
            display: block;
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.82rem;
            color: rgba(255,255,255,0.70);
            text-decoration: none;
            position: relative;
            z-index: 1;
            transition: color .15s;
        }
        .lien-retour:hover { color: rgba(255,255,255,0.95); }
    </style>
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
