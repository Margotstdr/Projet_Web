<?php
session_start();
include 'db.php';

$login = $_POST['login'];
$mdp = $_POST['mdp'];

// 1. On cherche chez les étudiants
$queryEtu = $pdo->prepare("SELECT * FROM Etudiant WHERE login_etu = ?");
$queryEtu->execute([$login]);
$userEtu = $queryEtu->fetch();

if ($userEtu && password_verify($mdp, $userEtu['mdp_etu'])) {
    $_SESSION['user_id'] = $userEtu['id_etu'];
    $_SESSION['role'] = 'etudiant';
    $_SESSION['nom'] = $userEtu['nom_etu'];
    header('Location: accueil_etudiant.php');
    exit();
}

// 2. Si pas trouvé, on cherche chez les profs
$queryProf = $pdo->prepare("SELECT * FROM Enseignants WHERE login_ens = ?");
$queryProf->execute([$login]);
$userProf = $queryProf->fetch();

if ($userProf && password_verify($mdp, $userProf['mdp_ens'])) {
    $_SESSION['user_id'] = $userProf['id_ens'];
    $_SESSION['role'] = 'prof';
    $_SESSION['nom'] = $userProf['nom_ens'];
    header('Location: gestion_permanences.php');
    exit();
}

echo "Identifiants incorrects.";
?>

<?php
session_start();
include 'db.php';

if ($_SESSION['role'] === 'etudiant') {
    $id_etu = $_SESSION['user_id'];
    $id_perm = $_GET['id_perm']; // L'ID de la permanence choisie

    $sql = "INSERT INTO Inscrit (id_etu, id_perm) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$id_etu, $id_perm]);
        echo "Inscription validée !";
    } catch (Exception $e) {
        echo "Tu es déjà inscrit à cette permanence.";
    }
}
?>