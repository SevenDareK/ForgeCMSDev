<?php 
include '../inc/config.php';
if ($_POST) {
	$delete_all = $dbb->query("TRUNCATE TABLE users");
	header('Location: users?success=1');
}
?>