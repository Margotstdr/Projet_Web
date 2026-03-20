<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz EFREI - Quelle filière est faite pour moi ?</title>
    <link rel="stylesheet" href="../css/quiz.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <h1>Quelle filière EFREI est faite pour moi ?</h1>
    <p>Réponds à ces questions pour découvrir si le <strong>Cycle Ingénieur</strong> ou un <strong>Bachelor</strong> te correspond le mieux, et laquelle des filières EFREI est faite pour toi.</p>

    <!-- Conteneur principal du quiz. Chaque question est un bloc caché par défaut (display:none), sauf la première qui est visible au chargement de la page. -->
    <div id="quiz">

        <!-- Question 1 : niveau en maths (détermine si l'utilisateur penche vers ingénieur ou bachelor) -->
        <div class="question" id="q1-block">
            <p><strong>Question 1 / 6</strong></p>
            <p>Comment te situes-tu en mathématiques et sciences ?</p>
            <label><input type="radio" name="q1" value="a"> J'adore les maths, c'est vraiment mon point fort</label><br>
            <label><input type="radio" name="q1" value="b"> J'ai un niveau correct, pas exceptionnel</label><br>
            <label><input type="radio" name="q1" value="c"> Les maths ne sont vraiment pas mon truc</label><br>
            <!-- next(idActuel, idSuivant, nomDuChamp) : cache la question actuelle et affiche la suivante -->
            <br><button type="button" onclick="next('q1-block', 'q2-block', 'q1')">Suivant</button>
        </div>

        <!-- Question 2 : durée et type de formation souhaitée -->
        <div class="question" id="q2-block" style="display:none;">
            <p><strong>Question 2 / 6</strong></p>
            <p>Quel type de formation te correspond le mieux ?</p>
            <label><input type="radio" name="q2" value="a"> Une formation longue (5 ans) avec des bases théoriques solides et un titre d'ingénieur reconnu</label><br>
            <label><input type="radio" name="q2" value="b"> Une formation courte et pratique (3 ans) pour entrer rapidement dans la vie active</label><br>
            <br><button type="button" onclick="next('q2-block', 'q3-block', 'q2')">Suivant</button>
        </div>

        <!-- Question 3 : domaine technique d'intérêt (oriente vers une filière spécifique) -->
        <div class="question" id="q3-block" style="display:none;">
            <p><strong>Question 3 / 6</strong></p>
            <p>Dans quel domaine du numérique veux-tu te spécialiser ?</p>
            <label><input type="radio" name="q3" value="data"> Intelligence artificielle, Big Data, analyse de données</label><br>
            <label><input type="radio" name="q3" value="sec"> Cybersécurité, protection des systèmes informatiques</label><br>
            <label><input type="radio" name="q3" value="reseau"> Réseaux, cloud, infrastructure informatique</label><br>
            <label><input type="radio" name="q3" value="dev"> Développement logiciel, web, applications mobiles</label><br>
            <label><input type="radio" name="q3" value="emb"> Systèmes embarqués, robotique, drones, espace, réalité virtuelle</label><br>
            <br><button type="button" onclick="next('q3-block', 'q4-block', 'q3')">Suivant</button>
        </div>

        <!-- Question 4 : mode de travail préféré (recherche vs terrain vs alternance) -->
        <div class="question" id="q4-block" style="display:none;">
            <p><strong>Question 4 / 6</strong></p>
            <p>Comment préfères-tu travailler ?</p>
            <label><input type="radio" name="q4" value="a"> Sur des projets de recherche et d'innovation complexes, avec une vision long terme</label><br>
            <label><input type="radio" name="q4" value="b"> Directement en entreprise sur des projets concrets et opérationnels</label><br>
            <label><input type="radio" name="q4" value="c"> En alternance dès le début (mi-école, mi-entreprise)</label><br>
            <br><button type="button" onclick="next('q4-block', 'q5-block', 'q4')">Suivant</button>
        </div>

        <!-- Question 5 : ambition professionnelle (titre ingénieur vs insertion rapide) -->
        <div class="question" id="q5-block" style="display:none;">
            <p><strong>Question 5 / 6</strong></p>
            <p>Quelle ambition professionnelle te correspond le mieux ?</p>
            <label><input type="radio" name="q5" value="a"> Je veux un titre d'ingénieur reconnu et viser des postes à haute responsabilité (CDO, CTO, chef de projet R&D...)</label><br>
            <label><input type="radio" name="q5" value="b"> Je veux une formation efficace et professionnalisante, rapidement opérationnelle sur le terrain</label><br>
            <br><button type="button" onclick="next('q5-block', 'q6-block', 'q5')">Suivant</button>
        </div>

        <!-- Question 6 : précision sur la cybersécurité (défense vs hacking offensif).Question optionnelle : une option "pas intéressé" est disponible.Dernière question → le bouton appelle calculateResult() au lieu de next() -->
        <div class="question" id="q6-block" style="display:none;">
            <p><strong>Question 6 / 6</strong></p>
            <p>Si tu t'orientes vers la cybersécurité, qu'est-ce qui t'attire le plus ?</p>
            <p><em>(Si tu n'es pas intéressé(e), choisis la dernière option)</em></p>
            <label><input type="radio" name="q6" value="a"> La sécurité des réseaux et systèmes d'information (défense, audit, RSSI)</label><br>
            <label><input type="radio" name="q6" value="b"> Le hacking éthique et les tests d'intrusion (pentesting, CTF)</label><br>
            <label><input type="radio" name="q6" value="skip"> Je ne suis pas intéressé(e) par la cybersécurité</label><br>
            <br><button type="button" onclick="calculateResult()">Voir mon résultat</button>
        </div>

    </div>

    <!-- Zone de résultat, cachée au départ et affichée après le calcul -->
    <div id="result" style="display:none;">
        <h2>Ta filière idéale :</h2>
        <p id="result-title"></p>
        <p id="result-description"></p>
        <br><button type="button" onclick="restart()">Recommencer</button>
    </div>
    
    <!-- Chargement du fichier JavaScript externe contenant la logique du quiz -->
    <script src="../js/quiz.js"></script>

    <?php include 'footer.php'; ?>


</body>
</html>
