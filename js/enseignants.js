const track = document.querySelector('.carousel-track');
const nextBtn = document.querySelector('.next');
const prevBtn = document.querySelector('.prev');

nextBtn.addEventListener('click', () => {
    // On déplace le scroll vers la droite de la largeur d'une carte
    track.scrollBy({ left: track.offsetWidth, behavior: 'smooth' });
});

prevBtn.addEventListener('click', () => {
    // On déplace le scroll vers la gauche
    track.scrollBy({ left: -track.offsetWidth, behavior: 'smooth' });
});

// Optionnel : gestion de la boucle (retour au début)
track.addEventListener('scroll', () => {
    // Si on veut ajouter une logique de boucle complexe, 
    // MDN suggère souvent de simplement laisser l'utilisateur scroller, 
    // mais pour un projet d'école, ce bouton simple suffit !
});