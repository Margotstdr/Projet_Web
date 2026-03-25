function ouvrirModal(idPerm, matiere, heure) {
    document.getElementById('modal-titre').textContent = matiere + ' · ' + heure;
    const liste = document.getElementById('modal-liste');
    const vide  = document.getElementById('modal-vide');
    liste.innerHTML = '';
    const etudiants = inscritsData[idPerm] || [];

    if (etudiants.length === 0) {
        liste.style.display = 'none';
        vide.style.display  = 'block';
    } else {
        liste.style.display = 'block';
        vide.style.display  = 'none';
        etudiants.forEach(e => {
            const li = document.createElement('li');
            li.innerHTML = `<strong>${e.prenom} ${e.nom}</strong><br><span>${e.mail}</span>`;
            liste.appendChild(li);
        });
    }
    document.getElementById('modal-overlay').classList.add('open');
}

function fermerModal(event) {
    if (event === null || event.target === document.getElementById('modal-overlay')) {
        document.getElementById('modal-overlay').classList.remove('open');
    }
}

// Fermer avec Échap
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') fermerModal(null);
});
