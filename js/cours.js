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

  document.querySelectorAll(".majeure-group, .bachelor-group").forEach(function (el) {
    el.style.display = "none";
  });

  document.querySelectorAll(".majeures-main-link, .bachelors-main-link").forEach(function (el) {
    el.classList.remove("is-active");
  });

  document.querySelectorAll(".majeure-presentation-card, .bachelor-presentation-card").forEach(function (el) {
    el.style.display = "none";
  });

  var target = document.getElementById("details-" + key);
  if (target) target.style.display = "block";

  area.style.display = "block";

  var map = {
    prepas: "Prépas Intégrées",
    ingenieur: "Cycle Ingénieur",
    majeures: "Majeures de spécialisation",
    bts: "BTS",
    bachelors: "Bachelors / Licences",
    masteres: "Mastères"
  };

  title.textContent = map[key] || "Détails";

  if (key === "bachelors") {
    setTimeout(function () {
      showBachelorGroup("licences");
    }, 0);
  }

  if (key === "bts") {
    setTimeout(function () {
      showBtsGroup("sio");
    }, 0);
  }

  if (key === "masteres") {
    setTimeout(function () {
      showMastereGroup("main");
    }, 0);
  }

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

  document.querySelectorAll(".majeure-presentation-card").forEach(function (el) {
    el.style.display = "none";
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