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

    <title>Accueil | <?php echo "".$site_name." | ";echo $slogan; ?></title>

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
    .progress {
  margin-bottom: -10px;
  margin-top: 10px;
  width: 200%;
}</style>
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
                        <h4>Modifier mon profil</h4>
                    </div>
                    <div class="panel-body">
<?php
if (login()) {
    $req_dataUser = $pdo->prepare("SELECT * FROM users WHERE id=:id AND pseudo=:pseudo");
    $req_dataUser->execute(array(
        'id' => $_SESSION['id'],
        'pseudo' => $_SESSION['pseudo']
        ));
    $dataUser = $req_dataUser->fetch();
    if ($_POST) {
        if ($_POST['pseudo']) {
            if ($_POST['nom'] && $_POST['prenom']) {
                if ($_POST['mail']) {
                    if ($_POST['password'] == $_POST['retape'] && $_POST['password']) {
                        if ($_POST['birth_d'] && $_POST['birth_m'] && $_POST['birth_y']) {
                             $req_editUser = $pdo->prepare("UPDATE users SET pseudo=:pseudo, nom=:nom, prenom=:prenom, mail=:mail, password=:password, birth_d=:birth_d, birth_m=:birth_m, birth_y=:birth_y, facebook=:facebook, twitter=:twitter, website=:website, bio=:bio");
                             $req_editUser->execute(array(
                                 'pseudo' => htmlspecialchars($_POST['pseudo']),
                                 'nom' => htmlspecialchars($_POST['nom']),
                                 'prenom' => htmlspecialchars($_POST['prenom']),
                                 'mail' => htmlspecialchars($_POST['mail']),
                                 'password' => htmlspecialchars(md5($_POST['password'])),
                                 'birth_d' => htmlspecialchars($_POST['birth_d']),
                                 'birth_m' => htmlspecialchars($_POST['birth_m']),
                                 'birth_y' => htmlspecialchars($_POST['birth_y']),
                                 'facebook' => htmlspecialchars($_POST['facebook']),
                                 'twitter' => htmlspecialchars($_POST['twitter']),
                                 'website' => htmlspecialchars($_POST['website']),
                                 'bio' => htmlspecialchars($_POST['bio'])
                                 ));
                        } else { ?><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Erreur!</strong> Vous n'avez pas indiquez votre date de naissance.</div><?php }
                } else { ?><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Erreur!</strong> Vous n'avez pas indiquez votre mot de passe.</div><?php }
            } else { ?><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Erreur!</strong> Vous n'avez pas indiquez votre email.</div><?php }
        } else { ?><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Erreur!</strong> Vous n'avez pas indiquez votre nom ou prenom.</div><?php }
    } else {?><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Erreur!</strong> Vous n'avez pas indiquez votre pseudo.</div><?php }
}
?>
                        <form method="post">
                            <fieldset>
                                <legend>Mes information</legend>
                                    <div class="row" style="padding-left:2%;padding-right:2%;">
                                        <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" value="<?php echo $dataUser['pseudo']; ?>" autofocus>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input type="text" name="nom" class="form-control" placeholder="Nom" value="<?php echo $dataUser['nom']; ?>">
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="<?php echo $dataUser['prenom']; ?>">
                                        </div>
                                    </div><br>
                                    <div class="row" style="padding-left:2%;padding-right:2%;">
                                        <input type="email" name="mail" class="form-control" placeholder="Email (exemple@domaine.fr)" value="<?php echo $dataUser['mail']; ?>">
                                    </div><br>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe">
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="password" name="retape" class="form-control" placeholder="Confirmer">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                           <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-birthday-cake"></i>
                                            </div>
                                            <input type="text" name="birth_d" class="form-control" placeholder="Jour" value="<?php echo $dataUser['birth_d']; ?>">
                                        </div>  
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="birth_m" class="form-control" placeholder="Mois" value="<?php echo $dataUser['birth_m']; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="birth_y" class="form-control" placeholder="Année" value="<?php echo $dataUser['birth_y']; ?>">
                                        </div>
                                       
                                        
                                    </div>
                            </fieldset><br>
                            <fieldset>
                                <legend>Facultatif</legend>
                                    <div class="row" style="padding-left:2%;padding-right:2%;">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-facebook"></i>
                                            </div>
                                            <input type="text" name="facebook" class="form-control" placeholder="Lien de votre Facebook" value="<?php echo $dataUser['facebook']; ?>">
                                        </div>
                                    </div><br>
                                    <div class="row" style="padding-left:2%;padding-right:2%;">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                            <input type="text" name="twitter" class="form-control" placeholder="Lien de votre Twitter" value="<?php echo $dataUser['twitter']; ?>">
                                        </div>
                                    </div><br>
                                    <div class="row" style="padding-left:2%;padding-right:2%;">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-at"></i>
                                            </div>
                                            <input type="text" name="website" class="form-control" placeholder="Lien de votre Site" value="<?php echo $dataUser['website']; ?>">
                                        </div>
                                    </div><br>
                                    <div class="row" style="padding-left:2%;padding-right:2%;">
                                        <textarea name="bio" id="bio" cols="30" rows="10" placeholder="Biographie" class="form-control"><?php echo $dataUser['bio']; ?></textarea>
                                    </div><br>
                            </fieldset>
                                <button type="submit" class="btn btn-primary btn-block">Mettre a jour <i class="fa fa-refresh fa-spin"></i></button>
                        </form>
<?php } else { ?>
                Vous allez être redirigé vers la page de connexion dans quelques secondes
                <script type="text/javascript">
                window.setTimeout("location=('connexion');",3000);
                </script>
<?php } ?>
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
<script src="js/pwstrength.js"></script>
<script type="text/javascript">
jQuery(document).ready(function () {
"use strict";
var options = {
minChar: 8,
bootstrap3: true,
};
$('#password').pwstrength(options);
});
</script>
</body>

</html>
