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

    // Trouver le lundi de la semaine actuelle
    $aujourdhui  = new DateTime();
    $jourSemaine = (int)$aujourdhui->format('N'); // 1 = lundi … 7 = dimanche
    $lundi       = clone $aujourdhui;
    $lundi->modify('-' . ($jourSemaine - 1) . ' days');

    // Appliquer l'offset en semaines
    $lundi->modify($offset . ' weeks');
    $vendredi = clone $lundi;
    $vendredi->modify('+4 days');

    // Tableau des 5 jours
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
            e.nom_ens, e.prenom_ens
        FROM Permanence p
        LEFT JOIN Enseignants e ON p.id_ens_responsable = e.id_ens
        WHERE p.date_perm BETWEEN ? AND ?
        ORDER BY p.date_perm, p.heure_perm
    ");
    $stmt->execute([$dateDebut, $dateFin]);
    $toutesLesPerms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Grouper par date
    $permParJour = [];
    foreach ($toutesLesPerms as $perm) {
        $permParJour[$perm['date_perm']][] = $perm;
    }

    // ─── Étudiant connecté ? ───────────────────────────────────────────────────
    $estEtudiant = isset($_SESSION['role']) && $_SESSION['role'] === 'etudiant';

    // ─── Titre de la semaine ───────────────────────────────────────────────────
    $moisFr = [
        1=>'janvier', 2=>'février', 3=>'mars', 4=>'avril', 5=>'mai', 6=>'juin',
        7=>'juillet', 8=>'août', 9=>'septembre', 10=>'octobre', 11=>'novembre', 12=>'décembre'
    ];
    $jL = $lundi->format('j');
    $jV = $vendredi->format('j');
    $mL = $moisFr[(int)$lundi->format('n')];
    $mV = $moisFr[(int)$vendredi->format('n')];
    $an = $vendredi->format('Y');

    $titreSemaine = ($lundi->format('n') === $vendredi->format('n'))
        ? "Semaine du $jL au $jV $mV $an"
        : "Semaine du $jL $mL au $jV $mV $an";

    $offsetPrev = $offset - 1;
    $offsetNext = $offset + 1;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permanences</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/permanences.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="agenda">

        <h1>Permanences</h1>

        <!-- Navigation entre semaines -->
        <div class="navigation-semaine">
            <a href="?offset=<?= $offsetPrev ?>" class="semaine-precedente">&#8249; Semaine précédente</a>
            <h2 class="titre-semaine"><?= htmlspecialchars($titreSemaine) ?></h2>
            <a href="?offset=<?= $offsetNext ?>" class="semaine-suivante">Semaine suivante &#8250;</a>
        </div>

        <!-- Grille des jours -->
        <div class="grille-semaine">

            <?php foreach ($jours as $i => $jour): ?>
                <?php
                    $dateStr   = $jour->format('Y-m-d');
                    $jourNum   = $jour->format('j');
                    $moisNom   = $moisFr[(int)$jour->format('n')];
                    $permsJour = $permParJour[$dateStr] ?? [];
                    $idJour    = strtolower($nomJours[$i]);
                ?>
                <div class="jour" id="<?= $idJour ?>">
                    <h3><?= $nomJours[$i] ?> <?= $jourNum ?> <?= $moisNom ?></h3>

                    <?php if (empty($permsJour)): ?>
                        <p class="aucune-perm">Aucune permanence</p>

                    <?php else: ?>
                        <?php foreach ($permsJour as $perm): ?>
                            <?php
                                // Heure affichée : "08h00 – 09h00"
                                $heureRaw = substr($perm['heure_perm'], 0, 5);
                                [$h, $m]  = explode(':', $heureRaw);
                                $heureFin = sprintf('%02dh%02d', (int)$h + 1, (int)$m);
                                $heureAff = str_replace(':', 'h', $heureRaw) . ' – ' . $heureFin;

                                $prof    = htmlspecialchars($perm['prenom_ens'] . ' ' . $perm['nom_ens']);
                                $matiere = htmlspecialchars($perm['matiere_perm']);
                                $salle   = htmlspecialchars($perm['salle_perm'] ?? 'N/A');
                                $idPerm  = (int)$perm['id_perm'];
                            ?>
                            <div class="permanence" id="perm-<?= $idPerm ?>">
                                <p class="heure"><?= $heureAff ?></p>
                                <p class="matiere"><?= $matiere ?></p>
                                <p class="prof"><?= $prof ?></p>
                                <p class="salle">Salle <?= $salle ?></p>
                                <?php if ($estEtudiant): ?>
                                    <a href="inscription.php?id_perm=<?= $idPerm ?>" class="btn-inscrire">S'inscrire</a>
                                <?php else: ?>
                                    <a href="connexion.php" class="btn-inscrire">Se connecter pour s'inscrire</a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div><!-- fin .grille-semaine -->

    </div><!-- fin .agenda -->

    <?php include 'footer.php'; ?>

</body>
</html>
