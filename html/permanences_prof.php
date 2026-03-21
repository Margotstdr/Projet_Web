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
        // Vérifier que c'est bien une permanence de ce prof
        $stmtCheck = $pdo->prepare("SELECT id_perm FROM Permanence WHERE id_perm = ? AND id_ens_responsable = ?");
        $stmtCheck->execute([$idDel, $id_ens]);
        if ($stmtCheck->fetch()) {
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

$permParJour = [];
foreach ($toutesLesPerms as $perm) {
    $permParJour[$perm['date_perm']][] = $perm;
}

// ─── Titre de semaine ────────────────────────────────────────────────────────
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
    <title>Mes permanences — Enseignant</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/permanences.css">
    <style>
        /* ── Extras spécifiques à la vue prof ── */
        .badge-inscrits {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            margin-top: 0.4rem;
            padding: 0.2rem 0.6rem;
            border-radius: 999px;
            font-size: 0.70rem;
            font-weight: 700;
            color: rgba(255,255,255,0.90);
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.32);
        }
        .badge-inscrits.plein {
            background: rgba(255,180,50,0.22);
            border-color: rgba(255,200,80,0.45);
            color: #fff8d0;
        }

        .btn-voir, .btn-supprimer {
            display: inline-block;
            margin-top: 0.4rem;
            margin-right: 0.3rem;
            padding: 0.25rem 0.65rem;
            border-radius: 999px;
            font-size: 0.70rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid rgba(255,255,255,0.40);
            font-family: inherit;
            transition: background .15s, transform .15s;
        }
        .btn-voir {
            color: rgba(255,255,255,0.95);
            background: rgba(255,255,255,0.14);
            box-shadow: 0 1px 0 rgba(255,255,255,0.65) inset;
        }
        .btn-voir:hover { background: rgba(255,255,255,0.24); transform: translateY(-1px); }

        .btn-supprimer {
            color: #ffe0e0;
            background: rgba(255,80,80,0.18);
            border-color: rgba(255,130,130,0.42);
        }
        .btn-supprimer:hover { background: rgba(255,80,80,0.30); transform: translateY(-1px); }

        /* Message action */
        .msg-action {
            text-align: center;
            padding: 0.6rem 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            font-size: 0.88rem;
            background: rgba(80,220,120,0.18);
            border: 1px solid rgba(100,220,140,0.42);
            color: #d0ffe0;
        }

        /* Modal étudiants inscrits */
        .modal-overlay {
            display: none;
            position: fixed; inset: 0;
            background: rgba(0,30,60,0.55);
            backdrop-filter: blur(6px);
            z-index: 500;
            align-items: center;
            justify-content: center;
        }
        .modal-overlay.open { display: flex; }

        .modal {
            width: 100%; max-width: 480px;
            padding: 2rem 1.8rem;
            border-radius: 24px;
            position: relative;
            background: rgba(10,60,130,0.70);
            backdrop-filter: blur(28px) saturate(200%);
            border: 1px solid rgba(255,255,255,0.36);
            box-shadow: 0 20px 60px rgba(0,60,140,0.40), 0 1px 0 rgba(255,255,255,0.80) inset;
        }

        .modal h2 {
            margin: 0 0 1rem;
            font-size: 1.1rem;
            font-weight: 800;
            color: #fff;
        }

        .modal ul {
            list-style: none;
            padding: 0; margin: 0 0 1.2rem;
            max-height: 260px;
            overflow-y: auto;
        }
        .modal ul li {
            padding: 0.5rem 0.7rem;
            border-radius: 10px;
            margin-bottom: 0.35rem;
            font-size: 0.86rem;
            color: rgba(255,255,255,0.90);
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.16);
        }
        .modal ul li span { color: rgba(200,230,255,0.75); font-size: 0.78rem; }

        .modal-vide { font-size: 0.88rem; color: rgba(255,255,255,0.60); margin-bottom: 1rem; }

        .btn-fermer {
            padding: 0.45rem 1.2rem;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            border: 1px solid rgba(255,255,255,0.42);
            color: rgba(255,255,255,0.92);
            background: rgba(255,255,255,0.14);
            transition: background .15s;
        }
        .btn-fermer:hover { background: rgba(255,255,255,0.24); }

        .titre-prof {
            text-align: center;
            color: rgba(255,255,255,0.75);
            font-size: 0.88rem;
            margin-bottom: 1.2rem;
        }
        .titre-prof strong { color: #fff; }
    </style>
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

        <!-- Grille -->
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
                        <p class="aucune-perm" style="color:rgba(255,255,255,0.50);font-size:0.78rem;text-align:center;">
                            Aucune permanence
                        </p>
                    <?php else: ?>
                        <?php foreach ($permsJour as $perm): ?>
                            <?php
                                $heureRaw = substr($perm['heure_perm'], 0, 5);
                                [$h, $m]  = explode(':', $heureRaw);
                                $heureFin = sprintf('%02dh%02d', (int)$h + 1, (int)$m);
                                $heureAff = str_replace(':', 'h', $heureRaw) . ' – ' . $heureFin;
                                $nb       = (int)$perm['nb_inscrits'];
                                $idPerm   = (int)$perm['id_perm'];
                            ?>
                            <div class="permanence" id="perm-<?= $idPerm ?>">
                                <p class="heure"><?= $heureAff ?></p>
                                <p class="matiere"><?= htmlspecialchars($perm['matiere_perm']) ?></p>
                                <p class="salle">Salle <?= htmlspecialchars($perm['salle_perm'] ?? 'N/A') ?></p>

                                <span class="badge-inscrits <?= $nb > 0 ? 'plein' : '' ?>">
                                    👥 <?= $nb ?> étudiant<?= $nb > 1 ? 's' : '' ?> inscrit<?= $nb > 1 ? 's' : '' ?>
                                </span>

                                <!-- Bouton voir les inscrits -->
                                <button class="btn-voir"
                                        onclick="ouvrirModal(<?= $idPerm ?>, '<?= htmlspecialchars(addslashes($perm['matiere_perm'])) ?>', '<?= $heureAff ?>')">
                                    Voir les inscrits
                                </button>

                                <!-- Bouton supprimer -->
                                <form method="POST" style="display:inline;"
                                      onsubmit="return confirm('Supprimer cette permanence ?');">
                                    <input type="hidden" name="action"  value="supprimer">
                                    <input type="hidden" name="id_perm" value="<?= $idPerm ?>">
                                    <input type="hidden" name="offset"  value="<?= $offset ?>">
                                    <button type="submit" class="btn-supprimer">Supprimer</button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div><!-- fin .grille-semaine -->
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

    <!-- Données JSON des inscrits pour chaque permanence -->
    <script>
    const inscritsData = <?php
        // Récupérer tous les inscrits pour les permanences de la semaine
        $idPerms = array_column($toutesLesPerms, 'id_perm');
        $inscritsMap = [];

        if (!empty($idPerms)) {
            $placeholders = implode(',', array_fill(0, count($idPerms), '?'));
            $stmtIns = $pdo->prepare("
                SELECT i.id_perm, e.nom_etu, e.prenom_etu, e.mail_etu
                FROM Inscrit i
                JOIN Etudiant e ON i.id_etu = e.id_etu
                WHERE i.id_perm IN ($placeholders)
                ORDER BY e.nom_etu, e.prenom_etu
            ");
            $stmtIns->execute($idPerms);
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

    function ouvrirModal(idPerm, matiere, heure) {
        document.getElementById('modal-titre').textContent = matiere + ' · ' + heure;
        const liste = document.getElementById('modal-liste');
        const vide  = document.getElementById('modal-vide');
        liste.innerHTML = '';
        const etudiants = inscritsData[idPerm] || [];

        if (etudiants.length === 0) {
            liste.style.display = 'none';
            vide.style.display  = 'block';
        } else {
            liste.style.display = 'block';
            vide.style.display  = 'none';
            etudiants.forEach(e => {
                const li = document.createElement('li');
                li.innerHTML = `<strong>${e.prenom} ${e.nom}</strong><br><span>${e.mail}</span>`;
                liste.appendChild(li);
            });
        }
        document.getElementById('modal-overlay').classList.add('open');
    }

    function fermerModal(event) {
        if (event === null || event.target === document.getElementById('modal-overlay')) {
            document.getElementById('modal-overlay').classList.remove('open');
        }
    }

    // Fermer avec Échap
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') fermerModal(null);
    });
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>
