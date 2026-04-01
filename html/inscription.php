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

// Récupérer les infos de la permanence avec le nom de l'enseignant en même temps
// LEFT JOIN car en théorie l'enseignant pourrait ne plus exister en BDD
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

// Compter le nombre d'inscrits
$stmtCount = $pdo->prepare("SELECT COUNT(*) FROM Inscrit WHERE id_perm = ?");
$stmtCount->execute([$id_perm]);
$nbInscrits = (int)$stmtCount->fetchColumn();
$complet = $nbInscrits >= 20;

$message = '';
$succes  = false;

// Traitement de l'inscription (seulement si POST et pas encore inscrit)
// Je vérifie côté serveur même si le bouton est caché en HTML :
// on ne fait jamais confiance au client (quelqu'un pourrait forger une requête POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$dejaInscrit) {
    if ($complet) {
        $message = 'Cette permanence est complète (20/20 élèves).';
    } else {
        try {
            $ins = $pdo->prepare("INSERT INTO Inscrit (id_etu, id_perm) VALUES (?, ?)");
            $ins->execute([$id_etu, $id_perm]);
            // Le try/catch gère le cas d'un double-clic ou double-envoi :
            // la clé primaire composite (id_etu, id_perm) empêche les doublons en BDD,
            // ce qui lèverait une PDOException qu'on attrape ici proprement
            $succes  = true;
            $message = 'Inscription confirmée !';
            $dejaInscrit = true;
            $nbInscrits++;
        } catch (Exception $e) {
            $message = 'Tu es déjà inscrit à cette permanence.';
        }
    }
}

// Formatage de la date et de l'heure pour l'affichage
$moisFr = [
    1=>'janvier', 2=>'février', 3=>'mars', 4=>'avril', 5=>'mai', 6=>'juin',
    7=>'juillet', 8=>'août', 9=>'septembre', 10=>'octobre', 11=>'novembre', 12=>'décembre'
];
$dateObj   = new DateTime($perm['date_perm']);
$dateAff   = $dateObj->format('j') . ' ' . $moisFr[(int)$dateObj->format('n')] . ' ' . $dateObj->format('Y');
$heureRaw  = substr($perm['heure_perm'], 0, 5);   // "09:00:00" → "09:00"
[$h, $m]   = explode(':', $heureRaw);
// sprintf('%02dh%02d', ...) : formatage avec zéro devant si nécessaire (ex: 9 → "09h00")
// Les permanences durent 1h, donc heure de fin = heure de début + 1
$heureFin  = sprintf('%02dh%02d', (int)$h + 1, (int)$m);
$heureAff  = str_replace(':', 'h', $heureRaw) . ' – ' . $heureFin;  // ex: "09h00 – 10h00"
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription — Permanence</title>
    <link rel="stylesheet" href="../css/inscription.css">
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
                <p><strong>Places :</strong> <?= $nbInscrits ?>/20
                    <?php if ($complet): ?>
                        <span style="color:#ffb0b0;font-size:0.85em;">— Complet</span>
                    <?php else: ?>
                        <span style="color:rgba(255,255,255,0.65);font-size:0.85em;">— <?= 20 - $nbInscrits ?> place<?= (20 - $nbInscrits) > 1 ? 's' : '' ?> restante<?= (20 - $nbInscrits) > 1 ? 's' : '' ?></span>
                    <?php endif; ?>
                </p>
            </div>

            <?php if ($message): ?>
                <div class="message <?= $succes ? 'succes' : 'erreur' ?>"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <?php if ($dejaInscrit && !$succes): ?>
                <span class="badge-inscrit">✓ Déjà inscrit à cette permanence</span>
            <?php elseif ($complet && !$dejaInscrit): ?>
                <span class="badge-inscrit" style="background:rgba(255,80,80,0.22);border-color:rgba(255,130,130,0.45);color:#ffe0e0;">Permanence complète</span>
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
