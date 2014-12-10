<?php
session_start();
include 'inc/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Utilisateur <?php echo "".$site_name." | ";echo $slogan; ?></title>

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
    .member-entry {
border: 1px solid #ebebeb;
padding: 15px;
margin-top: 15px;
margin-bottom: 30px;
-moz-box-shadow: 1px 1px 1px rgba(0,1,1,0.02);
-webkit-box-shadow: 1px 1px 1px rgba(0,1,1,0.02);
box-shadow: 1px 1px 1px rgba(0,1,1,0.02);
-moz-transition: all 300ms ease-in-out;
-o-transition: all 300ms ease-in-out;
-webkit-transition: all 300ms ease-in-out;
transition: all 300ms ease-in-out;
-webkit-border-radius: 3px;
-webkit-background-clip: padding-box;
-moz-border-radius: 3px;
-moz-background-clip: padding;
border-radius: 3px;
background-clip: padding-box;
}
</style>
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
                        <h4>Liste des utilisateurs</h4>
                    </div>
                    <div class="panel-body">
<table id="example1" class="table table-bordered table-striped">
    <thead>

        <tr>
            <th>Pseudo</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Mail</th>
            <th>Sexe</th>
            <th>Naissance</th>
            <th>Rang</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php 

$charset8 = $dbb->query("set names 'utf8'");
$news = $dbb->query("SELECT * FROM users");

while ($donnees = $news->fetch_array()) { ?>
<tr class="tdnormal">
    <td><?php echo $donnees['pseudo']; ?></td>
    <td><?php echo $donnees['nom']; ?></td>
    <td><?php echo $donnees['prenom']; ?></td>
    <td><a href="mailto:<?php echo $donnees['mail']; ?>"><?php echo $donnees['mail']; ?></a></td>
    <td><?php if ($donnees['sexe'] == 'H') {
    echo "Homme";
} elseif ($donnees['sexe'] == 'F') {
    echo "Femme";
}
?></td>
    <td><?php echo $donnees['birth_d']; ?>/<?php echo $donnees['birth_m']; ?>/<?php echo $donnees['birth_y']; ?> (<?php echo $annee-$donnees['birth_y']; ?> ans)</td>
    <td><?php 
if ($donnees['rang'] == 1) { echo "Utilisateur"; } elseif ($donnees['rang'] == 2) { ?><span style="color:rgba(255, 0, 0, 0.8);">Administrateur</span><?php } ?></td>
    <td style="width:100px;"><a class="btn btn-primary btn-sm" href="profil?id=<?php echo $donnees['id']; ?>">Voir le profil</a></td>
</tr>
<?php } ?>
                                        </tbody>
                                    </table>
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
