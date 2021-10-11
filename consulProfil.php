<?php
	include ("include/entete.inc.php");
  if ($_SESSION['login']!=true OR $_SESSION['type']=='visiteur')
  {
    header("Location:connexion.php");
  }
  ?>
	<div class="container">
    	<div class="jumbotron">

          <?php echo "<img src=".$_SESSION['photo']." id='photo'  width=20% class='img-responsive float-right' >" ?>
      		<h1 class="display-4">Votre profil de <?php echo $_SESSION['type'] ?></h1>
      		<?php echo '<p class="lead">Bonjour '.$_SESSION['nomUtilisateur'].' !</p>'?>
      		<hr class="my-4">
          <?php echo "<p class='lead'>Nom : ".$_SESSION['nomUtilisateur']."</p>" ?>
          <?php echo "<p class='lead'>Prénom : ".$_SESSION['prenomUtilisateur']."</p>" ?>
          <?php echo "<p class='lead'>Courriel : ".$_SESSION['emailUtilisateur']."</p>" ?>
          <?php echo "<p class='lead'>Vos crédit(s) : ".$_SESSION['credit']."</p>" ?>
    </div>
  <?php
    include ("include/piedDePage.inc.php");
?>