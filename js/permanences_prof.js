// Ouvre la modale listant les étudiants inscrits à une permanence
// idPerm, matiere, heure sont passés depuis l'attribut onclick dans le HTML
function ouvrirModal(idPerm, matiere, heure) {
    document.getElementById('modal-titre').textContent = matiere + ' · ' + heure;
    const liste = document.getElementById('modal-liste');
    const vide  = document.getElementById('modal-vide');
    liste.innerHTML = '';  // on vide la liste au cas où une autre perm avait été ouverte avant

    // inscritsData est une variable JS injectée par PHP dans la page (objet JSON)
    // Le || [] évite une erreur si cet idPerm n'a aucun inscrit (pas de clé dans l'objet)
    const etudiants = inscritsData[idPerm] || [];

    if (etudiants.length === 0) {
        liste.style.display = 'none';
        vide.style.display  = 'block';  // affiche "Aucun étudiant inscrit."
    } else {
        liste.style.display = 'block';
        vide.style.display  = 'none';
        etudiants.forEach(e => {
            const li = document.createElement('li');
            li.innerHTML = `<strong>${e.prenom} ${e.nom}</strong><br><span>${e.mail}</span>`;
            liste.appendChild(li);
        });
    }
    // La modale est toujours dans le DOM, c'est la classe CSS 'open' qui la rend visible
    document.getElementById('modal-overlay').classList.add('open');
}

function fermerModal(event) {
    // event === null : appelé depuis le bouton "Fermer" (pas d'event à vérifier)
    // sinon : on vérifie que le clic était bien sur l'overlay et pas sur la modale elle-même
    if (event === null || event.target === document.getElementById('modal-overlay')) {
        document.getElementById('modal-overlay').classList.remove('open');
    }
}

// Fermer la modale avec la touche Échap (confort utilisateur)
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') fermerModal(null);
});
