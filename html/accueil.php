<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../css/accueil.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="page-layout">

        <!-- ── Colonne gauche : chiffres + actualités ── -->
        <div class="col-left">

            <section class="chiffres">
                <div id="enseignants">
                    <h3>50</h3>
                    <p>enseignants-chercheurs</p>
                </div>
                <div id="professeurs">
                    <h3>90</h3>
                    <p>professeurs permanents</p>
                </div>
                <div id="etudiants">
                    <h3>6000</h3>
                    <p>étudiants</p>
                </div>
                <div id="campus">
                    <h3>2</h3>
                    <p>campus</p>
                </div>
            </section>

        </div><!-- /col-left -->

        <!-- ── Colonne centre : description + actualités + carrousel ── -->
        <div class="col-center">

            <section class="description">
                <h1>Le département informatique forme des ingénieurs capables d'innover et de concevoir les technologies numériques de demain.</h1>
                <p>Bienvenue sur le site du département informatique de EFREI Paris : explorez l'ensemble de nos formations, de la première année aux spécialisations avancées, et découvrez des cours conçus pour vous préparer aux défis du numérique. Rencontrez nos professeurs, experts et passionnés, qui accompagnent chaque étudiant vers la réussite.</p>
                <p>Fondée en 1936, l'Efrei n'a eu de cesse d'évoluer au fil des avancées technologiques. Devenue une école référente dans le numérique, elle compte aujourd'hui plus de 16 000 alumni. École composante du grand établissement Panthéon-Assas Université, ses diplômes sont reconnus en France comme à l'international.</p>
            </section>

            <section class="actualites">
                <h2>Actualités</h2>
                <div class="bde">
                    <h3>Campagne BDE : propose ta liste !</h3>
                    <p>La campagne BDE arrive et avec elle l'occasion de proposer ta liste pour le prochain BDE de Paris et BDE de Bordeaux !</p>
                </div>
                <div class="batiment">
                    <h3>Ouverture de New Republic</h3>
                    <p>Un nouveau bâtiment de 5000 m² ouvrira ses portes en septembre 2024 sur le campus de Paris.</p>
                </div>
            </section>

            <section class="caroussel-photos">
                <img src="../data/img/campus1.jpg" alt="Photo 1">
                <img src="../data/img/campus2.jpg" alt="Photo 2">
                <img src="../data/img/campus3.jpg" alt="Photo 3">
                <img src="../data/img/aerien.jpg"  alt="Photo 4">
                <img src="../data/img/ilab.jpg"    alt="Photo 5">
                <img src="../data/img/terrasse.jpg" alt="Photo 6">
            </section>

        </div><!-- /col-center -->

        <!-- ── Colonne droite : météo + calendrier ── -->
        <div class="col-right">

            <section class="meteo">
                <h2>Météo du jour</h2>
                <?php
                    $api_key = '1ec1dfa0a9c942fd7238ca4b48e4494b';
                    $ville   = 'Villejuif';
                    $url     = "https://api.openweathermap.org/data/2.5/weather?q={$ville}&appid={$api_key}&units=metric&lang=fr";

                    $response = file_get_contents($url);
                    if ($response !== false) {
                        $data        = json_decode($response);
                        $temp        = round($data->main->temp);
                        $ressenti    = round($data->main->feels_like);
                        $description = ucfirst($data->weather[0]->description);
                        $icone       = $data->weather[0]->icon;
                        $humidite    = $data->main->humidity;
                        $vent        = round($data->wind->speed * 3.6);
                        echo "
                        <div class='meteo-info'>
                            <img src='https://openweathermap.org/img/wn/{$icone}@2x.png' alt='{$description}'>
                            <p><strong>{$ville}</strong></p>
                            <p>{$description}</p>
                            <p><strong>{$temp}°C</strong> (ressenti {$ressenti}°C)</p>
                            <p>Humidité : {$humidite}%</p>
                            <p>Vent : {$vent} km/h</p>
                        </div>";
                    } else {
                        echo "<p>Impossible de récupérer la météo.</p>";
                    }
                ?>
            </section>

            <section class="calendrier">
                <h2>Calendrier</h2>
                <?php
                    $aujourd_hui  = (int) date('j');
                    $mois_actuel  = (int) date('n');
                    $annee        = (int) date('Y');
                    $nb_jours     = cal_days_in_month(CAL_GREGORIAN, $mois_actuel, $annee);
                    $premier_jour = date('N', mktime(0, 0, 0, $mois_actuel, 1, $annee));
                    $mois_fr      = ['','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
                    $mois_nom     = $mois_fr[$mois_actuel] . ' ' . $annee;
                    $jours        = ['Lun','Mar','Mer','Jeu','Ven','Sam','Dim'];

                    echo "<table class='calendrier-table'>";
                    echo "<caption>{$mois_nom}</caption>";
                    echo "<thead><tr>";
                    foreach ($jours as $j) echo "<th>{$j}</th>";
                    echo "</tr></thead><tbody><tr>";

                    for ($i = 1; $i < $premier_jour; $i++) echo "<td></td>";
                    $col = $premier_jour;
                    for ($jour = 1; $jour <= $nb_jours; $jour++) {
                        $classe = ($jour === $aujourd_hui) ? " class='aujourd-hui'" : "";
                        echo "<td{$classe}>{$jour}</td>";
                        if ($col % 7 === 0 && $jour < $nb_jours) echo "</tr><tr>";
                        $col++;
                    }
                    while ($col % 7 !== 1) { echo "<td></td>"; $col++; }
                    echo "</tr></tbody></table>";
                ?>
            </section>

        </div>

    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
