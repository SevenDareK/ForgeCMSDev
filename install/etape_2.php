<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Installation automatisée : 2ème étape</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
margin-left: 10%;
margin-right: 10%; 
margin-bottom: 10%;  
margin-top: 3%;
overflow: hidden;
background-image: url(background.jpg) 
}
.col-centered{
float: none;
margin: 0 auto;
}
.form-control {
    margin-bottom: 10px;
}
.img{
    opacity:0.1;
}
.img:hover {
    opacity: 0.6;
}

</style>
</head>
<body cz-shortcut-listen="true">
<div class="col-md-6 col-centered">
<img src="../img/logo.png" alt="ForgeCMS" class="col-centered img" style="width:100%;padding-left:200px;padding-right:200px;" />
<span style="margin-left:43%;margin-right:43%;opacity:0.1;">ForgeCMS</span>
</div><br />
<div class="col-md-6 col-centered">
    <div class="panel panel-default">
        <div class="panel-heading">
            Configuration du site<span class="pull-right">2/3</span>
        </div>
        <div class="panel-body">
<?php
include('../inc/config.php');
if ($_POST) {
    $req_config = $pdo->prepare("INSERT INTO settings(site_name, slogan, descr, url) VALUES(:site_name, :slogan, :descr, :url)");
    $req_config->execute(array(
        'site_name' => $_POST['site_name'],
        'slogan' => $_POST['slogan'],
        'descr' => $_POST['descr'],
        'url' => $_POST['url']
        ));
    header('Location: etape_3');
}
?>
            <form method="post">
    <input placeholder="Nom du site" type="text" name="site_name" maxlength="40" class="form-control" />
    <input placeholder="Slogan" type="text" name="slogan" maxlength="40" class="form-control" />
    <input placeholder="Url (Avac le / de fin)" type="text" name="url" maxlength="40" class="form-control" />
    <textarea name="descr" id="desc" cols="30" rows="10" class="form-control" placeholder="Desciption"></textarea>
    <button type="submit" name="submit" class="btn btn-primary pull-right">Etape suivante <i class="fa fa-arrow-circle-o-right fa-spin"></i></button>
</form>
        </div>
    </div>
</div>


</body>
</html>