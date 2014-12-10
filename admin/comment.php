<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'inc/header.php'; ?>
    <title>Panel admin de <?php echo $site_name; ?></title>
    <style type="text/css">
.widget .panel-body { padding:0px; }
.widget .list-group { margin-bottom: 0; }
.widget .panel-title { display:inline }
.widget .label-info { float: right; }
.widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
.widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
.widget .mic-info { color: #666666;font-size: 11px; }
.widget .action { margin-top:5px; }
.widget .comment-text { font-size: 12px; }
.widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
    </style>
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
                            Commentaires <small>Voir ce que les autre pensent</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Accueil
                            </li>
                            <li class="active">
                                <i class="fa fa-comment"></i> Commentaire
                            </li>
                        </ol>
                    </div>
                </div>
    <div class="row">
<div class="col-lg-12">
<?php 
if (@$_GET['succes'] == 1) { ?>
    <div class="alert alert-info alert-dismissable">
        <i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Le commentaire a bien été mise à jour !
    </div>
<?php } ?>
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Commentaire récents</h3>
                <span class="label label-info">
                    <?php echo $comment_rowcount; ?></span>
            </div>
            <div class="panel-body">
                <ul class="list-group">

<?php
if (@$_GET['delete']) {
    $delete_comment = $pdo->prepare("DELETE FROM comment WHERE id=:id");
    $delete_comment->execute(array(
    'id' => $_GET['delete']
    ));
}
$com = $dbb->query("SELECT * FROM comment WHERE stat='1' ORDEr BY id desc");
while ($data = $com->fetch_array()) {
$author = $pdo->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
$author->execute(array(
    'pseudo' => $data['author']
    ));
$authordata = $author->fetch();

if (@$_GET['approved']) {
    $req_approvedComment = $pdo->prepare("UPDATE comment SET stat='2' WHERE id=:id");
    $req_approvedComment->execute(array(
        'id' => $_GET['approved']
        ));
}
?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <?php echo $data['subject']; ?>
                                    <div class="mic-info">
                                        Par: <a href="profil_user?id=<?php echo $authordata['id']; ?>"><?php echo $data['author']; ?></a> on 2 Aug 2013
                                    </div>
                                </div>
                                <div class="comment-text">
                                    <?php echo $data['content']; ?>
                                </div>
                                <div class="action">
                                    <a href="edit_comment?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-xs" title="Editer">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="?approved=<?php echo $data['id']; ?>" class="btn btn-success btn-xs" title="Approuver">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </a>
                                    <a href="?delete=<?php echo $data['id']; ?>" class="btn btn-danger btn-xs" title="Supprimer">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
<?php } ?>
                </ul>
            </div>
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
