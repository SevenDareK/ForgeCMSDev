<?php
session_start();
include 'inc/config.php';
include 'inc/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Connexion | <?php echo "".$site_name." | ";echo $slogan; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/app.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
<?php include 'sec/nav.php' ?>

    <!-- Header Carousel -->
<?php include 'sec/slider.php' ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row" style="margin-top:30px;">
            <div class="col-xs-12 col-sm-6 col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Connexion</h4>
                    </div>
                    <div class="panel-body">
<?php
if (login()) { ?>
    Vous êtes déjà connecté. Vous voulez vous <a href="deconnexion">déconnecter</a> ?
<?php } else {
$pseudo = @$_POST['pseudo'];
$password = md5(@$_POST['password']);

// Vérification des identifiants
$req = $pdo->prepare('SELECT id FROM users WHERE pseudo = :pseudo AND password = :password');
$req->execute(array(
    'pseudo' => $pseudo,
    'password' => $password));

$resultat = $req->fetch();
if ($_POST) {
if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    @session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    echo 'Vous êtes connecté !';
}
} 
if (!login()) {

?>

      <form role="form" method="post">
        <input name="pseudo" type="text" class="form-control" placeholder="Pseudo"><br>
        <input name="password" type="password"class="form-control" placeholder="Mot de passe"><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Me connecter</button>
      </form>

<?php 
} else {
}
}
?>

    </div> <!-- /container -->
                </div>
            </div>
            <div class="col-xs-6 col-lg-4">
                <?php include 'sec/sidebar.php'; ?>
            </div>
        </div>
        <!-- /.row -->
        <hr>

        <!-- Footer -->
<?php include 'sec/footer.php' ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>