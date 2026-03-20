<?php /* html/cours.php */ ?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cours</title>
  <link rel="stylesheet" href="../css/cours.css">
</head>
<body>

<section class="formations">
  <div class="formations__grid">

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

    <div class="formations__right">
      <div class="program-panel" id="panel-grande">
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
          <span class="panel-row__meta">B1 & B3</span>
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

  <section id="detailsArea" class="details" style="display:none;">
    <div class="details__head">
      <h2 id="detailsTitle" class="details__title">Détails</h2>
      <button type="button" class="details__close" onclick="closeDetails()">✕</button>
    </div>

    <div id="details-prepas" class="details__content" style="display:none;">
      <h3 class="details__sectionTitle">Nos programmes prépas</h3>

      <div class="prepasIntroGrid">
        <div class="prepasIntroCard">
          <h4>✨ Présentation</h4>
          <p>
            Ce cycle en deux ans prépare nos étudiants en combinant formation scientifique
            et technique avec une formation générale et professionnelle de l'ingénieur.
          </p>
          <p class="responsable">
            Responsable de la formation :
            <strong>Ziad ADEM</strong><br>
            <a href="#">ziad.adem@efrei.fr</a>
          </p>
        </div>

        <div class="prepasIntroCard">
          <h4>✨ Prérequis</h4>
          <ul>
            <li>Bac général avec spécialité Mathématiques + 1 spécialité scientifique</li>
            <li>(PHYSIQUE-CHIMIE / NSI / SVT / SI)</li>
            <li>Bac général avec 2 spécialités scientifiques (hors mathématiques)</li>
            <li>+ Maths complémentaires</li>
          </ul>
        </div>
      </div>

      <div class="prepasGrid">
        <article class="prepasCard">
          <h4 class="prepasCard__title">
            1ère année de prépa - Rentrée classique <span>(début septembre)</span>
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


    <div id="details-ingenieur" class="details__content" style="display:none;">
  <h3 class="details__sectionTitle">Cycle Ingénieur</h3>

  <div class="ingenieurTextBox">
    <p>
      Le cycle ingénieur, permet pendant au moins trois ans (quatre si réalisation d’un double-diplôme)
      à chaque étudiant, en accord avec ses projets personnels et professionnels, de choisir son parcours
      de formation parmi les 4 filières proposées par l’école (Information Technology, Sécurité et Réseaux,
      Data Science, Systèmes Embarqués). La première année de cycle ingénieur (ING1) a pour objectif
      d’harmoniser les connaissances des étudiants qui intègrent l’Efrei avec celles des élèves qui ont déjà
      suivi le cycle prépa. Cette année de tronc commun se compose d’un semestre à l’international
      et d’un semestre de cours à Paris ou à Bordeaux.
    </p>
  </div>

  <div class="ingenieurIntroGrid">
    <div class="ingenieurIntroCard">
      <h4>✨ Présentation</h4>
      <p>
        Cette année de tronc commun se compose d’un semestre à l’international dans le cadre
        de la mobilité étudiante et d’un semestre de cours à Paris. À son issue, les élèves peuvent
        choisir une des 13 majeures proposées au sein des 4 filières de l’école en vue de se spécialiser
        dans un domaine précis du numérique.
      </p>

      <p class="responsable">
        Responsable de la formation :
        <strong>Ziad ADEM</strong><br>
        <a href="#">ziad.adem@efrei.fr</a>
      </p>
    </div>
  </div>
</div>


<div id="details-ingenieur" class="details__content" style="display:none;">
  <h3 class="details__sectionTitle">Cycle Ingénieur</h3>

  <div class="ingenieurTextBox">
    <p>
      Le cycle ingénieur, permet pendant au moins trois ans (quatre si réalisation d’un double-diplôme)
      à chaque étudiant, en accord avec ses projets personnels et professionnels, de choisir son parcours
      de formation parmi les 4 filières proposées par l’école (Information Technology, Sécurité et Réseaux,
      Data Science, Systèmes Embarqués). La première année de cycle ingénieur (ING1) a pour objectif
      d’harmoniser les connaissances des étudiants qui intègrent l’Efrei avec celles des élèves qui ont déjà
      suivi le cycle prépa. Cette année de tronc commun se compose d’un semestre à l’international
      et d’un semestre de cours à Paris ou à Bordeaux.
    </p>
  </div>

  <div class="ingenieurIntroGrid">
    <div class="ingenieurIntroCard">
      <h4>✨ Présentation</h4>
      <p>
        Cette année de tronc commun se compose d’un semestre à l’international dans le cadre
        de la mobilité étudiante et d’un semestre de cours à Paris. À son issue, les élèves peuvent
        choisir une des 13 majeures proposées au sein des 4 filières de l’école en vue de se spécialiser
        dans un domaine précis du numérique.
      </p>

      <p class="responsable">
        Responsable de la formation :
        <strong>Ziad ADEM</strong><br>
        <a href="#">ziad.adem@efrei.fr</a>
      </p>
    </div>
  </div>
</div>

  <div id="details-majeures" class="details__content" style="display:none;">
  <h3 class="details__sectionTitle">Majeures de spécialisation</h3>

  <div class="majeures-block">
    <a class="panel-row" href="#" onclick="toggleMajeuresMenu(); return false;">
      <span class="panel-row__title">Majeures de spécialisation</span>
      <span class="panel-row__meta">ING2 & ING3</span>
      <span class="panel-row__arrow">›</span>
    </a>

    <div id="majeuresMenu" class="majeures-menu" style="display:none;">
      <a href="data-science.php" class="majeures-link">Filière Data Science</a>
      <a href="information-technology.php" class="majeures-link">Filière Information Technology</a>
      <a href="securite-reseaux.php" class="majeures-link">Filière Sécurité & Réseaux</a>
      <a href="systemes-embarques.php" class="majeures-link">Filière Systèmes embarqués</a>
      <a href="filieres-apprentissage.php" class="majeures-link">Filières en apprentissage</a>
    </div>
  </div>
</div>

    <div id="details-bachelors" class="details__content" style="display:none;">
      <p>Bachelors / Licences detayını sonra dolduracağız.</p>
    </div>

    <div id="details-masteres" class="details__content" style="display:none;">
      <p>Mastères detayını sonra dolduracağız.</p>
    </div>
  </section>
</section>

<script src="../js/cours.js"></script>
</body>
</html>