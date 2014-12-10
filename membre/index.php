<?php
session_start();
include '../inc/config.php';

if (isset($_SEESION['pseudo'])) {
	echo'ok';
} else {
	echo "no";
}

?>