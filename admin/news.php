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

            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            News <small>Gerez vos acctualitées</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Accueil
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil-square-o"></i> News
                            </li>

                        </ol>
                    </div>
                </div>

                <!-- Page Heading -->
<?php 
if (@$_GET['success'] == 2) { ?>
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Vous avez bien supprimer toutes les news
    </div>
<?php } ?>
<?php
$sql = 'SELECT * FROM news';
// Récupération de la valeur du select
if (isset($_POST['trier'])) {
if ($_POST['ordre'] == "desc") {
    $sql .= " ORDER BY id DESC ";
} elseif ($_POST['ordre'] == "asc") {
    $sql .= " ORDER BY id ASC";
}
} ?>
<div class="row">
    <div class="col-md-3">
        <form method="post">
            <div class="input-group">
                <div class="input-group-btn">
                <input type="submit" class="btn btn-primary btn-sm" value="Trier" name="trier">
            </div>
            <style type="text/css">
            select {
                height: 30px;
            }
            </style>
                <select name="ordre">
                    <option value="desc">Décroissant</option>
                    <option value="asc">Croissant</option>
                </select>
            </div>
        </form>
    </div>
    <div class="col-md-3 pull-right" style="text-align:right;">
        <a href="add_news" class="btn btn-primary">Ajouter une News</a>
    </div>
</div><br>
                                <div class="box-body table-responsive">
<?php 
if (@$_GET['succes'] == 1) { ?>
    <div class="alert alert-info alert-dismissable">
        <i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        La news a bien été mise à jour !
    </div>
<?php }
if (@$_GET['delete']) {
    $del = $pdo->prepare("DELETE FROM news WHERE id=:id");
    $del->execute(array(
        'id' => $_GET['delete']
        ));
    $del_com = $pdo->prepare("DELETE FROM comment WHERE news_id=:news_id");
    $del_com->execute(array(
        'news_id' => $_GET['delete']
        ));
}
if (@$_GET['voir']) {
    $voir = $pdo->prepare("SELECT * FROM news WHERE id=:id");
    $voir->execute(array(
        'id' => $_GET['voir']
        ));
    $donnees = $voir->fetch();
    echo $donnees['content'];
} else {


?>




                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Titre</th>
                                                <th>Contenu</th>
                                                <th>Auteur</th>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 
$charset8 = $dbb->query("set names 'utf8'");
$reponse = $dbb->query($sql);
while ($donnees = $reponse->fetch_array()){
    ?>
 <tr>
     <td><?php echo $donnees['id']; ?></td>
     <td style="width:100px;word-break: break-all;"><?php echo $donnees['title']; ?></td>

     <td><?php echo strip_tags(substr($donnees['content'],0,100)); ?>...</td>
<?php
$req_author = $pdo->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
$req_author->execute(array(
    'pseudo' => $donnees['author']
    ));
$author = $req_author->fetch();
?>

     <td><a href="profil_user?id=<?php echo $author['id']; ?>"><?php echo $donnees['author']; ?></a> </td>
     <td><?php echo $donnees['daten']; ?></td>
     <td><?php echo $donnees['hours']; ?></td>
     <td style="width:100px;"><a class="btn btn-danger btn-sm" href="news?delete=<?php echo $donnees['id']; ?>"><i class="fa fa-times-circle"></i></a>&nbsp<a class="btn btn-primary btn-sm" href="edit_news?voir=<?php echo $donnees['id']; ?>"><i class="fa fa-eye"></i></a></td>
 </tr>
<?php
}
?>
                                        </tbody>
                                    </table><?php } ?>
<div style="text-align:center;">
<a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#basicModal">Supprimer toutes les News</a>
</div>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title" id="myModalLabel">Êtes-vous sur de vouloir supprimer toutes ls news ?</h4>
            </div>
            <div class="modal-footer">
            <div style="text-align:center;">
                <form method="post" action="delete_news">
                    <input type="submit" name="delete_all" class="btn btn-danger" value="Supprimer définitivement">
                </form>
            </div>
            </div>
    </div>
  </div>
</div>
</div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

</body>

</html>
