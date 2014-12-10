<?php session_start(); ?>
<?php include '../inc/config.php'; ?>
<?php
$req_rang_ad = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$req_rang_ad->execute(array(
	'id' => $_SESSION['id']
	));
$rang_ad = $req_rang_ad->fetch();

if (!isset($_SESSION['id'])) {
    echo "<script type='text/javascript'>document.location.replace('../?error=rang');</script>";
}
if ($rang_ad['rang'] == 1) {
	echo "<script type='text/javascript'>document.location.replace('../?error=rang');</script>";
}
if ($rang_ad['rang'] > 2) {
	echo "<script type='text/javascript'>document.location.replace('../?error=rang');</script>";
}
if ($rang_ad['rang'] < 1) {
	echo "<script type='text/javascript'>document.location.replace('../?error=rang');</script>";
}
?>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/sb-admin.css" rel="stylesheet">
<link href="../css/plugins/morris.css" rel="stylesheet">
<link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<link href="editor/bootstrap-wysihtml5.css" rel="stylesheet">
<script src="../js/bootstrap.min.js"></script>
<script src="../js/plugins/morris/raphael.min.js"></script>
<script src="../js/plugins/morris/morris.min.js"></script>
<script src="../js/plugins/morris/morris-data.js"></script>
<script src="editor/bootstrap3-wysihtml5.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">