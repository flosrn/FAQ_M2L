<?php
if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
} else {
    $pseudo = "invité";
}
?>
<div id="entete">
    <img id="tableau" src="img/blackboard_modif.jpg" alt="blackboard" />
    <h1 class="titre"><a href="index.php">Foire Aux Questions de la M2L</a></h1>

    <div id="pseudo">
        <p>Bienvenue <?php echo $pseudo; ?>,</p>
    </div>
</div>


