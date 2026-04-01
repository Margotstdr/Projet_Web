document.addEventListener("DOMContentLoaded", function () {
  var cards  = document.querySelectorAll(".program-card");
  var panels = document.querySelectorAll(".program-panel");

  // Ferme tous les panneaux de formation (Grande École, Technologie & Numérique...)
  function closeAllPanels() {
    panels.forEach(function (p) { p.classList.remove("is-open"); });
    cards.forEach(function (c)  { c.classList.remove("is-active"); });
  }

  // Masque la zone de détails (sous-sections : majeures, bachelors, etc.)
  // Je regroupe tout ici pour pouvoir réinitialiser l'état d'un seul appel
  function hideAllDetails() {
    var area = document.getElementById("detailsArea");
    if (area) area.style.display = "none";

    document.querySelectorAll(".details__content").forEach(function (el) {
      el.style.display = "none";
    });

    document.querySelectorAll(".majeure-group, .bachelor-group").forEach(function (el) {
      el.style.display = "none";
    });

    document.querySelectorAll(".majeures-main-link, .bachelors-main-link").forEach(function (el) {
      el.classList.remove("is-active");
    });

    document.querySelectorAll(".majeure-presentation-card, .bachelor-presentation-card").forEach(function (el) {
      el.style.display = "none";
    });
  }

  // Clic sur une carte de formation (ex: "Grande École")
  cards.forEach(function (card) {
    card.addEventListener("click", function () {
      var target = card.getAttribute("data-target");  // ex: "panel-grande-ecole"
      if (!target) return;

      var panel      = document.getElementById(target);
      if (!panel) return;

      // Toggle : si le panneau est déjà ouvert, on le referme (clic = fermer)
      var alreadyOpen = panel.classList.contains("is-open");

      closeAllPanels();
      hideAllDetails();

      if (!alreadyOpen) {
        panel.classList.add("is-open");
        card.classList.add("is-active");
      }
    });
  });

  // État initial : tout fermé au chargement de la page
  closeAllPanels();
  hideAllDetails();
});

// Affiche la zone de détails pour une section donnée (ex: "bachelors", "majeures"...)
// key correspond à l'attribut data-key des boutons dans le HTML
function openDetails(key) {
  var area  = document.getElementById("detailsArea");
  var title = document.getElementById("detailsTitle");
  if (!area || !title) return;

  // On masque tout avant de réafficher la bonne section
  document.querySelectorAll(".details__content").forEach(function (el) { el.style.display = "none"; });
  document.querySelectorAll(".majeure-group, .bachelor-group").forEach(function (el) { el.style.display = "none"; });
  document.querySelectorAll(".majeures-main-link, .bachelors-main-link").forEach(function (el) { el.classList.remove("is-active"); });
  document.querySelectorAll(".majeure-presentation-card, .bachelor-presentation-card").forEach(function (el) { el.style.display = "none"; });

  var target = document.getElementById("details-" + key);  // ex: "details-bachelors"
  if (target) target.style.display = "block";

  area.style.display = "block";

  // Correspondance clé → titre lisible affiché au-dessus de la zone de détails
  var map = {
    prepas: "Prépas Intégrées",
    ingenieur: "Cycle Ingénieur",
    majeures: "Majeures de spécialisation",
    bts: "BTS",
    bachelors: "Bachelors / Licences",
    masteres: "Mastères"
  };
  title.textContent = map[key] || "Détails";

  // setTimeout(..., 0) : on laisse le DOM se mettre à jour (display:block ci-dessus)
  // avant d'appeler les fonctions de sous-groupe qui ont besoin que l'élément soit visible
  if (key === "bachelors") {
    setTimeout(function () { showBachelorGroup("licences"); }, 0);
  }
  if (key === "bts") {
    setTimeout(function () { showBtsGroup("sio"); }, 0);
  }
  if (key === "masteres") {
    setTimeout(function () { showMastereGroup("main"); }, 0);
  }

  // Scroll automatique vers la zone de détails après l'ouverture
  area.scrollIntoView({ behavior: "smooth", block: "start" });
}

function closeDetails() {
  var area = document.getElementById("detailsArea");
  if (area) area.style.display = "none";

  document.querySelectorAll(".details__content").forEach(function (el) {
    el.style.display = "none";
  });

  document.querySelectorAll(".majeure-group, .bachelor-group").forEach(function (el) {
    el.style.display = "none";
  });

  document.querySelectorAll(".majeures-main-link, .bachelors-main-link").forEach(function (el) {
    el.classList.remove("is-active");
  });

  document.querySelectorAll(".majeure-presentation-card, .bachelor-presentation-card").forEach(function (el) {
    el.style.display = "none";
  });
}

