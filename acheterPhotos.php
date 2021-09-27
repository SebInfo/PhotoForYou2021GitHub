<?php
include ("include/entete.inc.php");
if($_SESSION['login']!=true) 
{
	header("Location:connexion.php");
}
if($_SESSION['type']!='client')
{
	header("Location:index.php");
}
?>

<div class="container text-center">

	<div class="py-5 text-center">
  <img class="d-block mx-auto mb-2" src="images/logo.png" alt="logo photoforyou" width="170" height="115">
	<h1 class="display-5">Acheter des photos</h1>
  <p class="lead">Des pros au service des professionnels de la communication.</p>

<?php
include ("include/piedDePage.inc.php");
?>	