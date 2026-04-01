<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enseignants — Efrei</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/enseignants.css?=v1.1">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="bubble-extra-1"></div>
    <div class="bubble-extra-2"></div>

    <div class="page">
        <h2 class="section-title">Enseignants du département Informatique</h2>
        <p class="section-sub">Efrei · Ingénieurs Numérique · Paris Panthéon-Assas</p>

        <div class="carousel-wrap">
            <div class="carousel-stage" id="stage">
                </div>

            <div class="nav-container">
                <div class="carousel-nav">
                    <button class="nav-btn" id="prev">&#8592;</button> <!-- flèche gauche -->
                    <div class="counter"><em id="cur">1</em>/<span id="tot">1</span></div>
                    <button class="nav-btn" id="next">&#8594;</button> <!-- flèche droite -->
                </div>
                <div class="carousel-dots" id="dots"></div>
            </div>
        </div>
    </div>

    <script src="../js/enseignants.js?=v1.1"></script>
</body>
</html>
<?php include 'footer.php'; ?>
