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

<?php include 'header.php'; ?>

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
            Découvrez nos formations pour construire votre parcours.
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
        <a class="panel-row" href="#" onclick="openDetails('bts'); return false;">
          <span class="panel-row__title">BTS</span>
          <span class="panel-row__meta">BTS1 & BTS2</span>
          <span class="panel-row__arrow">›</span>
        </a>

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

  <section id="detailsArea" class="details" style="display:none;">
    <div class="details__head">
      <h2 id="detailsTitle" class="details__title">Détails</h2>
      <button type="button" class="details__close" onclick="closeDetails()">✕</button>
    </div>

    <!-- PREPAS -->
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

    <!-- INGENIEUR -->
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

    <!-- MAJEURES -->
    <div id="details-majeures" class="details__content" style="display:none;">
      <h3 class="details__sectionTitle">Majeures de spécialisation</h3>

      <div class="majeures-layout">
        <div class="majeures-left">
          <a href="#" class="majeures-main-link" onclick="showMajeureGroup('datascience'); return false;">Filière Data Science</a>
          <a href="#" class="majeures-main-link" onclick="showMajeureGroup('it'); return false;">Filière Information Technology</a>
          <a href="#" class="majeures-main-link" onclick="showMajeureGroup('securite'); return false;">Filière Sécurité & Réseaux</a>
          <a href="#" class="majeures-main-link" onclick="showMajeureGroup('embarques'); return false;">Filière Systèmes embarqués</a>
          <a href="#" class="majeures-main-link" onclick="showMajeureGroup('apprentissage'); return false;">Filières en apprentissage</a>
        </div>

        <div class="majeures-right">
          <div id="majeure-group-datascience" class="majeure-group" style="display:none;">
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('ds-ai')">Data & Artificial Intelligence</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('ds-engineering')">Data Engineering</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('ds-bio')">Bio & Numérique</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('ds-bi')">Business Intelligence & Analytics</button>
          </div>

          <div id="majeure-group-it" class="majeure-group" style="display:none;">
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('it-gov')">Information Systems Strategy and Governance</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('it-se')">Software Engineering</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('it-finance')">IT for Finance</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('it-immersive')">Technologies immersives et IA</button>
          </div>

          <div id="majeure-group-securite" class="majeure-group" style="display:none;">
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('sec-gouv')">Cybersécurité, SI & Gouvernance</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('sec-infra')">Cybersécurité, infrastructures et logiciels</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('sec-cloud')">Cybersécurité & Cloud</button>
          </div>

          <div id="majeure-group-embarques" class="majeure-group" style="display:none;">
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('emb-transports')">Transports intelligents</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('emb-robots')">Systèmes robotiques et drones</button>
          </div>

          <div id="majeure-group-apprentissage" class="majeure-group" style="display:none;">
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('app-logiciels')">Logiciels et Systèmes d'information</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('app-bigdata')">Big Data & Machine Learning</button>
            <button class="majeure-subitem" type="button" onclick="showMajeurePresentation('app-reseaux')">Réseaux et sécurité</button>
          </div>

          <div class="majeure-presentation-area">
            <div id="presentation-ds-ai" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Data & Artificial Intelligence</h4>
              <p>Cette majeure a pour objectif de former des ingénieurs capables de concevoir, piloter et déployer des solutions basées sur l’exploitation de données massives, dans le but de répondre aux enjeux stratégiques des organisations dans un contexte de transformation numérique profonde. Elle s’appuie sur un socle solide en mathématiques, en intelligence artificielle et en science des données, avec un accent particulier sur le Machine Learning, le Deep Learning et l’IA générative. La formation intègre également les dimensions éthiques et réglementaires, afin de préparer les étudiants à concevoir des systèmes d’IA robustes, explicables et responsables, adaptés à des environnements complexes et multidisciplinaires.</p>
            </div>

            <div id="presentation-ds-engineering" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Data Engineering</h4>
              <p>La production de données numériques croît de manière exponentielle, faisant de la data un enjeu clé du 21e siècle. Couplée à l’intelligence artificielle, elle révolutionne des secteurs comme la santé, la finance ou l’urbanisme. Les ingénieurs de données conçoivent et optimisent les architectures nécessaires à la collecte, au stockage, au traitement et à la sécurisation de ces masses de données.</p>
            </div>

            <div id="presentation-ds-bio" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Bio & Numérique</h4>
              <p>La bio-informatique s’est largement développée ces dernières années pour traiter les données complexes issues des nouvelles biotechnologies, notamment les données multiomics. Cette discipline allie informatique, statistiques, biologie et médecine pour répondre à la massification et à la diversité des données à analyser.</p>
            </div>

            <div id="presentation-ds-bi" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Business Intelligence & Analytics</h4>
              <p>La majeure Business Intelligence & Analytics forme des ingénieurs capables de concevoir et déployer les outils, méthodes et infrastructures nécessaires à la collecte, consolidation, modélisation, analyse et visualisation des données d’entreprise. Leur mission est de faciliter la collaboration et d’optimiser la prise de décision. La Business Intelligence vise à fournir aux décideurs une vision globale de l’activité, tout en anticipant les évolutions du marché et les tendances futures, pour piloter efficacement la stratégie d’entreprise.</p>
            </div>

            <div id="presentation-it-gov" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Information Systems Strategy and Governance</h4>
              <p>Cette majeure forme des ingénieurs capables de piloter la transformation numérique des organisations en alignant stratégie, performance opérationnelle et systèmes d’information. Les étudiants y acquièrent des compétences en modélisation des processus métier, gestion des indicateurs de performance, conception et gouvernance d’architectures Cloud, ainsi qu’en pilotage de la sécurité des SI. Une formation à l’interface du business et de la technologie, pour accompagner les entreprises dans la définition et la mise en œuvre de solutions numériques adaptées à leurs enjeux stratégiques et organisationnels.</p>
            </div>

            <div id="presentation-it-se" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Software Engineering</h4>
              <p>Enseignée entièrement en anglais, cette majeure forme des ingénieurs logiciels de haut niveau capables de maîtriser l’ensemble du cycle de vie du logiciel, de la conception au déploiement. Généraliste et dotée d’une solide culture informatique (développement, sécurité, qualité, cloud, data), l’ingénieur logiciel joue un rôle central dans la transformation digitale des organisations. Polyvalents et recherchés, ces profils trouvent leur place dans tous les secteurs : automobile, aéronautique, défense, finance, télécommunications et bien d’autres.</p>
            </div>

            <div id="presentation-it-finance" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — IT for Finance</h4>
              <p>Entièrement dispensée en anglais, cette majeure forme des ingénieurs capables de concevoir des solutions numériques pour les marchés financiers internationaux. Les étudiants y acquièrent une double compétence en informatique et en finance : modélisation mathématique des marchés, analyse des risques et transactions, conception d’infrastructures financières et compréhension des mécanismes de la banque d’investissement. Une attention particulière est portée aux opérations de trading et au développement de solutions durables et éthiques pour accompagner l’évolution du secteur.</p>
            </div>

            <div id="presentation-it-immersive" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Technologies immersives et IA</h4>
              <p>Cette majeure forme des ingénieurs experts en conception de systèmes interactifs avancés, à la croisée de l’intelligence artificielle et de la réalité étendue (XR). Elle couvre les technologies immersives – réalité virtuelle, augmentée et mixte – et leurs applications dans des domaines variés : simulation industrielle, architecture, visualisation de données, santé, jeux vidéo ou encore valorisation du patrimoine culturel. Les étudiants y acquièrent des compétences pointues en modélisation numérique, rendus interactifs et conception 3D, pour devenir en acteurs de l’innovation dans un secteur en plein essor.</p>
            </div>

            <div id="presentation-sec-gouv" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Cybersécurité, SI & Gouvernance</h4>
              <p>La majeure Cybersécurité, SI & Gouvernance forme des ingénieurs capables de maîtriser à la fois les dimensions techniques, fonctionnelles et réglementaires de la cybersécurité. Nos étudiants y développent une expertise dans la gestion des risques, la protection des systèmes d’information et la mise en place de politiques de gouvernance adaptées.</p>
            </div>

            <div id="presentation-sec-infra" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Cybersécurité, infrastructures et logiciels</h4>
              <p>Cette majeure forme des ingénieurs experts dans la protection des systèmes et des applications. Elle aborde les enjeux essentiels de la cybersécurité : sécurisation des infrastructures, protection des données sensibles, continuité des services critiques et confiance dans l’économie numérique.</p>
            </div>

            <div id="presentation-sec-cloud" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Cybersécurité & Cloud</h4>
              <p>La majeure Cybersécurité & Cloud forme des ingénieurs capables d’appréhender de manière globale les enjeux de sécurité au sein d’une organisation. Les étudiants y acquièrent des compétences pointues en protection des données, en sécurisation des infrastructures IT et en conception d’architectures cloud de confiance. Une expertise clé pour accompagner la transformation numérique des organisations en toute sécurité.</p>
            </div>

            <div id="presentation-emb-transports" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Transports intelligents</h4>
              <p>Cette majeure forme des ingénieurs spécialisés dans la conception et le développement de systèmes embarqués pour les transports autonomes : véhicules, aéronefs, drones ou trains. Les étudiants y acquièrent des compétences en systèmes temps réel, traitement du signal, intelligence artificielle embarquée, réseaux de communication et sûreté des systèmes critiques. Une expertise clé pour imaginer des solutions innovantes, sûres et durables, répondant aux défis de la transition écologique dans les secteurs automobile, aéronautique, ferroviaire et spatial.</p>
            </div>

            <div id="presentation-emb-robots" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Systèmes robotiques et drones</h4>
              <p>Cette majeure forme des ingénieurs capables d’étudier et de concevoir des systèmes autonomes avec une intelligence embarquée : des automates pouvant se mouvoir au sol et permettant d’apporter une aide à l’humain sous différentes formes ainsi que la conception d’objets volants. Un programme qui vous propulse rapidement dans votre future carrière dans les services informatiques.</p>
            </div>

            <div id="presentation-app-logiciels" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Logiciels et Systèmes d'information</h4>
              <p>La majeure Logiciels et Systèmes d’Information (LSI) de l’Efrei forme des ingénieurs en alternance capables de concevoir et piloter des solutions numériques innovantes. Alliant expertise technique et expérience en entreprise, elle prépare des professionnels prêts à accompagner la transformation digitale des organisations.</p>
            </div>

            <div id="presentation-app-bigdata" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Big Data & Machine Learning</h4>
              <p>La majeure Big Data & Machine Learning de l’Efrei forme des ingénieurs capables d’exploiter les données massives et l’intelligence artificielle pour accompagner la transformation numérique des entreprises. Grâce à une formation complète en data science, machine learning et cloud computing, les étudiants développent des compétences recherchées pour innover dans des secteurs clés comme la santé, le commerce ou la cybersécurité.</p>
            </div>

            <div id="presentation-app-reseaux" class="majeure-presentation-card" style="display:none;">
              <h4>Présentation — Réseaux et sécurité</h4>
              <p>La majeure Réseaux et Sécurité de l’Efrei forme des ingénieurs experts en cybersécurité et en infrastructures réseaux. Ce programme développe des compétences clés pour concevoir, déployer et sécuriser des réseaux de communication, tout en protégeant les données sensibles et les systèmes informatiques contre les cybermenaces. Les diplômés deviennent des professionnels capables de relever les défis technologiques d’un secteur en pleine évolution.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- BTS -->
    <div id="details-bts" class="details__content" style="display:none;">
      <h3 class="details__sectionTitle">BTS</h3>

      <div class="bachelors-layout">
        <div class="bachelors-left">
          <a href="#" class="bachelors-main-link" onclick="showBtsGroup('sio'); return false;">
            SIO <span>[BTS1 & BTS2]</span>
          </a>
        </div>

        <div class="bachelors-right">
          <div id="bts-group-sio" class="bachelor-group" style="display:none;">
            <button class="bachelor-subitem" type="button" onclick="showBachelorPresentation('bts-sio')">SIO</button>
          </div>

          <div class="bachelor-presentation-area">
            <div id="bachelor-presentation-bts-sio" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — BTS SIO</h4>
              <p>Grâce à ses deux options (Solutions d’infrastructure, systèmes et réseaux - SISR- ou Solutions logicielles et applications métiers - SLAM-), le BTS SIO offre des perspectives professionnelles variées et répond aux besoins du marché de l’emploi dans le secteur des technologies de l’information.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- BACHELORS -->
    <div id="details-bachelors" class="details__content" style="display:none;">
      <h3 class="details__sectionTitle">Bachelors / Licences</h3>

      <div class="bachelors-layout">
        <div class="bachelors-left">
          <a href="#" class="bachelors-main-link" onclick="showBachelorGroup('bts'); return false;">
            BTS <span>[BTS1 & BTS2]</span>
          </a>

          <a href="#" class="bachelors-main-link" onclick="showBachelorGroup('licences'); return false;">
            Bachelors / Licences <span>[B1, B2 & B3]</span>
          </a>

          <a href="#" class="bachelors-main-link" onclick="showBachelorGroup('masteres'); return false;">
            Mastères <span>[M1 & M2]</span>
          </a>
        </div>

        <div class="bachelors-right">
          <div id="bachelor-group-bts" class="bachelor-group" style="display:none;">
            <div class="bachelor-subitem">SIO</div>
          </div>

          <div id="bachelor-group-licences" class="bachelor-group" style="display:none;">
            <button class="bachelor-subitem" type="button" onclick="showBachelorPresentation('devwebia')">Bachelor Développeur web & IA</button>
            <button class="bachelor-subitem" type="button" onclick="showBachelorPresentation('cyberreseaux')">Bachelor Cybersécurité & réseaux (Grade de Licence)</button>
            <button class="bachelor-subitem" type="button" onclick="showBachelorPresentation('ethical')">Bachelor Cybersécurité & ethical hacking</button>
            <button class="bachelor-subitem" type="button" onclick="showBachelorPresentation('informatique')">Bachelor Informatique (Grade de licence)</button>
          </div>

          <div id="bachelor-group-masteres" class="bachelor-group" style="display:none;">
            <div class="bachelor-subitem">Mastère Dev. manager full stack</div>
            <div class="bachelor-subitem">Mastère Data engineering & IA</div>
            <div class="bachelor-subitem">Mastère Cybersécurité</div>
            <div class="bachelor-subitem">Mastère Cybersécurité & Management</div>
            <div class="bachelor-subitem">Mastère Green IT</div>
          </div>

          <div class="bachelor-presentation-area">
            <div id="bachelor-presentation-devwebia" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — Bachelor Développeur web & IA</h4>
              <p>Les étudiants du Bachelor Développeur web & IA apprennent à programmer et à développer des applications web (back-end, front-end) et maîtrisent les outils d’IA.</p>
            </div>

            <div id="bachelor-presentation-cyberreseaux" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — Bachelor Cybersécurité & réseaux</h4>
              <p>Cette formation prépare les étudiants à concevoir et déployer des stratégies de sécurité des systèmes d’information qui préviennent efficacement les menaces cyber et y répondent de manière adaptée.</p>
            </div>

            <div id="bachelor-presentation-ethical" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — Bachelor Cybersécurité & ethical hacking</h4>
              <p>Nos diplômés maîtrisent les compétences clés de la cybersécurité dans une approche orientée vers l’entreprise. Formés aux tests d’intrusion avec une forte dimension éthique, ils développent également une expertise en sécurité logicielle.</p>
            </div>

            <div id="bachelor-presentation-informatique" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — Bachelor Informatique</h4>
              <p>Le Bachelor Informatique de l’Efrei forme des développeurs polyvalents capables d’opérer aussi bien en tant que Fullstack, DevOps, Back End ou Front End. Ses diplômés peuvent travailler aussi bien au sein d’une association que d’une grande ESN.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MASTERES -->
    <div id="details-masteres" class="details__content" style="display:none;">
      <h3 class="details__sectionTitle">Mastères</h3>

      <div class="bachelors-layout">
        <div class="bachelors-left">
          <a href="#" class="bachelors-main-link" onclick="showMastereGroup('main'); return false;">
            Mastères <span>[M1 & M2]</span>
          </a>
        </div>

        <div class="bachelors-right">
          <div id="mastere-group-main" class="bachelor-group" style="display:none;">
            <button class="bachelor-subitem" type="button" onclick="showMasterePresentation('fullstack')">Mastère Dev. manager full stack</button>
            <button class="bachelor-subitem" type="button" onclick="showMasterePresentation('dataia')">Mastère Data engineering & IA</button>
            <button class="bachelor-subitem" type="button" onclick="showMasterePresentation('cyber')">Mastère Cybersécurité</button>
            <button class="bachelor-subitem" type="button" onclick="showMasterePresentation('cybermanagement')">Mastère Cybersécurité & Management</button>
            <button class="bachelor-subitem" type="button" onclick="showMasterePresentation('greenit')">Mastère Green IT</button>
          </div>

          <div class="bachelor-presentation-area">
            <div id="mastere-presentation-fullstack" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — Mastère Dev. manager full stack</h4>
              <p>Le Mastère Dev Manager Fullstack combine à la fois les compétences techniques avancées en développement et en gestion de projets, notamment avec les méthodes Agiles telles que Kanban. L’approche DevOps, les modules dédiés à l’IA ou encore la sensibilisation au TDD permettront aux futurs experts, de se démarquer et de s’intégrer dans tout type de structures.</p>
            </div>

            <div id="mastere-presentation-dataia" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — Mastère Data engineering & IA</h4>
              <p>Le Mastère Data Engineering & AI forme des experts capables de comprendre et de maîtriser les technologies associées à la gestion de données, à l’IA et au Cloud. Les futurs diplômés seront ainsi capables d’analyser et de développer une solution permettant le traitement de volumes importants de données, tout en garantissant la sécurité de celles-ci dans le Cloud.</p>
            </div>

            <div id="mastere-presentation-cyber" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — Mastère Cybersécurité</h4>
              <p>Le Mastère Cybersécurité forme des experts capables de mobiliser les dernières avancées en Intelligence Artificielle au service de la fonction cyber. Le programme allie compétences techniques, stratégiques et managériales pour relever les défis actuels et futurs de la cybersécurité. Trois options possibles en M2.</p>
            </div>

            <div id="mastere-presentation-cybermanagement" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — Mastère Cybersécurité & Management</h4>
              <p>Grâce à ses enseignements pluridisciplinaires reposant sur des compétences d’ordre à la fois managériales et d’ingénieries, le Mastère Cybersécurité & Management est un cursus innovant qui forme des cadres capables de répondre aux problématiques stratégiques de la cybersécurité.</p>
            </div>

            <div id="mastere-presentation-greenit" class="bachelor-presentation-card" style="display:none;">
              <h4>Présentation — Mastère Green IT</h4>
              <p>Le programme intègre des compétences en audit, en pilotage de projets Green IT, en élaboration de feuilles de route et en reporting environnemental. Le Mastère Green IT met l’accent sur la sensibilisation des parties prenantes, la conduite du changement, la formation des collaborateurs, et la mise en œuvre de bonnes pratiques au quotidien. Elle intègre également des thématiques innovantes comme l’intelligence artificielle, la blockchain ou la sobriété numérique, toujours dans une optique de durabilité.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</section>

<?php include 'footer.php'; ?>
<script src="../js/cours.js"></script>
</body>
</html>