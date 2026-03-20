<?php /* html/cours.php */ ?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cours</title>

  <link rel="stylesheet" href="../css/cours.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
</head>
<body>

<section class="formations">
  <div class="formations__grid">

    <!-- SOL -->
    <div class="formations__left">
      <button class="program-card" type="button" data-target="panel-grande">
        <div class="program-card__text">
          <h3 class="program-card__title">Prog. Grande École</h3>
          <p class="program-card__desc">
            Choisissez parmi nos filières et spécialités pour construire votre parcours d'ingénieur.
          </p>
        </div>
        <span class="program-card__arrow">›</span>
      </button>

      <button class="program-card" type="button" data-target="panel-techno">
        <div class="program-card__text">
          <h3 class="program-card__title">Prog. Technologie & Numérique</h3>
          <p class="program-card__desc">
            Découvrez nos formations pour construire un parcours qui vous ressemble.
          </p>
        </div>
        <span class="program-card__arrow">›</span>
      </button>
    </div>

    <!-- SAĞ -->
    <div class="formations__right">

      <div class="program-panel" id="panel-grande">
        <!-- ✅ Artık tıklanınca detay açıyor -->
        <a class="panel-row" href="#" onclick="openDetails('prepas'); return false;">
          <span class="panel-row__title">Prépas Intégrées</span>
          <span class="panel-row__meta">P1 & P2</span>
          <span class="panel-row__arrow">›</span>
        </a>

        <a class="panel-row" href="#" onclick="openDetails('ingenieur'); return false;">
          <span class="panel-row__title">Cycle Ingénieur</span>
          <span class="panel-row__meta">ING1</span>
          <span class="panel-row__arrow">›</span>
        </a>

        <a class="panel-row" href="#" onclick="openDetails('majeures'); return false;">
          <span class="panel-row__title">Majeures de spécialisation</span>
          <span class="panel-row__meta">ING2 & ING3</span>
          <span class="panel-row__arrow">›</span>
        </a>
      </div>

      <div class="program-panel" id="panel-techno">
        <a class="panel-row" href="#" onclick="openDetails('bachelors'); return false;">
          <span class="panel-row__title">Bachelors / Licences</span>
          <span class="panel-row__meta">B1, B2 & B3</span>
          <span class="panel-row__arrow">›</span>
        </a>

        <a class="panel-row" href="#" onclick="openDetails('masteres'); return false;">
          <span class="panel-row__title">Mastères</span>
          <span class="panel-row__meta">M1 & M2</span>
          <span class="panel-row__arrow">›</span>
        </a>
      </div>

    </div>
  </div>
</section>


<!-- =========================
     DETAY ALANI (aynı sayfa)
     ========================= -->
<section id="detailsArea" class="details" style="display:none;">
  <div class="details__head">
    <h2 id="detailsTitle">Détails</h2>
    <button type="button" class="details__close" onclick="closeDetails()">✕</button>
  </div>

  <!-- ========= PREPAS ========= -->
  <div id="details-prepas" class="details__content" style="display:none;">
    <h3 class="details__sectionTitle">Nos programmes prépas</h3>

    <div class="prepasGrid">
      <!-- 1ere année -->
      <article class="prepasCard">
        <h4 class="prepasCard__title">
          1ère année de prépa – Rentrée classique <span>(début septembre)</span>
        </h4>

        <div class="acc">
          <button class="acc__btn" type="button">
            Informatique <small>(180h)</small>
            <span class="acc__icon">+</span>
          </button>
          <div class="acc__panel" style="display:none;">
            <ul>
              <li>Algorithmique</li>
              <li>Programmation en Python</li>
              <li>Structures de Données et Programmation 1</li>
              <li>Complexité</li>
            </ul>
          </div>
        </div>

        <div class="acc">
          <button class="acc__btn" type="button">
            Mathématiques
            <span class="acc__icon">+</span>
          </button>
          <div class="acc__panel" style="display:none;">
            <ul>
              <li>Analyse</li>
              <li>Algèbre</li>
              <li>Probabilités</li>
            </ul>
          </div>
        </div>
      </article>

      <!-- 2e année -->
      <article class="prepasCard">
        <h4 class="prepasCard__title">2e année de Prépa</h4>

        <div class="acc">
          <button class="acc__btn" type="button">
            Informatique <small>(180h)</small>
            <span class="acc__icon">+</span>
          </button>
          <div class="acc__panel" style="display:none;">
            <ul>
              <li>Structures de Données et Programmation 2</li>
              <li>Introduction au système Linux</li>
              <li>Réseaux 1 : Concepts de base</li>
              <li>Bases de données 1 : Concepts de base</li>
              <li>Java 1 : Fondamentaux de la POO</li>
              <li>Programmation Web 1 : HTML, CSS, JS</li>
            </ul>
          </div>
        </div>

        <div class="acc">
          <button class="acc__btn" type="button">
            Mathématiques
            <span class="acc__icon">+</span>
          </button>
          <div class="acc__panel" style="display:none;">
            <ul>
              <li>Analyse avancée</li>
              <li>Statistiques</li>
            </ul>
          </div>
        </div>
      </article>
    </div>
  </div>

  <!-- ======= Placeholder (sonra dolduracağız) ======= -->
  <div id="details-ingenieur" class="details__content" style="display:none;">
    <p>Cycle Ingénieur detayını gönderince burayı dolduracağız.</p>
  </div>

  <div id="details-majeures" class="details__content" style="display:none;">
    <p>Majeures detayını gönderince burayı dolduracağız.</p>
  </div>

  <div id="details-bachelors" class="details__content" style="display:none;">
    <p>Bachelors / Licences detayını gönderince burayı dolduracağız.</p>
  </div>

  <div id="details-masteres" class="details__content" style="display:none;">
    <p>Mastères detayını gönderince burayı dolduracağız.</p>
  </div>
</section>


<script src="../js/cours.js"></script>
</body>
</html>