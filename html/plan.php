<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan interactif — Campus EFREI</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/plan.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="plan-page">

        <h1>Campus <span>EFREI</span></h1>
        <p class="plan-sous-titre">Paris Panthéon-Assas Université</p>

        <!-- ── Carte ── -->
        <div class="carte-campus">

            <!-- Bâtiment A -->
            <div class="bat bat-a" data-bat="a" tabindex="0">
                <span class="bat-lettre">A</span>
                <span class="bat-sub">Amphi A</span>
                <span class="bat-sub">Accueil</span>
                <span class="bat-sub">Crous<br>Sous-Sol</span>
            </div>

            <!-- Innovation'Lab (I) -->
            <div class="bat bat-i" data-bat="i" tabindex="0">
                <span class="bat-lettre-sm">I</span>
                <span class="bat-nom">Innovation'Lab</span>
            </div>

            <!-- Bâtiment B -->
            <div class="bat bat-b" data-bat="b" tabindex="0">
                <span class="bat-lettre">B</span>
            </div>

            <!-- Bâtiment C -->
            <div class="bat bat-c" data-bat="c" tabindex="0">
                <span class="bat-lettre-sm">C</span>
                <span class="bat-amphi">Amphi C</span>
            </div>

            <!-- Amphi E1 -->
            <div class="bat bat-e1" data-bat="e1" tabindex="0">
                <span class="bat-vertical">Amphi E1</span>
            </div>

            <!-- Amphi E2 -->
            <div class="bat bat-e2" data-bat="e2" tabindex="0">
                <span class="bat-nom">Amphi E2</span>
            </div>

            <!-- Bâtiment D -->
            <div class="bat bat-d" data-bat="d" tabindex="0">
                <span class="bat-lettre">D</span>
            </div>

            <!-- Bâtiment E -->
            <div class="bat bat-e" data-bat="e" tabindex="0">
                <span class="bat-lettre">E</span>
            </div>

            <!-- K'Fet -->
            <div class="bat bat-kfet" data-bat="kfet" tabindex="0">
                <span class="bat-nom">K'Fet</span>
            </div>

            <!-- Student Hub (F) -->
            <div class="bat bat-f" data-bat="f" tabindex="0">
                <span class="bat-lettre">F</span>
                <span class="bat-nom">Student Hub</span>
            </div>

            <!-- Amphi E3 -->
            <div class="bat bat-e3" data-bat="e3" tabindex="0">
                <span class="bat-vertical">Amphi E3</span>
            </div>

            <!-- BDE (G) -->
            <div class="bat bat-g" data-bat="g" tabindex="0">
                <span class="bat-lettre-sm">G</span>
                <span class="bat-nom">BDE</span>
            </div>

            <!-- EFREI Entrepreneurs (J) -->
            <div class="bat bat-j" data-bat="j" tabindex="0">
                <span class="bat-lettre-sm">J</span>
                <span class="bat-nom">EFREI<br>Entrepreneurs</span>
            </div>

            <!-- SEP -->
            <div class="bat bat-sep" data-bat="sep" tabindex="0">
                <span class="bat-nom">SEP</span>
            </div>

            <!-- Légende -->
            <div class="legende-map">
                <span class="leg-item"><span class="leg-cercle"></span> Nom du bâtiment</span>
                <span class="leg-item"><span class="leg-entree"></span> Entrée du bâtiment</span>
            </div>

        </div><!-- fin .carte-campus -->

        <!-- ── Panneau de description ── -->
        <div class="info-panel" id="info-panel">
            <p class="info-defaut">Survolez un bâtiment pour voir son descriptif</p>
        </div>

    </div><!-- fin .plan-page -->

    <?php include 'footer.php'; ?>

    <script>
    const infos = {
        a: {
            titre: 'Bâtiment A',
            couleur: '#3f4f6a',
            items: [
                'Accueil',
                'Amphi A001',
                'Direction des études : Cycle M · Apprentissage PGE · Programmes Experts',
                'Laboratoire de recherche',
                'Innovation pédagogique',
                'Pôle réussite étudiante',
                'Accréditations · DSI · Relations internationales',
                'Juridique',
                'Crous (sous-sol)'
            ]
        },
        b: {
            titre: 'Bâtiment B',
            couleur: '#4a6898',
            items: ['Direction des études cycle I', 'Département scientifique']
        },
        c: {
            titre: 'Bâtiment C',
            couleur: '#1a1a2e',
            items: ['Amphi C001', 'Direction générale', 'Finance', 'Informatique', 'Relations entreprises', 'Ressources humaines']
        },
        d: {
            titre: 'Bâtiment D',
            couleur: '#6868b0',
            items: ['Promotion & admissions', 'Vie associative', 'Relations entreprises']
        },
        e: {
            titre: 'Bâtiment E',
            couleur: '#3a5c88',
            items: ['Amphis E001, E002, E003', 'Support informatique', 'Reprographie', 'Services généraux et campus', 'Planification & examens', 'Student services (scolarité)', 'K\'Fet']
        },
        e1: { titre: 'Amphi E1', couleur: '#1a1a2e', items: ['Amphithéâtre E001'] },
        e2: { titre: 'Amphi E2', couleur: '#1a1a2e', items: ['Amphithéâtre E002'] },
        e3: { titre: 'Amphi E3', couleur: '#1a1a2e', items: ['Amphithéâtre E003'] },
        f: {
            titre: 'Student Hub — Bâtiment F',
            couleur: '#7878c0',
            items: ['Pôle étudiants', 'Espaces de Coworking']
        },
        g: {
            titre: 'BDE — Bâtiment G',
            couleur: '#263545',
            items: ['Bureau Des Étudiants']
        },
        i: {
            titre: 'Innovation\'Lab — Bâtiment I',
            couleur: '#7aaecc',
            items: ['Laboratoire d\'innovation pédagogique']
        },
        j: {
            titre: 'EFREI Entrepreneurs — Bâtiment J',
            couleur: '#7088a8',
            items: ['Incubateur de startups', 'EFREI Entrepreneurs']
        },
        kfet: {
            titre: 'K\'Fet',
            couleur: '#1a1a2e',
            items: ['Cafétéria du campus']
        },
        sep: {
            titre: 'SEP EFREI',
            couleur: '#98aabb',
            items: ['SEPEFREI']
        }
    };

    const panel = document.getElementById('info-panel');

    document.querySelectorAll('.bat').forEach(bat => {
        bat.addEventListener('mouseenter', () => {
            const key = bat.dataset.bat;
            const info = infos[key];
            if (!info) return;
            const items = info.items.map(i => `<li>${i}</li>`).join('');
            panel.innerHTML = `
                <div class="info-header" style="border-left:4px solid ${info.couleur}">
                    <strong class="info-titre">${info.titre}</strong>
                </div>
                <ul class="info-liste">${items}</ul>`;
            panel.classList.add('active');
        });
        bat.addEventListener('mouseleave', () => {
            panel.innerHTML = '<p class="info-defaut">Survolez un bâtiment pour voir son descriptif</p>';
            panel.classList.remove('active');
        });
        bat.addEventListener('focus', () => bat.dispatchEvent(new Event('mouseenter')));
        bat.addEventListener('blur',  () => bat.dispatchEvent(new Event('mouseleave')));
    });
    </script>

</body>
</html>
