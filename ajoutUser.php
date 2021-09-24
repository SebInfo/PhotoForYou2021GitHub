<?php 

include ("include/entete.inc.php");
echo $_POST['valider'];
if (isset($_POST['valider']))
{
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $type = $_POST['choixType'];
  $motDePasse = md5($_POST['motdepasse1']);
  $mail = $_POST['mail'];

  $instruction = $db->prepare('INSERT INTO PhotoForYou2.users(Nom,Prenom,Type,Mail,Mdp,credit) VALUES (:nom, :prenom, :type, :mail, :motDePasse, 0)');
  $instruction->bindParam(':nom', $nom, PDO::PARAM_STR);
  $instruction->bindParam(':prenom', $prenom, PDO::PARAM_STR);
  $instruction->bindParam(':type', $type, PDO::PARAM_STR);
  $instruction->bindParam(':mail', $mail, PDO::PARAM_STR);
  $instruction->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
  try
  {
    $instruction->execute();
    header('Location: inscriptionOK.php');
  }
  catch(PDOException $e)
  {
    echo "<br/><h1> Erreur : </h1>" . $e->getMessage();
  }
   
}
?>