<?php
include('../inc/config.php');
$delete_comment = $pdo->prepare("DELETE * FROM comment WHERE id=:id");
$delete_comment->execute(array(
	'id' => $_GET['id']
	));
header('Location: comment');
?>