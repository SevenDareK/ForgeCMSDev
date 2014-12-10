<?php 
include '../inc/config.php';
if ($_POST) {
	$delete_news = $dbb->query("TRUNCATE TABLE news");
	$delete_users = $dbb->query("TRUNCATE TABLE users");
	$delete_widget = $dbb->query("TRUNCATE TABLE widget");
	header('Location: db?success=1');
}
?>