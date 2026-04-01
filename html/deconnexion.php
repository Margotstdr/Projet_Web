<?php
session_start();
// session_destroy() supprime toutes les données côté serveur (user_id, role, nom...)
// sans session_start() avant, il ne trouverait pas la session à détruire
session_destroy();
header('Location: accueil.php');
// exit() est obligatoire après header() : sans lui, PHP continuerait à exécuter
// le code qui suit malgré la redirection envoyée au navigateur
exit();
