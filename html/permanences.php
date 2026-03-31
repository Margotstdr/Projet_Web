<?php
    session_start();
    include 'db.php';

    // ─── Accès réservé aux étudiants connectés ─────────────────────────────────
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'etudiant') {
        header('Location: connexion.php');
        exit();
    }

    // ─── Calcul de la semaine à afficher ───────────────────────────────────────
    $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

    $aujourdhui  = new DateTime();
    $jourSemaine = (int)$aujourdhui->format('N');
    $lundi       = clone $aujourdhui;
    $lundi->modify('-' . ($jourSemaine - 1) . ' days');
    $lundi->modify($offset . ' weeks');
    $vendredi = clone $lundi;
    $vendredi->modify('+4 days');

    $nomJours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
    $jours    = [];
    for ($i = 0; $i < 5; $i++) {
        $jour = clone $lundi;
        $jour->modify("+$i days");
        $jours[] = $jour;
    }

    // ─── Récupération des permanences en BDD ───────────────────────────────────
    $dateDebut = $lundi->format('Y-m-d');
    $dateFin   = $vendredi->format('Y-m-d');

    $stmt = $pdo->prepare("
        SELECT p.id_perm, p.matiere_perm, p.heure_perm, p.salle_perm, p.date_perm,
            e.nom_ens, e.prenom_ens,
            COUNT(i.id_etu) AS nb_inscrits
        FROM Permanence p
        LEFT JOIN Enseignants e ON p.id_ens_responsable = e.id_ens
        LEFT JOIN Inscrit i ON p.id_perm = i.id_perm
        WHERE p.date_perm BETWEEN ? AND ?
        GROUP BY p.id_perm
        ORDER BY p.date_perm, p.heure_perm
    ");
    $stmt->execute([$dateDebut, $dateFin]);
    $toutesLesPerms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ─── Étudiant connecté + ses inscriptions ──────────────────────────────────
    $estEtudiant  = true; // garanti par le check au début
    $id_etu       = (int)$_SESSION['user_id'];
    $stmtInsc     = $pdo->prepare("SELECT id_perm FROM Inscrit WHERE id_etu = ?");
    $stmtInsc->execute([$id_etu]);
    $inscritPerms = array_column($stmtInsc->fetchAll(PDO::FETCH_ASSOC), 'id_perm');

    // ─── Map date → colonne CSS Grid (col 2 à 6) ───────────────────────────────
    $dateColMap = [];
    foreach ($jours as $i => $jour) {
        $dateColMap[$jour->format('Y-m-d')] = $i + 2;
    }

    // ─── Titre de la semaine ───────────────────────────────────────────────────
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
    $heureFin      = 19;   // créneaux de 8h à 18h inclus
    $aujourdhuiStr = (new DateTime())->format('Y-m-d');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permanences</title>
    <link rel="stylesheet" href="../css/permanences.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="agenda">

        <h1>Permanences</h1>

        <div class="lien-mes-perms">
            <a href="liste_perm_etudiant.php" class="btn-mes-perms">Mes inscriptions</a>
        </div>

        <!-- Navigation entre semaines -->
        <div class="navigation-semaine">
            <a href="?offset=<?= $offsetPrev ?>">&#8249; Semaine précédente</a>
            <h2 class="titre-semaine"><?= htmlspecialchars($titreSemaine) ?></h2>
            <a href="?offset=<?= $offsetNext ?>">Semaine suivante &#8250;</a>
        </div>

        <!-- Grille agenda -->
        <div class="agenda-grille">

            <!-- Coin vide haut-gauche -->
            <div class="ag-corner"></div>

            <!-- En-têtes des jours (ligne 1, col 2-6) -->
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

                $nb      = (int)$perm['nb_inscrits'];
                $complet = $nb >= 20;
                $idPerm  = (int)$perm['id_perm'];
                $dejains = in_array($idPerm, $inscritPerms);
                $matiere = htmlspecialchars($perm['matiere_perm']);
                $prof    = htmlspecialchars($perm['prenom_ens'] . ' ' . $perm['nom_ens']);
                $salle   = htmlspecialchars($perm['salle_perm'] ?? 'N/A');
                $restant = 20 - $nb;

                $classe = 'permanence';
                if ($dejains) $classe .= ' perm-inscrit';
                elseif ($complet) $classe .= ' perm-complet';
            ?>
                <div class="<?= $classe ?>"
                     style="grid-column:<?= $colIdx ?>;grid-row:<?= $rowIdx ?>;">
                    <p class="perm-matiere"><?= $matiere ?></p>
                    <p class="perm-prof"><?= $prof ?></p>
                    <p class="perm-meta">Salle <?= $salle ?> · <?= $nb ?>/20<?= $complet ? ' · Complet' : " · $restant pl." ?></p>
                    <?php if ($dejains): ?>
                        <span class="perm-badge inscrit-badge">✓ Inscrit</span>
                    <?php elseif ($complet): ?>
                        <span class="perm-badge complet-badge">Complet</span>
                    <?php else: ?>
                        <a href="inscription.php?id_perm=<?= $idPerm ?>" class="btn-inscrire">S'inscrire</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div><!-- fin .agenda-grille -->

    </div><!-- fin .agenda -->

    <?php include 'footer.php'; ?>

</body>
</html>
