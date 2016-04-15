<?php
session_start();

$questionok = "";

if (isset($_SESSION['pseudo'])) {
  if(isset($_POST['submit'])) {
    $question = $_POST['question'];
    $reponse = $_POST['reponse'];

    $dsn = 'mysql:host=localhost;dbname=m2l v2.0'; //Ou se situe la bdd
    $con = new PDO($dsn,'root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $question = $con->quote($question);
    $reponse = $con->quote($reponse);


    $sql = "insert into faq(question, reponse, dat_question, id_user) 
    values ($question, $reponse, SYSDATE(), ".$_SESSION['id_user'].")";

    try 
    {
      $res = $con->exec($sql);
      $questionok = "Votre question à bien été ajouté";
    } 
    catch (PDOException $e) 
    {
      die("Erreur lors de la requête SQL : ".$e->getMessage());
    } 
  }
}
else {
  if(isset($_POST['submit'])) {
    $questionok = "<strong>Vous devez être connecté pour soummetre votre question !</strong>";
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

    <h2>Ajouter une question</h2>
      <!--Formulaire-->
      <form method="post" action="ajouter_question.php">
        <div id="q1">
         <label for="question"><strong>Question :</strong></label><br \>  <!--Champs de texte "Question"-->
         <textarea name="question" id="question" rows="10" cols="50" required></textarea>       
       </div>
       <div id="q2">
        <label for="reponse"><strong>Reponse :</strong></label><br \>     <!--Champs de texte "Réponse"-->
        <textarea name="reponse" id="reponse" rows="10" cols="50"></textarea>       
      </div>
      <input type="submit" value="Ajouter" name="submit" /> <!--Bouton envoyer-->
    </form><br />

    <?php echo "$questionok"; ?> <!--Affichage du message pour avertir l'utilisateur-->

    <p><a href="liste_question.php">Retour</a> à la liste des questions</p>
  </div>
<?php include("inc/pieddepage.php") ?>
</div>
</body>
</head>