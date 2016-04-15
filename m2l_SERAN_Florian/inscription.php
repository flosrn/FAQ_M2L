<?php
$message = "";

if (isset($_POST['submit'])) { //Si l'utilisateur appuie sur le bouton "S'inscire"
    include 'db_con.php';

    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $mail = $_POST['mail'];
    $ligue = $_POST['ligue'];
    $mdp = sha1($_POST['mdp']);
    $test = "select pseudo, mail from user";


    try {
        $restest = $con->query($test);
        $rows = $restest->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de la requête SQL: " . $e->getMessage());
    }
$exists=0;
    while($rows = $restest->fetch(PDO::FETCH_ASSOC)) {
        if(($pseudo == $rows['pseudo']) || ($mail == $rows['mail'])) {
            $exists = 1;
            break;
        }
    }

    if($exists != 1) {
        //On insère les données dans la table à travers une requête SQL
        $sql = "INSERT INTO user(pseudo, password, mail, id_usertype, id_ligue)
                    VALUES ('$pseudo', '$mdp', '$mail', '1', '$ligue')";

        try {
            $con->exec($sql);
            $message = $_POST['pseudo'] . " votre inscription a bien été prise en compte!";
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL: " . $e->getMessage());
        }
    }
    else {
        $message = "Le pseudo ou le mail est déja utilisé";
    }
}
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Site_SIO</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/menu.css">
        <script src="js/script.js"></script>
        <script type="text/javascript"></script>
    </head>
    <body>
        <div id="conteneur">
            <?php include("inc/entete.php") ?>
            <?php include("inc/menu.php") ?>

            <div id="contenu">

                <!--Formulaire d'inscription-->
                <h1>Inscription</h1>
                <p>Veuillez saisir les informations demandées pour vous inscrire<p>
                <form id = "formulaireinscription" method="post" action="">
                    <label>Pseudo: </label>
                    <input type="text" name="pseudo" placeholder="Pseudo" required><br/><br/>

                    <label>Mot de passe:</label>
                    <input type="password" name="mdp" placeholder="Mot de passe" required><br/><br/>

                    <label>Adresse mail: </label>
                    <input type="email" name="mail" value="@m2l.com" required><br/><br/> 

                    <label>Ligue : </label>
                    <select name="ligue" id="ligue">
                        <option value="1">Ligue d'escrime</option>
                        <option value="2">Ligue de badminton</option>
                        <option value="3" selected="selected">Ligue de volleyball</option> 
                        <option value="4">Ligue de snowboard</option>
                    </select>
                    <br/><br/>
                    <input type="submit" name="submit" value="S'inscrire"><!--Bouton submit-->
                    <input type="reset" name="reset" value="Réinitialiser"><!---Bouton reset-->
                </form>
                <?php echo "<p>$message</p>"; ?>
            </div>
            <?php include("inc/pieddepage.php") ?>
        </div>
    </body>
</head>