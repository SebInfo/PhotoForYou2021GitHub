<?php 
include ("include/entete.inc.php");
if (isset($_POST['valider']))
{
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $type = $_POST['choixType'];
  $motDePasse = md5($_POST['motdepasse1']);
  $mail = $_POST['mail'];

  // Traitement de la photo
  if (isset($_FILES) && count($_FILES)>0)
  {
    $urlPhoto = $_FILES['photoUser'];
    $nom_fichier = $urlPhoto['name'];
    if (strlen($nom_fichier)==0) 
    {
      $nom_fichier="user.png";
    }
  }



  $valid = TRUE;
  
  if (strlen($nom)<=3 or strlen($nom)>30)
  {
    $valid = FALSE;
  }

  if ($valid)
  {
    // On prépare la requête pour ajouter en BDD
    $instruction = $db->prepare('INSERT INTO PhotoForYou2.users(Nom,Prenom,Type,Mail,Mdp,credit,photo) VALUES (:nom, :prenom, :type, :mail, :motDePasse, 0, :photoUser)');
    $instruction->bindParam(':nom', $nom, PDO::PARAM_STR);
    $instruction->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $instruction->bindParam(':type', $type, PDO::PARAM_STR);
    $instruction->bindParam(':mail', $mail, PDO::PARAM_STR);
    $instruction->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
    $instruction->bindParam(':photoUser', $nom_fichier, PDO::PARAM_STR);

    try
    {
      $instruction->execute();
      move_uploaded_file($urlPhoto['tmp_name'],'images/'.$nom_fichier);
      header('Location: inscriptionOK.php');
    }
    catch(PDOException $e)
    {
      echo "<br/><h1> Erreur : </h1>" . $e->getMessage();
    }
  }
  else
  {
    header("Location:inscription.php");
  }
}
else
{
  header("Location:inscription.php");
}
?>