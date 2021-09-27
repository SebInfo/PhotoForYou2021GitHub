<?php
include ("include/entete.inc.php");
session_destroy();
header('Location: index.php');
// Libération de la mémoire
$result->close();
$conn->close();
?>
