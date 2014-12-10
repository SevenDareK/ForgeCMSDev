<?php session_start();

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

    <title>Profil | <?php echo "".$site_name." | ";echo $slogan; ?></title>

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
<style type="text/css">
    .user_card {
    height: 100px;
    background-color: #00A4FF;
}

</style>
</head>

<body>

    <!-- Navigation -->
<?php include 'sec/nav.php' ?>

    <!-- Header Carousel -->
<?php include 'sec/slider.php' ?>
<?php
if (@$_GET['id']) {
    $req_profil = $pdo->prepare("SELECT * FROM users WHERE id=:id");
    $req_profil->execute(array(
        'id' => $_GET['id'],
        ));
    $profil = $req_profil->fetch();
?>
    <!-- Page Content -->
    <div class="container">
        <!-- Marketing Icons Section -->
        <div class="row" style="margin-top:30px;">
            <div class="col-xs-12 col-sm-6 col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <?php
$req_comment = $pdo->prepare("SELECT * FROM comment WHERE author=:author");
$req_comment->execute(array(
    'author' => $profil['pseudo']
    ));
$comment = $req_comment->rowCount();
$req_news = $pdo->prepare("SELECT * FROM news WHERE author=:author");
$req_news->execute(array(
    'author' => $profil['pseudo']
    ));
$news = $req_news->rowCount();
?>
                        <h4>Profil de <?php echo $profil['pseudo']; ?> <small>(Inscrit depuis le <?php echo $profil['date']; ?>)</small>
        
                        <span class="pull-right"><small><?php echo $comment; ?> <i class="fa fa-comments-o"></i>
<?php
if ($profil['rang'] == 2) {
?>
                        <?php echo $news; ?> <i class="fa fa-newspaper-o"></i><?php } ?></small></span></h4>
                    </div>
                    <div class="panel-body">
<div class="row">
          <div class="col-lg-12">
            <div class="col-xs-12 col-sm-4">
              <figure>
                <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
              </figure>
              
            </div>

            <div class="col-xs-12 col-sm-8">
              <ul class="list-group">
                <li class="list-group-item"><?php echo $profil['prenom']; ?> <?php echo $profil['nom']; ?></li>
                <li class="list-group-item"><?php if ($profil['rang'] == 1) { echo "Utilisateur"; } elseif ($profil['rang'] == 2) { ?><span style="color:rgba(255, 0, 0, 0.8);">Administrateur</span><?php } ?></li>
                <li class="list-group-item"><?php if ($profil['sexe'] == 'H') {echo "Homme";} else {echo "Femme";} ?></li>
                <li class="list-group-item">Né le <?php echo $profil['birth_d']; ?>/<?php echo $profil['birth_m']; ?>/<?php echo $profil['birth_y']; ?> (<?php echo $annee-$profil['birth_y']; ?> ans)</li>
                <li class="list-group-item"><i class="fa fa-envelope"></i><a href="mailto:<?php echo $profil['mail']; ?>"> <?php echo $profil['mail']; ?></a> </li>
              </ul>
            </div>
          </div>
        </div>
<div class="row">
<div class="col-lg-12"> 
  <div class="panel panel-default" style="border-bottom-color: #ddd;">
    <div class="panel-heading">
              Biographie de <?php echo $profil['pseudo']; ?>
    </div>
        <div class="panel-body">
<?php
if ($profil['bio']) {
    echo $profil['bio'];
} else {
    echo "<em>Aucune biographie</em>";
}
?>
            </div>
      
    </div>
    </div>
    </div>
<?php
if (login()) {
    if ($_SESSION['id'] == $profil['id']) {
    ?>
    <div class="pull-right"><a href="edit_profil" class="btn btn-primary btn-sm">Modifier mon profil</a></div>
<?php 
}
} ?>
					</div>
                </div>
            </div>
            <div class="col-xs-6 col-lg-4">
                <?php include 'sec/sidebar.php'; ?>
            </div>
        </div>
        <!-- /.row -->
        <hr>

        <!-- Footer -->
<?php include 'sec/footer.php'; ?>

    </div>
<?php } else { ?>
    <div class="container">
        <!-- Marketing Icons Section -->
        <div class="row" style="margin-top:30px;">
            <div class="col-xs-12 col-sm-6 col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Erreur</h4>
                    </div>
                    <div class="panel-body">
                    Veuillez saisir un utilisateur en cliquant <a href="users">ici</a>.
                    </div>
                </div>
            </div><?php } ?>
            <div class="col-xs-6 col-lg-4">
                <?php include 'sec/sidebar.php'; ?>
            </div>
        </div>
        <!-- /.row -->
        <hr>

        <!-- Footer -->
<?php include 'sec/footer.php'; ?>

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
