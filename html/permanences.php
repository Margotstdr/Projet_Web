<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permanences</title>
    <!--<link rel="stylesheet" href="../css/style.css">-->
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="agenda">

        <h1>Permanences</h1>

        <div class="navigation-semaine">
            <a href="?semaine=-1" class="semaine-precedente">&#8249; Semaine précédente</a>
            <h2 class="titre-semaine">Semaine du 17 au 21 mars 2025</h2>
            <a href="?semaine=+1" class="semaine-suivante">Semaine suivante &#8250;</a>
        </div>

        <div class="grille-semaine">

            <!-- LUNDI -->
            <div class="jour" id="lundi">
                <h3>Lundi 17 mars</h3>

                <div class="permanence" id="perm-1">
                    <p class="heure">09h00 – 10h00</p>
                    <p class="prof">M. Martin</p>
                    <p class="matiere">Algorithmique</p>
                    <p class="salle">Salle 204</p>
                    <a href="#inscription-1" class="btn-inscrire">S'inscrire</a>
                </div>

                <div class="permanence" id="perm-2">
                    <p class="heure">14h00 – 15h00</p>
                    <p class="prof">Mme. Leroy</p>
                    <p class="matiere">Bases de données</p>
                    <p class="salle">Salle 102</p>
                    <a href="#inscription-2" class="btn-inscrire">S'inscrire</a>
                </div>

            </div>

            <!-- MARDI -->
            <div class="jour" id="mardi">
                <h3>Mardi 18 mars</h3>

                <div class="permanence" id="perm-3">
                    <p class="heure">10h00 – 11h00</p>
                    <p class="prof">Mme. Bernard</p>
                    <p class="matiere">Réseaux</p>
                    <p class="salle">Salle 108</p>
                    <a href="#inscription-3" class="btn-inscrire">S'inscrire</a>
                </div>

                <div class="permanence" id="perm-4">
                    <p class="heure">15h00 – 16h00</p>
                    <p class="prof">M. Dubois</p>
                    <p class="matiere">Développement Web</p>
                    <p class="salle">Salle 301</p>
                    <a href="#inscription-4" class="btn-inscrire">S'inscrire</a>
                </div>

            </div>

            <!-- MERCREDI -->
            <div class="jour" id="mercredi">
                <h3>Mercredi 19 mars</h3>

                <div class="permanence" id="perm-5">
                    <p class="heure">13h00 – 14h00</p>
                    <p class="prof">M. Petit</p>
                    <p class="matiere">Mathématiques</p>
                    <p class="salle">Salle 301</p>
                    <a href="#inscription-5" class="btn-inscrire">S'inscrire</a>
                </div>

            </div>

            <!-- JEUDI -->
            <div class="jour" id="jeudi">
                <h3>Jeudi 20 mars</h3>

                <div class="permanence" id="perm-6">
                    <p class="heure">09h00 – 10h00</p>
                    <p class="prof">M. Martin</p>
                    <p class="matiere">Algorithmique</p>
                    <p class="salle">Salle 204</p>
                    <a href="#inscription-6" class="btn-inscrire">S'inscrire</a>
                </div>

                <div class="permanence" id="perm-7">
                    <p class="heure">11h00 – 12h00</p>
                    <p class="prof">Mme. Leroy</p>
                    <p class="matiere">Bases de données</p>
                    <p class="salle">Salle 205</p>
                    <a href="#inscription-7" class="btn-inscrire">S'inscrire</a>
                </div>

                <div class="permanence" id="perm-8">
                    <p class="heure">14h00 – 15h00</p>
                    <p class="prof">Mme. Bernard</p>
                    <p class="matiere">Réseaux</p>
                    <p class="salle">Salle 108</p>
                    <a href="#inscription-8" class="btn-inscrire">S'inscrire</a>
                </div>

            </div>

            <!-- VENDREDI -->
            <div class="jour" id="vendredi">
                <h3>Vendredi 21 mars</h3>

                <div class="permanence" id="perm-9">
                    <p class="heure">11h00 – 12h00</p>
                    <p class="prof">M. Dubois</p>
                    <p class="matiere">Développement Web</p>
                    <p class="salle">Salle 102</p>
                    <a href="#inscription-9" class="btn-inscrire">S'inscrire</a>
                </div>

                <div class="permanence" id="perm-10">
                    <p class="heure">13h00 – 14h00</p>
                    <p class="prof">M. Petit</p>
                    <p class="matiere">Mathématiques</p>
                    <p class="salle">Salle 301</p>
                    <a href="#inscription-10" class="btn-inscrire">S'inscrire</a>
                </div>

            </div>

        </div><!-- fin .grille-semaine -->


        <!-- ===== FORMULAIRES D'INSCRIPTION ===== -->

        <div class="inscriptions">

            <div class="formulaire-inscription" id="inscription-1">
                <h3>Inscription — M. Martin &middot; Algorithmique &middot; Lundi 09h-10h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="1">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

            <div class="formulaire-inscription" id="inscription-2">
                <h3>Inscription — Mme. Leroy &middot; Bases de données &middot; Lundi 14h-15h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="2">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

            <div class="formulaire-inscription" id="inscription-3">
                <h3>Inscription — Mme. Bernard &middot; Réseaux &middot; Mardi 10h-11h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="3">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

            <div class="formulaire-inscription" id="inscription-4">
                <h3>Inscription — M. Dubois &middot; Développement Web &middot; Mardi 15h-16h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="4">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

            <div class="formulaire-inscription" id="inscription-5">
                <h3>Inscription — M. Petit &middot; Mathématiques &middot; Mercredi 13h-14h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="5">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

            <div class="formulaire-inscription" id="inscription-6">
                <h3>Inscription — M. Martin &middot; Algorithmique &middot; Jeudi 09h-10h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="6">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

            <div class="formulaire-inscription" id="inscription-7">
                <h3>Inscription — Mme. Leroy &middot; Bases de données &middot; Jeudi 11h-12h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="7">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

            <div class="formulaire-inscription" id="inscription-8">
                <h3>Inscription — Mme. Bernard &middot; Réseaux &middot; Jeudi 14h-15h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="8">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

            <div class="formulaire-inscription" id="inscription-9">
                <h3>Inscription — M. Dubois &middot; Développement Web &middot; Vendredi 11h-12h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="9">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

            <div class="formulaire-inscription" id="inscription-10">
                <h3>Inscription — M. Petit &middot; Mathématiques &middot; Vendredi 13h-14h</h3>
                <form method="post" action="">
                    <label>Nom <input type="text" name="nom" required></label>
                    <label>Prénom <input type="text" name="prenom" required></label>
                    <label>Email <input type="email" name="email" required></label>
                    <input type="hidden" name="permanence_id" value="10">
                    <button type="submit">Confirmer l'inscription</button>
                </form>
            </div>

        </div><!-- fin .inscriptions -->

    </div><!-- fin .agenda -->

    <?php include 'footer.php'; ?>

</body>
</html>