// Gestion des accordéons (sections dépliables dans les fiches de formation)
// Délégation d'événement : un seul listener sur document au lieu d'un par bouton
document.addEventListener("click", function (e) {
  // closest() remonte dans les parents jusqu'à trouver .acc__btn (ou null si absent)
  var btn = e.target.closest ? e.target.closest(".acc__btn") : null;
  if (!btn) return;  // clic ailleurs dans la page → on ignore

  var acc   = btn.closest(".acc");
  if (!acc) return;

  var panel = acc.querySelector(".acc__panel");
  var icon  = btn.querySelector(".acc__icon");   // le "+" ou "-" affiché
  if (!panel) return;

  var isOpen = panel.style.display === "block";

  // Dans une carte .prepasCard, un seul accordéon peut être ouvert à la fois :
  // on ferme tous les autres avant d'ouvrir celui-ci
  var card = btn.closest(".prepasCard");
  if (card) {
    card.querySelectorAll(".acc__panel").forEach(function (p) { p.style.display = "none"; });
    card.querySelectorAll(".acc__icon").forEach(function (i) { i.textContent = "+"; });
  }

  // Toggle : ouvrir si fermé, fermer si ouvert
  panel.style.display = isOpen ? "none" : "block";
  if (icon) icon.textContent = isOpen ? "+" : "-";
});

// Affiche un groupe de majeures (Data, IT, Sécurité, Embarqué, Alternance)
// et marque le lien de navigation correspondant comme actif
function showMajeureGroup(groupKey) {
  // On cache tous les groupes avant d'afficher le bon
  document.querySelectorAll(".majeure-group").forEach(function (el) { el.style.display = "none"; });
  document.querySelectorAll(".majeures-main-link").forEach(function (el) { el.classList.remove("is-active"); });
  document.querySelectorAll(".majeure-presentation-card").forEach(function (el) { el.style.display = "none"; });

  var target = document.getElementById("majeure-group-" + groupKey);
  if (target) target.style.display = "grid";  // grille de cartes de majeures

  // Retrouver le lien de nav qui appelle cette fonction pour le mettre en actif
  var clicked = document.querySelector('.majeures-main-link[onclick*="' + groupKey + '"]');
  if (clicked) clicked.classList.add("is-active");
}

function showMajeurePresentation(key) {
  document.querySelectorAll(".majeure-presentation-card").forEach(function (el) {
    el.style.display = "none";
  });

  var target = document.getElementById("presentation-" + key);
  if (target) {
    target.style.display = "block";
  }
}

function showBachelorGroup(groupKey) {
  document.querySelectorAll("#details-bachelors .bachelor-group").forEach(function (el) {
    el.style.display = "none";
  });

  document.querySelectorAll("#details-bachelors .bachelors-main-link").forEach(function (el) {
    el.classList.remove("is-active");
  });

  document.querySelectorAll("#details-bachelors .bachelor-presentation-card").forEach(function (el) {
    el.style.display = "none";
  });

  var target = document.getElementById("bachelor-group-" + groupKey);
  if (target) {
    target.style.display = "grid";
  }

  var clicked = document.querySelector('#details-bachelors .bachelors-main-link[onclick*="' + groupKey + '"]');
  if (clicked) {
    clicked.classList.add("is-active");
  }
}

function showBachelorPresentation(key) {
  document.querySelectorAll("#details-bachelors .bachelor-presentation-card").forEach(function (el) {
    el.style.display = "none";
  });

  var target = document.getElementById("bachelor-presentation-" + key);
  if (target) {
    target.style.display = "block";
  }
}

function showBtsGroup(groupKey) {
  document.querySelectorAll("#details-bts .bachelor-group").forEach(function (el) {
    el.style.display = "none";
  });

  document.querySelectorAll("#details-bts .bachelors-main-link").forEach(function (el) {
    el.classList.remove("is-active");
  });

  document.querySelectorAll("#details-bts .bachelor-presentation-card").forEach(function (el) {
    el.style.display = "none";
  });

  var target = document.getElementById("bts-group-" + groupKey);
  if (target) {
    target.style.display = "grid";
  }

  var clicked = document.querySelector('#details-bts .bachelors-main-link[onclick*="' + groupKey + '"]');
  if (clicked) {
    clicked.classList.add("is-active");
  }
}

function showMastereGroup(groupKey) {
  document.querySelectorAll("#details-masteres .bachelor-group").forEach(function (el) {
    el.style.display = "none";
  });

  document.querySelectorAll("#details-masteres .bachelors-main-link").forEach(function (el) {
    el.classList.remove("is-active");
  });

  document.querySelectorAll("#details-masteres .bachelor-presentation-card").forEach(function (el) {
    el.style.display = "none";
  });

  var target = document.getElementById("mastere-group-" + groupKey);
  if (target) {
    target.style.display = "grid";
  }

  var clicked = document.querySelector('#details-masteres .bachelors-main-link[onclick*="' + groupKey + '"]');
  if (clicked) {
    clicked.classList.add("is-active");
  }
}

function showMasterePresentation(key) {
  document.querySelectorAll("#details-masteres .bachelor-presentation-card").forEach(function (el) {
    el.style.display = "none";
  });

  var target = document.getElementById("mastere-presentation-" + key);
  if (target) {
    target.style.display = "block";
  }
}
