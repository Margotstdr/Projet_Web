<?php
session_start();
include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'etudiant') {
    header('Location: connexion.php');
    exit();
}

$id_etu = (int)$_SESSION['user_id'];

$message = '';
$succes  = false;

// ─── Traitement : désinscription ─────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'desinscrire') {
    $id_perm = (int)($_POST['id_perm'] ?? 0);
    if ($id_perm) {
        $del = $pdo->prepare("DELETE FROM Inscrit WHERE id_etu = ? AND id_perm = ?");
        $del->execute([$id_etu, $id_perm]);
        $succes  = true;
        $message = 'Désinscription effectuée.';
    }
}

// ─── Récupération des permanences de l'étudiant ──────────────────────────────
$stmt = $pdo->prepare("
    SELECT p.id_perm, p.matiere_perm, p.heure_perm, p.salle_perm, p.date_perm,
           e.nom_ens, e.prenom_ens,
           COUNT(i2.id_etu) AS nb_inscrits
    FROM Inscrit i
    JOIN Permanence p ON i.id_perm = p.id_perm
    LEFT JOIN Enseignants e ON p.id_ens_responsable = e.id_ens
    LEFT JOIN Inscrit i2 ON p.id_perm = i2.id_perm
    WHERE i.id_etu = ?
    GROUP BY p.id_perm
    ORDER BY p.date_perm, p.heure_perm
");
$stmt->execute([$id_etu]);
$mesPermanences = $stmt->fetchAll(PDO::FETCH_ASSOC);

$moisFr = [
    1=>'janvier', 2=>'février', 3=>'mars', 4=>'avril', 5=>'mai', 6=>'juin',
    7=>'juillet', 8=>'août', 9=>'septembre', 10=>'octobre', 11=>'novembre', 12=>'décembre'
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes permanences</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/liste_perm_etudiant.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="page-mes-perms">
        <div class="container-mes-perms">
            <h1>Mes permanences</h1>
            <p class="sous-titre">Connecté en tant que <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong></p>

            <?php if ($message): ?>
                <div class="message <?= $succes ? 'succes' : 'erreur' ?>"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <?php if (empty($mesPermanences)): ?>
                <p class="aucune">Tu n'es inscrit à aucune permanence pour le moment.</p>
                <a href="permanences.php" class="btn-retour">← Voir les permanences disponibles</a>
            <?php else: ?>
                <div class="liste-perms">
                    <?php foreach ($mesPermanences as $perm): ?>
                        <?php
                            $dateObj  = new DateTime($perm['date_perm']);
                            $dateAff  = $dateObj->format('j') . ' ' . $moisFr[(int)$dateObj->format('n')] . ' ' . $dateObj->format('Y');
                            $heureRaw = substr($perm['heure_perm'], 0, 5);
                            [$h, $m]  = explode(':', $heureRaw);
                            $heureFin = sprintf('%02dh%02d', (int)$h + 1, (int)$m);
                            $heureAff = str_replace(':', 'h', $heureRaw) . ' – ' . $heureFin;
                            $nb       = (int)$perm['nb_inscrits'];
                        ?>
                        <div class="carte-perm">
                            <div class="carte-perm-infos">
                                <p class="carte-matiere"><?= htmlspecialchars($perm['matiere_perm']) ?></p>
                                <p class="carte-detail"><span>Enseignant</span><?= htmlspecialchars($perm['prenom_ens'] . ' ' . $perm['nom_ens']) ?></p>
                                <p class="carte-detail"><span>Date</span><?= $dateAff ?></p>
                                <p class="carte-detail"><span>Horaire</span><?= $heureAff ?></p>
                                <p class="carte-detail"><span>Salle</span><?= htmlspecialchars($perm['salle_perm'] ?? 'N/A') ?></p>
                                <p class="carte-detail"><span>Inscrits</span><?= $nb ?>/20</p>
                            </div>
                            <form method="POST" class="form-desinscrire"
                                  onsubmit="return confirm('Se désinscrire de cette permanence ?');">
                                <input type="hidden" name="action"  value="desinscrire">
                                <input type="hidden" name="id_perm" value="<?= (int)$perm['id_perm'] ?>">
                                <button type="submit" class="btn-desinscrire">Se désinscrire</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="permanences.php" class="btn-retour">← Voir toutes les permanences</a>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
