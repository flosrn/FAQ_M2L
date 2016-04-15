<?php
session_start();

// Connexion à la base de données
include('db_con.php');

//Récupération de la question entrée dans le formulaire
$question = isset($_POST['question']) ? $_POST['question'] : '';
//Récupération de la réponse entrée dans le formulaire
$reponse = isset($_POST['reponse']) ? $_POST['reponse'] : '';
//Récupération de l'id dans l'URL
$id_faq = isset($_GET['id_faq']) ? $_GET['id_faq'] : "";
//Récupération de l'ID dans le formulaire
$id_faq = isset($_POST['id_faq']) ? $_POST['id_faq'] : '';

$questionok = "";

if (isset($_POST['submit'])) {    //Si l'on appuie sur le bouton submit en bas du formulaire

  //On supprime les données dans la table à travers une requête SQL
  $sql="delete from faq where id_faq=".$id_faq;
  
  try {
    $nb = $con->exec($sql);
  } catch (PDOException $e) {
    die( "<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
  }
  $questionok = "Votre question à bien été supprimé";

} else {    //Tant que l'on appuie pas sur submit

  //Récupération de l'id dans l'URL
  $id_faq = isset($_GET['id_faq']) ? $_GET['id_faq'] : "";

  //On affiche le contenue de la base à travers une requête SQL
  $sql="select faq.id_faq, faq.question, faq.reponse, user.pseudo 
  from faq, user 
  where faq.id_user = user.id_user
  and faq.id_faq = ".$id_faq;

  $res = $con->query($sql);
  $row = $res->fetch(PDO::FETCH_ASSOC);

  $question = $row['question'];
  $reponse = $row['reponse'];
  $id_faq = $row['id_faq'];

  
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

      <h2>Supprimer une question</h2>

      <!--Formulaire de modification-->
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

      <!--On a besoin de l'id de la page mais on le cache--> 
       <input name="id_faq" id="id_faq"  value="<?php echo $id_faq ?>" hidden />

       <p>Question<br /><textarea name="question" cols="50" row="10"><?php echo $question ?></textarea></p>
       <p>Réponse<br /><textarea name="reponse" cols="50" row="10"><?php echo $reponse ?></textarea></p>

       <input type="submit" value="Supprimer" name="submit" />  <!--Bouton Submit-->
     </form><br />

     <?php echo "$questionok"; ?><br /> <!--Affichage du message-->

   <p><a href="liste_questions.php">Retour</a> à la liste des questions</p>

   </div>
   <?php include("inc/pieddepage.php") ?>
 </div>
</body>
</head>