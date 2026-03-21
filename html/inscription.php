<?php
session_start();
include 'db.php';

// Seuls les étudiants connectés peuvent s'inscrire
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'etudiant') {
    header('Location: connexion.php');
    exit();
}

$id_etu  = (int)$_SESSION['user_id'];
$id_perm = isset($_GET['id_perm']) ? (int)$_GET['id_perm'] : 0;

if (!$id_perm) {
    header('Location: permanences.php');
    exit();
}

// Récupérer les infos de la permanence
$stmt = $pdo->prepare("
    SELECT p.*, e.nom_ens, e.prenom_ens
    FROM Permanence p
    LEFT JOIN Enseignants e ON p.id_ens_responsable = e.id_ens
    WHERE p.id_perm = ?
");
$stmt->execute([$id_perm]);
$perm = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$perm) {
    header('Location: permanences.php');
    exit();
}

// Vérifier si déjà inscrit
$stmtCheck = $pdo->prepare("SELECT 1 FROM Inscrit WHERE id_etu = ? AND id_perm = ?");
$stmtCheck->execute([$id_etu, $id_perm]);
$dejaInscrit = (bool)$stmtCheck->fetch();

$message = '';
$succes  = false;

// Traitement de l'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$dejaInscrit) {
    try {
        $ins = $pdo->prepare("INSERT INTO Inscrit (id_etu, id_perm) VALUES (?, ?)");
        $ins->execute([$id_etu, $id_perm]);
        $succes  = true;
        $message = 'Inscription confirmée !';
        $dejaInscrit = true;
    } catch (Exception $e) {
        $message = 'Tu es déjà inscrit à cette permanence.';
    }
}

// Formatage
$moisFr = [
    1=>'janvier', 2=>'février', 3=>'mars', 4=>'avril', 5=>'mai', 6=>'juin',
    7=>'juillet', 8=>'août', 9=>'septembre', 10=>'octobre', 11=>'novembre', 12=>'décembre'
];
$dateObj   = new DateTime($perm['date_perm']);
$dateAff   = $dateObj->format('j') . ' ' . $moisFr[(int)$dateObj->format('n')] . ' ' . $dateObj->format('Y');
$heureRaw  = substr($perm['heure_perm'], 0, 5);
[$h, $m]   = explode(':', $heureRaw);
$heureFin  = sprintf('%02dh%02d', (int)$h + 1, (int)$m);
$heureAff  = str_replace(':', 'h', $heureRaw) . ' – ' . $heureFin;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription — Permanence</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background:
                radial-gradient(ellipse 400px 140px at 12% 10%, rgba(255,255,255,0.95), transparent 65%),
                linear-gradient(180deg,
                    #a8e4fc 0%, #3fc8f8 14%, #0db5e8 28%,
                    #0197c8 42%, #0180b8 54%, #01a0c0 66%,
                    #009eb0 78%, #007890 100%);
            background-attachment: fixed;
        }
        .page { flex: 1; display: flex; align-items: center; justify-content: center; padding: 3rem 1rem; }
        .carte {
            width: 100%; max-width: 480px;
            padding: 2.2rem 2rem;
            border-radius: 28px; position: relative; overflow: hidden;
            background: rgba(255,255,255,0.07);
            backdrop-filter: blur(28px) saturate(200%) brightness(1.12);
            -webkit-backdrop-filter: blur(28px) saturate(200%) brightness(1.12);
            border: 1px solid rgba(255,255,255,0.46);
            box-shadow: 0 16px 48px rgba(0,100,160,0.22), 0 1px 0 rgba(255,255,255,0.90) inset;
        }
        .carte::before {
            content: ''; position: absolute; inset: 0 0 65% 0;
            border-radius: 28px 28px 0 0;
            background: linear-gradient(180deg, rgba(255,255,255,0.52) 0%, transparent 100%);
            pointer-events: none;
        }
        h1 { margin: 0 0 1.4rem; font-size: 1.4rem; font-weight: 900; color: #fff;
            text-shadow: 0 2px 8px rgba(0,80,160,0.40); position: relative; z-index: 1; }
        .infos-perm { margin-bottom: 1.4rem; position: relative; z-index: 1; }
        .infos-perm p { margin: 0.3rem 0; font-size: 0.9rem; color: rgba(255,255,255,0.88); }
        .infos-perm strong { color: #fff; }
        .message {
            padding: 0.7rem 1rem; border-radius: 12px; margin-bottom: 1rem;
            font-size: 0.88rem; text-align: center; position: relative; z-index: 1;
        }
        .message.succes  { background: rgba(80,220,120,0.20); border: 1px solid rgba(100,220,140,0.45); color: #d0ffe0; }
        .message.erreur  { background: rgba(255,80,80,0.18);  border: 1px solid rgba(255,120,120,0.45); color: #ffe0e0; }
        .btn {
            display: inline-block; padding: 0.65rem 1.6rem;
            border-radius: 999px; font-size: 0.92rem; font-weight: 800;
            font-family: inherit; cursor: pointer;
            border: 1px solid rgba(255,255,255,0.52); color: rgba(255,255,255,0.97);
            background: rgba(255,255,255,0.18); backdrop-filter: blur(14px);
            box-shadow: 0 1px 0 rgba(255,255,255,0.75) inset, 0 6px 20px rgba(0,100,160,0.26);
            transition: background .15s, transform .15s; text-decoration: none;
            position: relative; z-index: 1;
        }
        .btn:hover { background: rgba(255,255,255,0.28); transform: translateY(-2px); }
        .btn-retour { margin-top: 1rem; display: block; text-align: center;
            font-size: 0.82rem; color: rgba(255,255,255,0.70); text-decoration: none;
            position: relative; z-index: 1; transition: color .15s; }
        .btn-retour:hover { color: #fff; }
        .badge-inscrit {
            display: inline-block; padding: 0.4rem 1rem; border-radius: 999px;
            font-size: 0.82rem; font-weight: 700; position: relative; z-index: 1;
            background: rgba(80,220,120,0.22); border: 1px solid rgba(100,220,140,0.45);
            color: #d0ffe0;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="page">
        <div class="carte">
            <h1>Inscription à la permanence</h1>

            <div class="infos-perm">
                <p><strong>Matière :</strong> <?= htmlspecialchars($perm['matiere_perm']) ?></p>
                <p><strong>Enseignant :</strong> <?= htmlspecialchars($perm['prenom_ens'] . ' ' . $perm['nom_ens']) ?></p>
                <p><strong>Date :</strong> <?= $dateAff ?></p>
                <p><strong>Horaire :</strong> <?= $heureAff ?></p>
                <p><strong>Salle :</strong> <?= htmlspecialchars($perm['salle_perm'] ?? 'N/A') ?></p>
            </div>

            <?php if ($message): ?>
                <div class="message <?= $succes ? 'succes' : 'erreur' ?>"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <?php if ($dejaInscrit && !$succes): ?>
                <span class="badge-inscrit">✓ Déjà inscrit à cette permanence</span>
            <?php elseif (!$dejaInscrit): ?>
                <form method="POST">
                    <button type="submit" class="btn">Confirmer l'inscription</button>
                </form>
            <?php endif; ?>

            <a href="permanences.php" class="btn-retour">← Retour au calendrier</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
