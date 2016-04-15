<?php
session_start();
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
      <?php
      if (isset($_SESSION['pseudo'])) {          //Si l'utilisateur est connecté 
      ?>

      <!--Formulaire de recherche-->
      <div id="recherche">
        <form method="post" action="liste_questions.php">
          Rechercher un mot :  <input type="text" name="recherche">
          <input type="submit" name="submit" value="Rechercher">
        </form>
      </div>

      <?php
      if ($_SESSION['id_usertype'] != 1 && $_SESSION['id_usertype'] != 3 ) {     //Si l'utilisateur est admin

        if (isset($_POST['submit'])) {         //Si l'utilisateur appuie sur le bouton "rechercher"
        //Connexion à la base
        $dsn = 'mysql:host=localhost;dbname=m2l v2.0';
        $con = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        //Requête SQL pour rechercher les mots dans la base
        $sql = "select id_faq, id_ligue, question, reponse, pseudo 
        from faq 
        join user on faq.id_user = user.id_user 
        where question like '%" . $_POST['recherche'] . "%'
        or reponse like '%" . $_POST['recherche'] . "%'
        order by id_faq";

        $res = $con->query($sql);
        $rows = $res->fetchAll(PDO::FETCH_ASSOC);
        } 
        else {    //Tant que l'utilisateur n'appuie pas sur le bouton "rechercher" cela affiche les questions et les réponses
          //Connexion à la base
          $dsn = 'mysql:host=localhost;dbname=m2l v2.0';
          $con = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

          //Requête SQL pour afficher le tableau avec les questions, les réponses, l'auteur etc.
          $sql = "select id_faq, id_ligue, question, reponse, pseudo from faq join user on faq.id_user = user.id_user order by id_faq";

          $res = $con->query($sql);
          $rows = $res->fetchAll(PDO::FETCH_ASSOC);
          }

          //Affichage du tableau avec modification et suppression
          echo '<h2>Liste des questions</h2>';
          echo "<table>";
          echo '<tr><th>Nr</th><th>Ligue</th><th>Auteur</th><th>Questions</th><th>Réponses</th><th>Modifier</th><th>Supprimer</th></tr>';
          foreach ($rows as $row) {
            echo '<tr>' . PHP_EOL;
            echo '<td>' . $row['id_faq'] . '</td>';
            echo '<td>' . $row['id_ligue'] . '</td>';
            echo '<td>' . $row['pseudo'] . '</td>';
            echo '<td>' . $row['question'] . '</td>';
            echo '<td>' . $row['reponse'] . '</td>';
            echo '<td><a href="modifier_question.php?id_faq=' . $row['id_faq'] . '"><img src="img/edit.png" alt="edit"  width="25px" /></a></td>';
            echo '<td><a href="supprimer_question.php?id_faq=' . $row['id_faq'] . '"><img src="img/delete.png" alt="edit" width="25px" /></a></td></tr>';
            echo '</tr>' . PHP_EOL;
          }
        echo "</table>";
      } 





      if ($_SESSION['id_usertype'] != 2 && $_SESSION['id_usertype'] != 3 ) {     //Si l'utilisateur est un simple utlisateur

        if (isset($_POST['submit'])) {         //Si l'utilisateur appuie sur le bouton "rechercher"
        //Connexion à la base
        $dsn = 'mysql:host=localhost;dbname=m2l v2.0';
        $con = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        //Requête SQL pour rechercher les mots dans la base
        $sql = "select id_faq, id_ligue, question, reponse, pseudo 
        from faq 
        join user on faq.id_user = user.id_user 
        where question like '%" . $_POST['recherche'] . "%'
        or reponse like '%" . $_POST['recherche'] . "%'
        order by id_faq";

        $res = $con->query($sql);
        $rows = $res->fetchAll(PDO::FETCH_ASSOC);
        } 
        else {    //Tant que l'utilisateur n'appuie pas sur le bouton "rechercher" cela affiche les questions et les réponses
          //Connexion à la base
          $dsn = 'mysql:host=localhost;dbname=m2l v2.0';
          $con = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

          //Requête SQL pour afficher le tableau avec les questions, les réponses, l'auteur etc.
          $sql = "select id_faq, id_ligue, question, reponse, pseudo from faq join user on faq.id_user = user.id_user order by id_faq";

          $res = $con->query($sql);
          $rows = $res->fetchAll(PDO::FETCH_ASSOC);
          }

          //Affichage du tableau avec modification et suppression
          echo '<h2>Liste des questions</h2>';
          echo "<table>";
          echo '<tr><th>Nr</th><th>Ligue</th><th>Auteur</th><th>Questions</th><th>Réponses</th></tr>';
          foreach ($rows as $row) {
            echo '<tr>' . PHP_EOL;
            echo '<td>' . $row['id_faq'] . '</td>';
            echo '<td>' . $row['id_ligue'] . '</td>';
            echo '<td>' . $row['pseudo'] . '</td>';
            echo '<td>' . $row['question'] . '</td>';
            echo '<td>' . $row['reponse'] . '</td>';
            echo '</tr>' . PHP_EOL;
          }
        echo "</table>";
      } 





      if ($_SESSION['id_usertype'] != 1 && $_SESSION['id_usertype'] != 2 ) {          //Si l'utilisateur est super admin

        if (isset($_POST['submit'])) {      //Si l'utilisateur appuie sur le bouton "rechercher"
          //Connexion à la base
          $dsn = 'mysql:host=localhost;dbname=m2l v2.0';
          $con = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

          //Requête SQL pour rechercher les mots dans la base
          $sql = "select id_faq, id_ligue, question, reponse, pseudo 
          from faq 
          join user on faq.id_user = user.id_user 
          where question like '%" . $_POST['recherche'] . "%'
          or reponse like '%" . $_POST['recherche'] . "%'
          order by id_faq";

          $res = $con->query($sql);
          $rows = $res->fetchAll(PDO::FETCH_ASSOC);
        } 
        else {

          //Connexion à la base
            $dsn = 'mysql:host=localhost;dbname=m2l v2.0';
            $con = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

          //Requête SQL pour afficher le tableau avec les questions, les réponses, l'auteur etc.
            $sql = "select id_faq, id_ligue, question, reponse, pseudo from faq join user on faq.id_user = user.id_user order by id_faq";

            $res = $con->query($sql);
            $rows = $res->fetchAll(PDO::FETCH_ASSOC);
          }

          //Affichage du tableau simple
          echo '<h2>Liste des questions</h2>';
          echo "<table>";
          echo '<tr><th>Nr</th><th>Ligue</th><th>Auteur</th><th>Questions</th><th>Réponses</th><th>Modifier</th><th>Supprimer</th></tr>';
          foreach ($rows as $row) {
            echo '<tr>' . PHP_EOL;
            echo '<td>' . $row['id_faq'] . '</td>';
            echo '<td>' . $row['id_ligue'] . '</td>';
            echo '<td>' . $row['pseudo'] . '</td>';
            echo '<td>' . $row['question'] . '</td>';
            echo '<td>' . $row['reponse'] . '</td>';
            echo '<td><a href="modifier_question.php?id_faq=' . $row['id_faq'] . '"><img src="img/edit.png" alt="edit"  width="25px" /></a></td>';
            echo '<td><a href="supprimer_question.php?id_faq=' . $row['id_faq'] . '"><img src="img/delete.png" alt="edit" width="25px" /></a></td></tr>';
            echo '</tr>' . PHP_EOL;
          }
          echo "</table>";

          } 
          if (!isset($_SESSION['pseudo'])) { //Si l'utilisateur n'est pas connecté
            echo "<br \><br \><br \><br \><strong>Vous devez être connecté pour voir la liste des questions !</strong>";
          }
        }
      ?>
  </div>
</div>
<?php include("inc/pieddepage.php") ?>
</div>
</body>
</html>