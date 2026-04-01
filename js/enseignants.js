const profs = [
    {
        name: "Elias Hammada",
        role: "Enseignante-chercheuse",
        roleShort: "Enseignante-chercheuse",
        titleShort: "Responsable majeure Data Science",
        axe: "Données, Intelligence Artificielle & Société Numérique",
        mail : "elias.hammada@efrei.net",
        photo : "../data/img/elias.png",
        tags: ["Data Science", "Ethique du Numérique"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Bordeaux" },
            { label: "Recherche", text: "Axe <strong>Données & IA</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Data Science</strong>" },
        ]
    },
    {
        name:"Riham Badra",
        role: "Doctorante de l'axe recherche, sécurité et résilience numérique",
        roleShort: "Doctorante",
        titleShort: "Doctorante de l'axe recherche, sécurité et résilience numérique",
        axe: "Sécurité, Résilience & Confiance Numérique",
        mail : "riham.badra@efrei.net",
        photo : "../data/img/riham.png",
        tags: ["Sécurité", "Réseaux"],
        parcours: [
            { label: "Doctorat", text: "Doctorante en Informatique — Efrei" },
            { label: "Recherche", text: "Axe <strong>Sécurité & Résilience</strong> numérique — Efrei" },
        ]
    },
    {
        name: "Cherifa Ben Khelil",
        role: "Cherifa a obtenu son doctorat en 2019, réalisant une thèse en cotutelle entre l'École Nationale des Sciences de la Manouba en Tunisie (laboratoire RIADI), et l'université d'Orléans en France. Elle rejoint l'EFREI en 2024",
        roleShort: "Enseignante-chercheuse",
        titleShort: "Enseignante chercheuse en informatique",
        axe: "Données, Intelligence Artificielle & Société Numérique",
        mail : "cherifa.ben-khelil@efrei.net",
        photo : "../data/img/cherifa.png",
        tags: ["Recherche", "Intelligence Artificielle"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Données & IA</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Data Science</strong>" },
        ]
    },
    {
        name: "Laurie Conteville",
        role: "",
        roleShort: "Enseignant-chercheur",
        titleShort: "Responsable majeure Robotique",
        axe: "Sécurité, Résilience & Confiance Numérique",
        mail : "laurie.conteville@efrei.net",
        photo : "../data/img/laurie-conteville.jpeg",
        tags: ["IT for Finance", "Cybersécurité"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Berlin" },
            { label: "Recherche", text: "Axe <strong>Sécurité & Résilience</strong> numérique — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>IT for Finance</strong>" },
        ]
    },
    {
        name: "Asma Gabis",
        role: "Enseignante-chercheuse",
        roleShort: "Enseignante-chercheuse",
        titleShort: "Enseignante chercheuse de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "asma.gabis@efrei.net",
        photo : "../data/img/asma.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name :"Yvan Guifo Fodjo",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "yyvan.guifo-fodjo@efrei.net",
        photo : "../data/img/yvan.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name :"Mohamed Hamidi",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "mohamed.hamidi@efrei.net",
        photo : "../data/img/mohamed.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name: "Kais Klai",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "kais.klai@efrei.net",
        photo : "../data/img/kais.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name :"Mourad Kmimech",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "mourad.kmimech@efrei.net",
        photo : "../data/img/mourad.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name:"Rado Rakotonarivo",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "rado.rakotonarivo@efrei.net",
        photo : "../data/img/rado.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name :"Michaël Ta",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "michaël.ta@efrei.net",
        photo : "../data/img/michael.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name : "Lena Trebaul",
        role: "Enseignante-chercheuse",
        roleShort: "Enseignante-chercheuse",
        titleShort: "Enseignante chercheuse de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "lena.trebaul@efrei.net",
        photo : "../data/img/lena.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name : "Kamel Chabchoub",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "kamel.chabchoub@efrei.net",
        photo : "../data/img/kamel.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name:"Soglo Yaovi",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "yaovi.soglo@efrei.net",
        photo : "../data/img/soglo.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name: "Fériel Bouakkaz",
        role: "Enseignante-chercheuse",
        roleShort: "Enseignante-chercheuse",
        titleShort: "Enseignante chercheuse de l'axe de recherche Sécurité, Résilience & Confiance Numérique",
        axe: "Sécurité, Governance & Société Numérique",
        mail : "feriel.bouakkaz@efrei.net",
        photo : "../data/img/fériel.png",
        tags: ["Sécurité", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Marseille" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]

    },
    {
        name: "Johannes Gomolka",
        role: "Johannes est titulaire d'un doctorat en sciences politiques et informatique de gestion à l'université de Potsdam en 2011, et dirige la majeure IT for Finance depuis 2018",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant-chercheur de l'axe de recherche Sécurité, Résilience et Confiance Numérique, Responsable de la majeure IT for Finance",
        axe: "Sécurité, Résilience & Confiance Numérique",
        mail : "johannes.gomolka@efrei.net",
        photo : "../data/img/johannes.jpeg",
        tags: ["IT for Finance", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Toulouse" },
            { label: "Recherche", text: "Axe <strong>Sécurité & Résilience</strong> numérique — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>IT for Finance</strong>" },
        ]
    },
    {
        name: "Yulliwas Ameur",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Responsable majeure Software Engineering",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "yulliwas.ameur@efrei.net",
        photo : "../data/img/yulliwas.png",
        tags: ["Software Engineering", "Cloud Computing"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lille" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    
    
];

const SLOTS = [
    { scale: 1,    opacity: 1,    zIndex: 10 },
    { scale: 0.78, opacity: 0.72, zIndex: 7  },
    { scale: 0.60, opacity: 0.42, zIndex: 4  },
];
const OFFSETS = [0, 310, 580];

let current = 0;
const stage  = document.getElementById('stage');
const dotsEl = document.getElementById('dots');
const curEl  = document.getElementById('cur');
const totEl  = document.getElementById('tot');
const cardEls = [];

function buildCards() {
    stage.innerHTML = '';
    dotsEl.innerHTML = '';
    totEl.textContent = profs.length;

    profs.forEach((p, i) => {
        const wrap = document.createElement('div');
        wrap.className = 'card-wrapper';
        wrap.innerHTML = `
            <div class="card-flip">
                <div class="card-face card-front">
                    <div class="card-photo-zone">
                        <img src="${p.photo}" alt="${p.name}" class="card-photo">
                    </div>
                    <div class="card-front-info">
                        <div class="card-name">${p.name}</div>
                        <div class="card-title-short">${p.titleShort}</div>
                    </div>
                </div>
                <div class="card-face card-back">
                    <div class="card-back-name">${p.name}</div>
                    <p style="font-size:0.7rem">${p.role}</p>
                    <div class="card-back-tags">
                        ${p.tags.map(t => `<span class="tag">${t}</span>`).join('')}
                    </div>
                </div>
            </div>
        `;

        wrap.addEventListener('click', () => {
            if (i === current) wrap.classList.toggle('flipped');
            else goTo(i);
        });

        stage.appendChild(wrap);
        cardEls.push(wrap);

        const dot = document.createElement('div');
        dot.className = 'dot';
        dot.addEventListener('click', () => goTo(i));
        dotsEl.appendChild(dot);
    });
    updatePositions();
}

function updatePositions() {
    const n = profs.length;
    curEl.textContent = current + 1;

    cardEls.forEach((el, i) => {
        let dist = i - current;
        if (dist > n/2) dist -= n;
        if (dist < -n/2) dist += n;

        const absDist = Math.abs(dist);
        const side = Math.sign(dist);

        if (absDist >= SLOTS.length) {
            el.style.opacity = '0';
            el.style.transform = `translateX(${side * 800}px) scale(0.5)`;
            el.classList.remove('active', 'flipped');
            return;
        }

        const slot = SLOTS[absDist];
        el.style.opacity = slot.opacity;
        el.style.zIndex = slot.zIndex;
        el.style.transform = `translateX(${side * OFFSETS[absDist]}px) scale(${slot.scale})`;
        el.classList.toggle('active', absDist === 0);
        if (absDist !== 0) el.classList.remove('flipped');
    });

    const allDots = dotsEl.querySelectorAll('.dot');
    allDots.forEach((d, i) => d.classList.toggle('active', i === current));
}

function goTo(i) {
    current = ((i % profs.length) + profs.length) % profs.length;
    updatePositions();
}

document.getElementById('prev').addEventListener('click', () => goTo(current - 1));
document.getElementById('next').addEventListener('click', () => goTo(current + 1));

buildCards();
        mail : "cherifa.ben-khelil@efrei.net",
        photo : "../data/img/cherifa.png",
        tags: ["Recherche", "Intelligence Artificielle"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Données & IA</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Data Science</strong>" },
        ]
    },
    {
        name: "Laurie Conteville",
        role: "",
        roleShort: "Enseignant-chercheur",
        titleShort: "Responsable majeure Robotique",
        axe: "Sécurité, Résilience & Confiance Numérique",
        mail : "laurie.conteville@efrei.net",
        photo : "../data/img/laurie-conteville.jpeg",
        tags: ["IT for Finance", "Cybersécurité"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Berlin" },
            { label: "Recherche", text: "Axe <strong>Sécurité & Résilience</strong> numérique — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>IT for Finance</strong>" },
        ]
    },
    {
        name: "Asma Gabis",
        role: "Enseignante-chercheuse",
        roleShort: "Enseignante-chercheuse",
        titleShort: "Enseignante chercheuse de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "asma.gabis@efrei.net",
        photo : "../data/img/asma.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name :"Yvan Guifo Fodjo",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "yyvan.guifo-fodjo@efrei.net",
        photo : "../data/img/yvan.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name :"Mohamed Hamidi",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "mohamed.hamidi@efrei.net",
        photo : "../data/img/mohamed.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name: "Kais Klai",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "kais.klai@efrei.net",
        photo : "../data/img/kais.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name :"Mourad Kmimech",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "mourad.kmimech@efrei.net",
        photo : "../data/img/mourad.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name:"Rado Rakotonarivo",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "rado.rakotonarivo@efrei.net",
        photo : "../data/img/rado.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name :"Michaël Ta",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "michaël.ta@efrei.net",
        photo : "../data/img/michael.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name : "Lena Trebaul",
        role: "Enseignante-chercheuse",
        roleShort: "Enseignante-chercheuse",
        titleShort: "Enseignante chercheuse de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "lena.trebaul@efrei.net",
        photo : "../data/img/lena.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name : "Kamel Chabchoub",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "kamel.chabchoub@efrei.net",
        photo : "../data/img/kamel.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name:"Soglo Yaovi",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant chercheur de l'axe de recherche Systèmes, Logiciels & Réseaux",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "yaovi.soglo@efrei.net",
        photo : "../data/img/soglo.png",
        tags: ["Systèmes", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lyon" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    {
        name: "Fériel Bouakkaz",
        role: "Enseignante-chercheuse",
        roleShort: "Enseignante-chercheuse",
        titleShort: "Enseignante chercheuse de l'axe de recherche Sécurité, Résilience & Confiance Numérique",
        axe: "Sécurité, Governance & Société Numérique",
        mail : "feriel.bouakkaz@efrei.net",
        photo : "../data/img/fériel.png",
        tags: ["Sécurité", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Marseille" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]

    },
    {
        name: "Johannes Gomolka",
        role: "Johannes est titulaire d'un doctorat en sciences politiques et informatique de gestion à l'université de Potsdam en 2011, et dirige la majeure IT for Finance depuis 2018",
        roleShort: "Enseignant-chercheur",
        titleShort: "Enseignant-chercheur de l'axe de recherche Sécurité, Résilience et Confiance Numérique, Responsable de la majeure IT for Finance",
        axe: "Sécurité, Résilience & Confiance Numérique",
        mail : "johannes.gomolka@efrei.net",
        photo : "../data/img/johannes.jpeg",
        tags: ["IT for Finance", "Réseaux"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Toulouse" },
            { label: "Recherche", text: "Axe <strong>Sécurité & Résilience</strong> numérique — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>IT for Finance</strong>" },
        ]
    },
    {
        name: "Yulliwas Ameur",
        role: "Enseignant-chercheur",
        roleShort: "Enseignant-chercheur",
        titleShort: "Responsable majeure Software Engineering",
        axe: "Systèmes, Logiciels & Réseaux",
        mail : "yulliwas.ameur@efrei.net",
        photo : "../data/img/yulliwas.png",
        tags: ["Software Engineering", "Cloud Computing"],
        parcours: [
            { label: "Thèse", text: "<strong>Dr. en Informatique</strong> — Université de Lille" },
            { label: "Recherche", text: "Axe <strong>Systèmes & Réseaux</strong> — Efrei" },
            { label: "Enseignement", text: "Responsable majeure <strong>Software Engineering</strong>" },
        ]
    },
    
    
];

const SLOTS = [
    { scale: 1,    opacity: 1,    zIndex: 10 },
    { scale: 0.78, opacity: 0.72, zIndex: 7  },
    { scale: 0.60, opacity: 0.42, zIndex: 4  },
];
const OFFSETS = [0, 310, 580];

let current = 0;
const stage  = document.getElementById('stage');
const dotsEl = document.getElementById('dots');
const curEl  = document.getElementById('cur');
const totEl  = document.getElementById('tot');
const cardEls = [];

function buildCards() {
    stage.innerHTML = '';
    dotsEl.innerHTML = '';
    totEl.textContent = profs.length;

    profs.forEach((p, i) => {
        const wrap = document.createElement('div');
        wrap.className = 'card-wrapper';
        wrap.innerHTML = `
            <div class="card-flip">
                <div class="card-face card-front">
                    <div class="card-photo-zone">
                        <img src="${p.photo}" alt="${p.name}" class="card-photo">
                    </div>
                    <div class="card-front-info">
                        <div class="card-name">${p.name}</div>
                        <div class="card-title-short">${p.titleShort}</div>
                    </div>
                </div>
                <div class="card-face card-back">
                    <div class="card-back-name">${p.name}</div>
                    <p style="font-size:0.7rem">${p.role}</p>
                    <div class="card-back-tags">
                        ${p.tags.map(t => `<span class="tag">${t}</span>`).join('')}
                    </div>
                </div>
            </div>
        `;

        wrap.addEventListener('click', () => {
            if (i === current) wrap.classList.toggle('flipped');
            else goTo(i);
        });

        stage.appendChild(wrap);
        cardEls.push(wrap);

        const dot = document.createElement('div');
        dot.className = 'dot';
        dot.addEventListener('click', () => goTo(i));
        dotsEl.appendChild(dot);
    });
    updatePositions();
}

function updatePositions() {
    const n = profs.length;
    curEl.textContent = current + 1;

    cardEls.forEach((el, i) => {
        let dist = i - current;
        if (dist > n/2) dist -= n;
        if (dist < -n/2) dist += n;

        const absDist = Math.abs(dist);
        const side = Math.sign(dist);

        if (absDist >= SLOTS.length) {
            el.style.opacity = '0';
            el.style.transform = `translateX(${side * 800}px) scale(0.5)`;
            el.classList.remove('active', 'flipped');
            return;
        }

        const slot = SLOTS[absDist];
        el.style.opacity = slot.opacity;
        el.style.zIndex = slot.zIndex;
        el.style.transform = `translateX(${side * OFFSETS[absDist]}px) scale(${slot.scale})`;
        el.classList.toggle('active', absDist === 0);
        if (absDist !== 0) el.classList.remove('flipped');
    });

    const allDots = dotsEl.querySelectorAll('.dot');
    allDots.forEach((d, i) => d.classList.toggle('active', i === current));
}

function goTo(i) {
    current = ((i % profs.length) + profs.length) % profs.length;
    updatePositions();
}

document.getElementById('prev').addEventListener('click', () => goTo(current - 1));
document.getElementById('next').addEventListener('click', () => goTo(current + 1));

buildCards();
