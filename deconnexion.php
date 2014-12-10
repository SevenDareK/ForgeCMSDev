<?php 
include 'inc/config.php';
// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
header('Location: '.$url.'');
?>