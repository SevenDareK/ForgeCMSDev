<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'inc/header.php'; ?>
    <title>Panel admin de <?php echo $site_name; ?></title>
</head>

<body>

    <div id="wrapper">
<?php include 'sec/head.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Base de données <small>Gérez votre base de données</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Accueil
                            </li>
                            <li class="active">
                                <i class="fa fa-database"></i> Base de données
                            </li>
                        </ol>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Info sur la base de données <i class="fa fa-check"></i></h3>
    </div>
    <div class="panel-body">
        Hôte : <?php echo $hote; ?><br>
        Utilisateur : <?php echo $login; ?><br>
        Base : <?php echo $base; ?><br><br>
        <?php 
        if ($dbb) { ?>
            <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            Vous-êtes bien connecté a votre base de donné
            </div>
        <?php } else { ?>
            <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-check"></i>
            La connexion à la base de données est impossible
            </div>
           <?php } ?>
    </div><!-- /.box-body -->
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Gérer les tables</i></h3>
    </div>
    <div class="panel-body">
<?php

if (@$_GET['success'] == 1) { ?>
<br>
    <div class="alert alert-info alert-dismissable">
        <i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Les tables ont bien été vidées
    </div>
<?php }


$users_count = $dbb->query("SELECT * FROM users");
$users_rowcount = $users_count->num_rows;
$news_count = $dbb->query("SELECT * FROM news");
$news_rowcount = $news_count->num_rows;
$widget_count = $dbb->query("SELECT * FROM widget");
$widget_rowcount = $widget_count->num_rows;
?>
        Utilisateur : <?php echo $users_rowcount; ?><br>
        News : <?php echo $news_rowcount; ?><br>
        Widget : <?php echo $widget_rowcount; ?><br><br>

<div style="text-align:center;">
<a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#basicModal">Vider toutes les tables</a>
</div>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title" id="myModalLabel">Êtes-vous sur de vouloir vider toutes les table ?</h4>
            </div>
            <div class="modal-footer">
            <div style="text-align:center;">
                <form method="post" action="truncate">
                    <input type="submit" name="delete_all" class="btn btn-danger" value="Vider">
                </form>
            </div>
            </div>
    </div>
  </div>
</div>
    </div><!-- /.box-body -->
</div>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

</body>

</html>
