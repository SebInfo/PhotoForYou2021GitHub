<?php
include ("include/entete.inc.php");
unset($_SESSION['login']);
header('Location: index.php');
// Libération de la mémoire
$result->close();
$conn->close();
?>
