<?php
// Footer commun à toutes les pages, inclus via include 'footer.php'
// J'utilise un echo pour générer le HTML entier d'un coup (peu orthodoxe mais ça fonctionne).
// Contient les liens réseaux sociaux et les coordonnées de contact de l'EFREI.
    echo '
        <link rel="stylesheet" href="../css/footer.css">

        <footer class="footer">
            <section class="liens">
                <a href="apropos.php"> A propos </a>
                <a href="https://www.facebook.com/EfreiParis/"> Facebook </a>
                <a href="https://x.com/Efrei_Paris"> X (Twitter) </a>
                <a href="https://www.youtube.com/efrei"> YouTube </a>
                <a href="https://www.instagram.com/efrei_paris/"> Instagram </a>
                <a href="https://www.linkedin.com/school/efrei/"> LinkedIn </a>
                <a href="https://www.tiktok.com/@be.efrei"> TikTok </a>
                <a href="https://www.twitch.tv/efrei_?lang=fr"> Twitch </a>
            </section>

            <section class="contact">
                <h5> Accueil </h5>
                <p> +33 188 289 000 </p>
                <p> admissions@efrei.fr </p>
                <p> 30-32 Avenue de la République, 94800 Villejuif </p>
            </section>
        </footer>
    ';
?>
