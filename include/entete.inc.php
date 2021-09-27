<?php
  session_start();
  if (!isset($_SESSION['type']))
  {
    $_SESSION['type']="visiteur";
  }
  require_once ('accessbase.php');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html>
<head>
  <title>PhotoForYou</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Liaison au fichier css de Bootstrap -->
  <link href="Bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <style>
    .carousel-item
    {
      width: 100%;
      height: auto;
      background-color:#5f666d;
      color:white;
    }
  </style>
  <link href="css/perso.css" rel="stylesheet">
</head>
<body>
<header>
<!-- nav est un élément HTML servant à la navigation -->
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    	
    	<a class="navbar-brand" href="index.php">PhotoForYou</a>
    	<!-- Pour passer en mode hamburger si on est sur un petit écran -->

    	<button class="navbar-toggler" type="button" data-toggle="collapse" 
    		data-target="#navbarCollapse" aria-controls="navbarCollapse" 
    		aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
    	</button>

      <?php
          // On regarde le niveau d'habilitation
          switch ($_SESSION['type']) 
          {
            case "client":
              $niveauHab = "%C%";
              break;
            case "photographe":
              $niveauHab = "%P%";
              break;
            case "visiteur":
              $niveauHab = "%V%";
              break;
            case "admin":
              $niveauHab = "%A%";
              break;
          }

          // On récupère l'ensemble des itérations dans Menu
          $requete = "SELECT idMenu, nomMenu, Lien from menu where Habilitation LIKE '".$niveauHab."'";
          $instruction = $db->prepare($requete);
          $instruction->execute();
          $num = $instruction->fetchAll(); // Tout se trouve maintenant dans le tableau $num
      ?>
    	<div class="collapse navbar-collapse" id="navbarCollapse">
      		<ul class="navbar-nav mr-auto">
              <?php
              // On va récupérer les menu de niveau 1 dont l'id est compris entre 1 et 9 -->
              foreach ($num as $value) 
                  {
                    // Menu de niveau 1
                    if (strlen($value['idMenu'])==1) 
                    {
                      $niv = substr($value['idMenu'], 0, 1); // On mémorise le niveau
                      echo "<li class='nav-item dropdown'>".PHP_EOL;
                      echo "<a class='nav-link dropdown-toggle' data-toggle='dropdown' href=".$value['Lien'].">".$value['nomMenu']."</a>".PHP_EOL;
                      echo "<div class='dropdown-menu'>".PHP_EOL;
                      foreach ($num as $value) 
                      {
                        // Sous menu
                        if (strlen($value['idMenu'])==2 AND substr($value['idMenu'],0,1)==$niv )
                        {
                          echo "<a class='dropdown-item' href=".$value['Lien'].">".$value['nomMenu']."</a>".PHP_EOL;
                        }  
                      }
                      echo "</div>";
                      echo "</li>";
                    }
                  }
              ?>
            </li>
      		</ul>

		      <!-- formulaire de recherche -->
      		<form method="POST" class="form-inline mt-md-0">
        		<input class="form-control mr-sm-2" type="text" placeholder="Votre recherche" aria-label="rechercher">
        		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
          <?php
          if (!isset($_SESSION['login']) )
          {
            echo '
            <ul class="navbar-nav mr-right">
              <li class="nav-item">
                <a class="nav-link btn btn-outline-dark" href="inscription.php">S\'inscrire</a></li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-dark"  type="submit"  href="connexion.php">S\'identifier</a>
              </li>
            </ul>';
          }
          else
          {
             echo '
            <ul class="navbar-nav mr-right">
              <li class="nav-item">
                <a href="deconnexion.php"  type="submit" value="Deconnexion"  class="btn btn-primary" name="deconnexion" /> Déconnexion</a>
              </li>
            </ul>';
          }
          ?>
          </form>
    	</div>
	</nav>
</header>