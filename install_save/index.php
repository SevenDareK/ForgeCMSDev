<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Installation automatisée : 1ère étape</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head>
<body>

<form action="process.php" method="post">
<fieldset class="col-xs-6">
<legend>Connexion à la base de données</legend>
	<input type="hidden" name="etape" value="1" />

<div class="input-group">
    <span class="input-group-addon">Hôte :</span>
	<input type="text" name="hote" maxlength="40" class="form-control" />
</div><br />
<div class="input-group">
    <span class="input-group-addon">Utilisateur :</span>
	<input type="text" name="login" maxlength="40" class="form-control" />
</div><br />
<div class="input-group">
    <span class="input-group-addon">Mot de passe :</span>
	<input type="password" name="mdp" maxlength="40" class="form-control" />
</div><br />
<div class="input-group">
    <span class="input-group-addon">Nom de la base :</span>
	<input type="text" name="base" maxlength="40" class="form-control" />
</div>
</fieldset>
<fieldset class="col-xs-6">
	<legend>Info du site</legend>
<div class="input-group">
    <span class="input-group-addon">Nom du site :</span>
	<input type="text" name="site_name" maxlength="40" class="form-control" />
</div><br />
<div class="input-group">
    <span class="input-group-addon">Slogan :</span>
	<input type="text" name="slogan" maxlength="40" class="form-control" />
</div><br />
<div class="input-group">
    <span class="input-group-addon">Description :</span>
    <textarea name="desc" id="desc" cols="30" rows="10"class="form-control"></textarea>
</div><br />
<div class="input-group">
    <span class="input-group-addon">Url <small>(avec le / de fin)</small> :</span>
	<input type="text" name="url" maxlength="40" class="form-control" placeholder="exemple.fr/"/>
</div>
</fieldset>
	<input type="submit" name="submit" value="Envoyer" class="btn btn-primary" />
</form>

</body>
</html>