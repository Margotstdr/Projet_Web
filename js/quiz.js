/**
 * Passe à la question suivante.
 * Vérifie qu'une réponse est bien cochée avant d'avancer.
 * @param {string} currentId - ID du bloc question actuel à cacher
 * @param {string} nextId    - ID du bloc question suivant à afficher
 * @param {string} name      - Attribut name du groupe de radios à valider
 */
function next(currentId, nextId, name) {
    const radios = document.querySelectorAll('input[name="' + name + '"]');
    const checked = Array.from(radios).some(r => r.checked);
    if (!checked) {
        alert('Merci de sélectionner une réponse avant de continuer.');
        return;
    }
    document.getElementById(currentId).style.display = 'none';
    document.getElementById(nextId).style.display = 'block';
}

/**
 * Calcule le résultat final après la dernière question.
 * Chaque réponse ajoute des points à une ou plusieurs filières.
 * La filière avec le score le plus élevé est affichée comme résultat.
 */
function calculateResult() {
    // Vérification que la dernière question a bien une réponse
    const radios = document.querySelectorAll('input[name="q6"]');
    const checked = Array.from(radios).some(r => r.checked);
    if (!checked) {
        alert('Merci de sélectionner une réponse avant de continuer.');
        return;
    }

    // Raccourci pour récupérer la valeur cochée d'un groupe de radios
    const val = name => document.querySelector('input[name="' + name + '"]:checked').value;

    // Tableau de scores : une entrée par filière possible.
    // ING_ = Cycle Ingénieur, BAC_ = Bachelor
    const scores = {
        ING_DATA: 0, // Ingénieur Data Science
        ING_IT:   0, // Ingénieur Technologies de l'Information
        ING_SEC:  0, // Ingénieur Sécurité & Réseaux
        ING_EMB:  0, // Ingénieur Systèmes Embarqués
        BAC_WEB:  0, // Bachelor Développeur Web & IA
        BAC_CYB:  0, // Bachelor Cybersécurité & Réseaux
        BAC_HACK: 0, // Bachelor Cybersécurité & Ethical Hacking
        BAC_INFO: 0  // Bachelor Informatique
    };

    // Q1 — Niveau en maths : favorise les filières ingénieur si fort en maths
    const q1 = val('q1');
    if (q1 === 'a') {
        // Fort en maths → boost toutes les filières ingénieur
        scores.ING_DATA += 3; scores.ING_IT += 3; scores.ING_SEC += 3; scores.ING_EMB += 3;
    } else if (q1 === 'b') {
        // Niveau moyen → léger bonus partout
        scores.ING_DATA += 1; scores.ING_IT += 1; scores.ING_SEC += 1; scores.ING_EMB += 1;
        scores.BAC_WEB += 1; scores.BAC_CYB += 1; scores.BAC_HACK += 1; scores.BAC_INFO += 1;
    } else {
        // Faible en maths → favorise les bachelors
        scores.BAC_WEB += 3; scores.BAC_CYB += 1; scores.BAC_HACK += 1; scores.BAC_INFO += 1;
    }

    // Q2 — Type de formation : question la plus déterminante ingénieur vs bachelor
    const q2 = val('q2');
    if (q2 === 'a') {
        // Veut 5 ans + titre ingénieur
        scores.ING_DATA += 4; scores.ING_IT += 4; scores.ING_SEC += 4; scores.ING_EMB += 4;
    } else {
        // Veut 3 ans + formation rapide
        scores.BAC_WEB += 4; scores.BAC_CYB += 4; scores.BAC_HACK += 4; scores.BAC_INFO += 4;
    }

    // Q3 — Domaine d'intérêt : oriente vers les filières techniques correspondantes
    const q3 = val('q3');
    if (q3 === 'data')   { scores.ING_DATA += 5; scores.BAC_INFO += 2; }
    if (q3 === 'sec')    { scores.ING_SEC += 5; scores.BAC_CYB += 3; scores.BAC_HACK += 3; }
    if (q3 === 'reseau') { scores.ING_SEC += 4; scores.ING_IT += 3; scores.BAC_CYB += 3; }
    if (q3 === 'dev')    { scores.ING_IT += 5; scores.BAC_WEB += 4; scores.BAC_INFO += 3; }
    if (q3 === 'emb')    { scores.ING_EMB += 6; } // Embarqué = uniquement disponible en ingénieur

    // Q4 — Mode de travail : recherche → ingénieur, terrain → bachelor, alternance → neutre
    const q4 = val('q4');
    if (q4 === 'a') {
        scores.ING_DATA += 2; scores.ING_IT += 2; scores.ING_SEC += 2; scores.ING_EMB += 2;
    } else if (q4 === 'b') {
        scores.BAC_WEB += 2; scores.BAC_CYB += 2; scores.BAC_HACK += 2; scores.BAC_INFO += 2;
    } else {
        // Alternance : léger bonus des deux côtés
        scores.ING_DATA += 1; scores.ING_IT += 1; scores.ING_SEC += 1; scores.ING_EMB += 1;
        scores.BAC_WEB += 1; scores.BAC_CYB += 1; scores.BAC_INFO += 1;
    }

    // Q5 — Ambition : titre ingénieur → ingénieur, opérationnel rapide → bachelor
    const q5 = val('q5');
    if (q5 === 'a') {
        scores.ING_DATA += 3; scores.ING_IT += 3; scores.ING_SEC += 3; scores.ING_EMB += 3;
    } else {
        scores.BAC_WEB += 3; scores.BAC_CYB += 3; scores.BAC_HACK += 3; scores.BAC_INFO += 3;
    }

    // Q6 — Cybersécurité (optionnel) : affine entre les deux filières cyber
    const q6 = val('q6');
    if (q6 === 'a') { scores.ING_SEC += 3; scores.BAC_CYB += 3; }  // Défense réseau
    if (q6 === 'b') { scores.BAC_HACK += 4; scores.ING_SEC += 2; } // Hacking offensif
    // Si q6 === 'skip' : aucun bonus, la question ne change rien au score

    // Descriptions affichées pour chaque filière en cas de victoire
    const descriptions = {
        ING_DATA: {
            title: "Cycle Ingénieur — Filière Data Science",
            desc:  "Tu as le profil d'un futur ingénieur spécialisé en Data Science ! À l'EFREI tu apprendras le machine learning, le Big Data, la Business Intelligence et l'IA appliquée. Cette filière forme des Data Scientists, Data Engineers et AI Engineers recherchés par les grands groupes comme les startups innovantes. Le titre d'ingénieur EFREI, reconnu CTI, te donnera accès aux postes les plus exigeants."
        },
        ING_IT: {
            title: "Cycle Ingénieur — Filière Technologies de l'Information",
            desc:  "Tu as le profil d'un futur ingénieur en Technologies de l'Information ! À l'EFREI tu développeras des compétences solides en génie logiciel, transformation digitale, cloud et développement d'applications. Parfait pour devenir Software Engineer, architecte cloud ou consultant IT dans des entreprises de toutes tailles."
        },
        ING_SEC: {
            title: "Cycle Ingénieur — Filière Sécurité & Réseaux",
            desc:  "Tu as le profil d'un futur ingénieur en Sécurité & Réseaux ! À l'EFREI tu te spécialiseras en cybersécurité, infrastructure réseau et cloud. Cette filière forme des ingénieurs cybersécurité, experts réseaux et consultants SSI très demandés face aux enjeux actuels de protection des systèmes d'information."
        },
        ING_EMB: {
            title: "Cycle Ingénieur — Filière Systèmes Embarqués",
            desc:  "Tu as le profil d'un futur ingénieur en Systèmes Embarqués ! À l'EFREI tu travailleras sur les systèmes temps-réel, la robotique, les drones, l'avionique, les énergies nouvelles et la réalité virtuelle. Idéal pour intégrer des secteurs passionnants comme l'aérospatiale, la défense, l'automobile ou l'industrie 4.0."
        },
        BAC_WEB: {
            title: "Bachelor Développeur Web & IA",
            desc:  "Le Bachelor Développeur Web & IA est fait pour toi ! Cette formation de 3 ans, pratique et professionnalisante, te permet de maîtriser le développement web front-end et back-end, les APIs et les applications intelligentes. Tu seras rapidement opérationnel(le) pour intégrer des entreprises du numérique ou des startups."
        },
        BAC_CYB: {
            title: "Bachelor Cybersécurité & Réseaux",
            desc:  "Le Bachelor Cybersécurité & Réseaux est fait pour toi ! En 3 ans tu apprendras à sécuriser les infrastructures, administrer les réseaux et protéger les systèmes d'information. Une formation professionnalisante idéale pour rejoindre rapidement les métiers de la sécurité informatique."
        },
        BAC_HACK: {
            title: "Bachelor Cybersécurité & Ethical Hacking",
            desc:  "Le Bachelor Cybersécurité & Ethical Hacking est fait pour toi ! Tu apprendras les techniques offensives — pentesting, CTF, ingénierie sociale, tests d'intrusion — pour mieux défendre les organisations. Idéal si tu veux devenir un expert en sécurité offensive, un profil rare et très recherché."
        },
        BAC_INFO: {
            title: "Bachelor Informatique",
            desc:  "Le Bachelor Informatique est fait pour toi ! Formation généraliste et solide en développement, algorithmes, bases de données et systèmes. Un socle polyvalent parfait pour entrer dans le monde du numérique ou poursuivre en mastère spécialisé."
        }
    };

    // On cherche la filière avec le score le plus élevé
    const winner = Object.keys(scores).reduce((a, b) => scores[a] > scores[b] ? a : b);

    // Affichage du résultat
    document.getElementById('result-title').innerHTML = '<strong>' + descriptions[winner].title + '</strong>';
    document.getElementById('result-description').textContent = descriptions[winner].desc;

    // On cache le quiz et on affiche le bloc résultat
    document.getElementById('quiz').style.display = 'none';
    document.getElementById('result').style.display = 'block';
}

/**
 * Réinitialise le quiz pour recommencer depuis le début.
 * Décoche toutes les radios, cache toutes les questions et réaffiche la première.
 */
function restart() {
    document.querySelectorAll('input[type="radio"]').forEach(r => r.checked = false);
    document.querySelectorAll('.question').forEach(q => q.style.display = 'none');
    document.getElementById('q1-block').style.display = 'block';
    document.getElementById('result').style.display = 'none';
    document.getElementById('quiz').style.display = 'block';
}
