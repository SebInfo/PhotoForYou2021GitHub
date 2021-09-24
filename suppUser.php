<?php
include ("include/entete.inc.php");
if($_SESSION['login']!=true)
{
  header("Location:connexion.php");
}
?>
<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">Suppression d'un utilisateur</h1>
    <p class="lead">!!! Attention suppression !!!</p>
  </div>

<?php
if (isset($_POST['identifier']))
{
  $mail =  htmlentities($_POST['mail']);
  $motdepasse = md5($_POST['motdepasse']);
  $requete = 'DELETE  FROM  PhotoForYou2.users where Mail = :mail and Mdp = :motDePasse';
  $instruction = $db->prepare($requete);
  $instruction->bindParam(':mail', $mail, PDO::PARAM_STR);
  $instruction->bindParam(':motDePasse', $motdepasse, PDO::PARAM_STR);
  $instruction->execute();
  if ($instruction)
  {
      echo "<p class='lead'>Effacement effectué !</p>";
  }
  else
  {
      echo "<p class='lead'>!!! Introuvable !!!</p>";
  }
}
?>
  <form method="post" id="formId"  novalidate>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="email">Adresse électronique : </label>
        <input type="text" class= "form-control" name="mail" id="email">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="motDePasse1">Mot de passe :</label>
        <input type="password" class="form-control" name="motdepasse">
      </div>
      <div class="invalid-feedback">
          Vous devez fournir un mot de passe.
      </div>
    </div>
    <input type="submit" value="Valider" class="btn btn-primary" name="identifier" />
  </form>
</div>

<?php
  include ("include/piedDePage.inc.php");
?>