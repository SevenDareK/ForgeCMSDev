<?php 
include '../inc/config.php';
if ($_POST) {
	$delete_all = $dbb->query("TRUNCATE TABLE news");
	$delete_all_com = $dbb->query("TRUNCATE TABLE comment");
	header('Location: news?success=2');

}
?>