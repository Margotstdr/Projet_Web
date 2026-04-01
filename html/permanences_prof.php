<?php
session_start();
include 'db.php';

// Réservé aux enseignants connectés
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'prof') {
    header('Location: connexion.php');
    exit();
}

$id_ens = (int)$_SESSION['user_id'];

// ─── Calcul de la semaine ────────────────────────────────────────────────────
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

$aujourdhui  = new DateTime();
$jourSemaine = (int)$aujourdhui->format('N');
$lundi       = clone $aujourdhui;
$lundi->modify('-' . ($jourSemaine - 1) . ' days');
$lundi->modify($offset . ' weeks');
$vendredi = clone $lundi;
$vendredi->modify('+4 days');

$nomJours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
$jours = [];
for ($i = 0; $i < 5; $i++) {
    $jour = clone $lundi;
    $jour->modify("+$i days");
    $jours[] = $jour;
}

$dateDebut = $lundi->format('Y-m-d');
$dateFin   = $vendredi->format('Y-m-d');

// ─── Traitement : suppression d'une permanence ───────────────────────────────
$msgAction = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'supprimer' && !empty($_POST['id_perm'])) {
        $idDel = (int)$_POST['id_perm'];
        // Sécurité importante : je vérifie que cette permanence appartient BIEN à ce prof
        // avant de supprimer → un prof ne peut pas supprimer les perms d'un collègue
        $stmtCheck = $pdo->prepare("SELECT id_perm FROM Permanence WHERE id_perm = ? AND id_ens_responsable = ?");
        $stmtCheck->execute([$idDel, $id_ens]);
        if ($stmtCheck->fetch()) {
            // La suppression en cascade (définie en BDD) efface aussi les lignes dans Inscrit et Presenter
            $pdo->prepare("DELETE FROM Permanence WHERE id_perm = ?")->execute([$idDel]);
            $msgAction = 'Permanence supprimée.';
        }
    }
}

