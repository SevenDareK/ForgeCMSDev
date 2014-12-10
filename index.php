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

</head>

<body>
<?php
if (@$_GET['success'] == 'install') { ?>
    <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom:0;">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  Votre site est maintenant opérationnel. Vous pouvez vous <a href="connexion">connecter</a>
</div>
<?php }

?>
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
                        <h4>Accueil</h4>
                    </div>
                    <div class="panel-body">

                    <?php
                    $req_accueil = $pdo->prepare("SELECT * FROM page WHERE id=:id");
                    $req_accueil->execute(array(
                        'id' => 1
                        ));
                    $accueil = $req_accueil->fetch();
                    echo $accueil['content'];
                    ?>
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

</body>

</html>
