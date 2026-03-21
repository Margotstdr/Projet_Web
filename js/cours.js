document.addEventListener("DOMContentLoaded", function () {
  var cards = document.querySelectorAll(".program-card");
  var panels = document.querySelectorAll(".program-panel");

  function closeAllPanels() {
    panels.forEach(function (p) {
      p.classList.remove("is-open");
    });
    cards.forEach(function (c) {
      c.classList.remove("is-active");
    });
  }

  function hideAllDetails() {
    var area = document.getElementById("detailsArea");
    if (area) area.style.display = "none";

    document.querySelectorAll(".details__content").forEach(function (el) {
      el.style.display = "none";
    });

    var majeuresMenu = document.getElementById("majeuresMenu");
    if (majeuresMenu) majeuresMenu.style.display = "none";
  }

  cards.forEach(function (card) {
    card.addEventListener("click", function () {
      var target = card.getAttribute("data-target");
      if (!target) return;

      var panel = document.getElementById(target);
      if (!panel) return;

      var alreadyOpen = panel.classList.contains("is-open");

      closeAllPanels();
      hideAllDetails();

      if (!alreadyOpen) {
        panel.classList.add("is-open");
        card.classList.add("is-active");
      }
    });
  });

  closeAllPanels();
  hideAllDetails();
});

function openDetails(key) {
  var area = document.getElementById("detailsArea");
  var title = document.getElementById("detailsTitle");
  if (!area || !title) return;

  document.querySelectorAll(".details__content").forEach(function (el) {
    el.style.display = "none";
  });

  var majeuresMenu = document.getElementById("majeuresMenu");
  if (majeuresMenu) majeuresMenu.style.display = "none";

  var target = document.getElementById("details-" + key);
  if (target) target.style.display = "block";

  area.style.display = "block";

  var map = {
    prepas: "Prépas Intégrées",
    ingenieur: "Cycle Ingénieur",
    majeures: "Majeures de spécialisation",
    bachelors: "Bachelors / Licences",
    masteres: "Mastères"
  };

  title.textContent = map[key] || "Détails";

  area.scrollIntoView({ behavior: "smooth", block: "start" });
}

function closeDetails() {
  var area = document.getElementById("detailsArea");
  if (area) area.style.display = "none";

  document.querySelectorAll(".details__content").forEach(function (el) {
    el.style.display = "none";
  });

  var majeuresMenu = document.getElementById("majeuresMenu");
  if (majeuresMenu) majeuresMenu.style.display = "none";
}

function toggleMajeuresMenu() {
  var menu = document.getElementById("majeuresMenu");
  if (!menu) return;

  var isOpen = menu.style.display === "block";
  menu.style.display = isOpen ? "none" : "block";
}

document.addEventListener("click", function (e) {
  var btn = e.target.closest ? e.target.closest(".acc__btn") : null;
  if (!btn) return;

  var acc = btn.closest(".acc");
  if (!acc) return;

  var panel = acc.querySelector(".acc__panel");
  var icon = btn.querySelector(".acc__icon");
  if (!panel) return;

  var isOpen = panel.style.display === "block";

  var card = btn.closest(".prepasCard");
  if (card) {
    card.querySelectorAll(".acc__panel").forEach(function (p) {
      p.style.display = "none";
    });
    card.querySelectorAll(".acc__icon").forEach(function (i) {
      i.textContent = "+";
    });
  }

  panel.style.display = isOpen ? "none" : "block";
  if (icon) icon.textContent = isOpen ? "+" : "-";
});

function showMajeureGroup(groupKey) {
  document.querySelectorAll(".majeure-group").forEach(function (el) {
    el.style.display = "none";
  });

  document.querySelectorAll(".majeures-main-link").forEach(function (el) {
    el.classList.remove("is-active");
  });

  var target = document.getElementById("majeure-group-" + groupKey);
  if (target) {
    target.style.display = "grid";
  }

  var clicked = document.querySelector('.majeures-main-link[onclick*="' + groupKey + '"]');
  if (clicked) {
    clicked.classList.add("is-active");
  }
}

function showBachelorGroup(groupKey) {
  document.querySelectorAll(".bachelor-group").forEach(function (el) {
    el.style.display = "none";
  });

  document.querySelectorAll(".bachelors-main-link").forEach(function (el) {
    el.classList.remove("is-active");
  });

  var target = document.getElementById("bachelor-group-" + groupKey);
  if (target) {
    target.style.display = "grid";
  }

  var clicked = document.querySelector('.bachelors-main-link[onclick*="' + groupKey + '"]');
  if (clicked) {
    clicked.classList.add("is-active");
  }
}