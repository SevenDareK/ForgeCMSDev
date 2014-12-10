<?php 
include '../inc/config.php';
if ($_POST) {
	$delete_all = $dbb->query("TRUNCATE TABLE widget");
	header('Location: widget?success=2');
}
?>