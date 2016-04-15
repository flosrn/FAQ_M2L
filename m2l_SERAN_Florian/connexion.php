<?php

$message = "";

if (isset($_POST['submit'])) { //Si on appuie sur "Connexion"
    include 'db_con.php';

    $pseudo = $_POST['pseudo'];
    $mdp = sha1($_POST['mdp']);

    $sql = "SELECT * 
              FROM user 
              WHERE pseudo='$pseudo'
              AND password='$mdp'";

    try {
        $resultat = $con->query($sql);
        $row = $resultat->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de la requête SQL: " . $e->getMessage());
    }

    if ($row != false) {
        $_SESSION['pseudo'] = $row['pseudo'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['id_usertype'] = $row['id_usertype'];
        $message = "Bienvenue " . $_SESSION['pseudo'];
        header('location: index.php');
    } else {
        $message = "<font color='red'>Pour vous connecter veuillez saisir des identifiants valides!</font>";
    }
}
?>