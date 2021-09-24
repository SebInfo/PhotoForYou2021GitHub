<?php
include ("include/entete.inc.php");
?>
<div class="container">
<?php
if (isset($_POST['identifier']))
{
  $mail =  htmlentities($_POST['mail']);
  $motdepasse = md5($_POST['motdepasse']);
  $requete = 'SELECT id_user from PhotoForYou2.users where Mail = :mail and Mdp = :motDePasse';
  $instruction = $db->prepare($requete);
  $instruction->bindParam(':mail', $mail, PDO::PARAM_STR);
  $instruction->bindParam(':motDePasse', $motdepasse, PDO::PARAM_STR);
  $instruction->execute();
  $num = $instruction->fetchAll();
  if (count($num)>0)
  {
      // On récupère le prénom pour le message d'acceuil
      $_SESSION['login'] = true;
      $query = "SELECT Prenom as Prenom from PhotoForYou2.users where Mail = '$mail';";
      $requete = $db->query($query);
      $result = $requete->fetch();
      $_SESSION['NomUtilisateur'] = htmlentities($result['Prenom']);
      unset($result);
      header('Location: membres.php');
  }
  else
  {
      echo "<p class='lead'>Utilisateur inconnu</p>";
  }

}
?>
  <div class="jumbotron">
    <h1 class="display-4">Connexion</h1>
    <p class="lead">Merci de vous identifier</p>
  </div>
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