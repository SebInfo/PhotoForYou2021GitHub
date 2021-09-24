<?php
  session_start();
  require_once'accessbase.php';
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

    	<div class="collapse navbar-collapse" id="navbarCollapse">
      		<ul class="navbar-nav mr-auto">
        	 <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.html">Photos</a>
					    <div class="dropdown-menu">
						   <a class="dropdown-item" href="acheterPhotos.php">Acheter</a>
               <a class="dropdown-item" href="suppUser.php">Suppression User</a>
						   <a class="dropdown-item" href="#">Vendre</a>
						   <a class="dropdown-item" href="#">Les plus populaires</a>
						   <a class="dropdown-item" href="#">Les nouveautés</a>
					    </div>
			     </li>
        	 <li class="nav-item">
          			<a class="nav-link" href="#">Tarifs</a>
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