// ─── Récupération permanences du prof sur la semaine ────────────────────────
$stmt = $pdo->prepare("
    SELECT p.*,
           COUNT(i.id_etu) AS nb_inscrits
    FROM Permanence p
    LEFT JOIN Inscrit i ON p.id_perm = i.id_perm
    WHERE p.id_ens_responsable = ?
      AND p.date_perm BETWEEN ? AND ?
    GROUP BY p.id_perm
    ORDER BY p.date_perm, p.heure_perm
");
$stmt->execute([$id_ens, $dateDebut, $dateFin]);
$toutesLesPerms = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ─── Map date → colonne CSS Grid ─────────────────────────────────────────────
$dateColMap = [];
foreach ($jours as $i => $jour) {
    $dateColMap[$jour->format('Y-m-d')] = $i + 2;
}

// ─── Titre de semaine ────────────────────────────────────────────────────────
$moisFr = [
    1=>'jan', 2=>'fév', 3=>'mars', 4=>'avr', 5=>'mai', 6=>'juin',
    7=>'juil', 8=>'août', 9=>'sep', 10=>'oct', 11=>'nov', 12=>'déc'
];
$moisFrLong = [
    1=>'janvier', 2=>'février', 3=>'mars', 4=>'avril', 5=>'mai', 6=>'juin',
    7=>'juillet', 8=>'août', 9=>'septembre', 10=>'octobre', 11=>'novembre', 12=>'décembre'
];
$jL = $lundi->format('j');
$jV = $vendredi->format('j');
$mL = $moisFrLong[(int)$lundi->format('n')];
$mV = $moisFrLong[(int)$vendredi->format('n')];
$an = $vendredi->format('Y');

$titreSemaine = ($lundi->format('n') === $vendredi->format('n'))
    ? "Semaine du $jL au $jV $mV $an"
    : "Semaine du $jL $mL au $jV $mV $an";

$offsetPrev    = $offset - 1;
$offsetNext    = $offset + 1;
$heureDebut    = 8;
$heureFin      = 19;
$aujourdhuiStr = (new DateTime())->format('Y-m-d');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes permanences — Enseignant</title>
    <link rel="stylesheet" href="../css/permanences.css">
    <link rel="stylesheet" href="../css/permanences_prof.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="agenda">
        <h1>Mes permanences</h1>
        <p class="titre-prof">Connecté en tant que <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong></p>

        <?php if ($msgAction): ?>
            <div class="msg-action"><?= htmlspecialchars($msgAction) ?></div>
        <?php endif; ?>

        <!-- Navigation semaine -->
        <div class="navigation-semaine">
            <a href="?offset=<?= $offsetPrev ?>">&#8249; Semaine précédente</a>
            <h2 class="titre-semaine"><?= htmlspecialchars($titreSemaine) ?></h2>
            <a href="?offset=<?= $offsetNext ?>">Semaine suivante &#8250;</a>
        </div>

        <!-- Grille agenda -->
        <div class="agenda-grille">

            <!-- Coin vide -->
            <div class="ag-corner"></div>

            <!-- En-têtes jours -->
            <?php foreach ($jours as $i => $jour): ?>
                <div class="ag-jour-header <?= $jour->format('Y-m-d') === $aujourdhuiStr ? 'ag-aujourd-hui' : '' ?>"
                     style="grid-column:<?= $i + 2 ?>;grid-row:1;">
                    <strong><?= $nomJours[$i] ?></strong>
                    <span><?= $jour->format('j') ?> <?= $moisFr[(int)$jour->format('n')] ?></span>
                </div>
            <?php endforeach; ?>

            <!-- Labels heures + cellules de fond -->
            <?php for ($h = $heureDebut; $h < $heureFin; $h++): ?>
                <?php $row = ($h - $heureDebut) + 2; ?>
                <div class="ag-heure-label" style="grid-column:1;grid-row:<?= $row ?>;"><?= $h ?>h</div>
                <?php for ($col = 2; $col <= 6; $col++): ?>
                    <div class="ag-slot" style="grid-column:<?= $col ?>;grid-row:<?= $row ?>;"></div>
                <?php endfor; ?>
            <?php endfor; ?>

            <!-- Permanences positionnées -->
            <?php foreach ($toutesLesPerms as $perm):
                $heureH = (int)substr($perm['heure_perm'], 0, 2);
                if ($heureH < $heureDebut || $heureH >= $heureFin) continue;
                $colIdx = $dateColMap[$perm['date_perm']] ?? null;
                if ($colIdx === null) continue;
                $rowIdx  = ($heureH - $heureDebut) + 2;

                $heureRaw = substr($perm['heure_perm'], 0, 5);
                [$hh, $mm] = explode(':', $heureRaw);
                $heureFinAff = sprintf('%02dh%02d', (int)$hh + 1, (int)$mm);
                $heureAff    = str_replace(':', 'h', $heureRaw) . ' – ' . $heureFinAff;

                $nb     = (int)$perm['nb_inscrits'];
                $idPerm = (int)$perm['id_perm'];
                $plein  = $nb >= 20;
            ?>
                <div class="permanence <?= $plein ? 'perm-complet' : '' ?>"
                     id="perm-<?= $idPerm ?>"
                     style="grid-column:<?= $colIdx ?>;grid-row:<?= $rowIdx ?>;">
                    <p class="perm-matiere"><?= htmlspecialchars($perm['matiere_perm']) ?></p>
                    <p class="perm-meta">Salle <?= htmlspecialchars($perm['salle_perm'] ?? 'N/A') ?> · <?= $nb ?>/20</p>
                    <span class="badge-inscrits <?= $plein ? 'plein' : '' ?>">
                        👥 <?= $nb ?> inscrit<?= $nb > 1 ? 's' : '' ?>
                    </span>
                    <div class="perm-actions">
                        <!-- addslashes() sur la matière : si elle contient une apostrophe (ex: "Maths L'avancé")
                             ça évite de casser le JS à l'intérieur de l'attribut onclick='...' -->
                        <button class="btn-voir"
                                onclick="ouvrirModal(<?= $idPerm ?>, '<?= htmlspecialchars(addslashes($perm['matiere_perm'])) ?>', '<?= $heureAff ?>')">
                            Inscrits
                        </button>
                        <form method="POST" style="display:inline;"
                              onsubmit="return confirm('Supprimer cette permanence ?');">
                            <input type="hidden" name="action"  value="supprimer">
                            <input type="hidden" name="id_perm" value="<?= $idPerm ?>">
                            <input type="hidden" name="offset"  value="<?= $offset ?>">
                            <button type="submit" class="btn-supprimer">Suppr.</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>

        </div><!-- fin .agenda-grille -->
    </div><!-- fin .agenda -->

    <!-- ── Modal : liste des étudiants inscrits ── -->
    <div class="modal-overlay" id="modal-overlay" onclick="fermerModal(event)">
        <div class="modal">
            <h2 id="modal-titre">Étudiants inscrits</h2>
            <ul id="modal-liste"></ul>
            <p id="modal-vide" class="modal-vide" style="display:none;">Aucun étudiant inscrit.</p>
            <button class="btn-fermer" onclick="fermerModal(null)">Fermer</button>
        </div>
    </div>

    <!-- Injection des données d'inscrits directement en JSON dans la page.
         Technique : PHP génère un objet JS { idPerm: [{nom, prenom, mail}, ...], ... }
         → la modale JS peut accéder aux étudiants sans faire de requête AJAX séparée -->
    <script>
    const inscritsData = <?php
        $idPerms     = array_column($toutesLesPerms, 'id_perm');
        $inscritsMap = [];

        if (!empty($idPerms)) {
            // array_fill(0, N, '?') + implode → génère "?,?,?" pour la clause IN
            // Nécessaire car PDO ne supporte pas les tableaux directement dans IN (?)
            $placeholders = implode(',', array_fill(0, count($idPerms), '?'));
            $stmtIns = $pdo->prepare("
                SELECT i.id_perm, e.nom_etu, e.prenom_etu, e.mail_etu
                FROM Inscrit i
                JOIN Etudiant e ON i.id_etu = e.id_etu
                WHERE i.id_perm IN ($placeholders)
                ORDER BY e.nom_etu, e.prenom_etu
            ");
            $stmtIns->execute($idPerms);
            // Je regroupe les résultats par id_perm : $inscritsMap[42] = [{...}, {...}]
            foreach ($stmtIns->fetchAll(PDO::FETCH_ASSOC) as $row) {
                $inscritsMap[$row['id_perm']][] = [
                    'nom'    => $row['nom_etu'],
                    'prenom' => $row['prenom_etu'],
                    'mail'   => $row['mail_etu'],
                ];
            }
        }
        echo json_encode($inscritsMap);
    ?>;
    </script>
    <script src="../js/permanences_prof.js"></script>

    <?php include 'footer.php'; ?>
</body>
</html>
