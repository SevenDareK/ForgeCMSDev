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
                            Widgets <small>Gérez vos Widgets</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Accueil
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> Widgets
                            </li>
                        </ol>
                    </div>
                </div>


<?php 
if (@$_GET['success'] == 2) { ?>
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Vous avez bien supprimer tous les widgets
    </div>
<?php } ?>
<?php 
if (@$_GET['succes'] == 1) { ?>
    <div class="alert alert-info alert-dismissable">
        <i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Le widget a bien été mise à jour !
    </div>
<?php }
if (@$_GET['delete']) {
    $del = $pdo->prepare("DELETE FROM widget WHERE id=:id");
    $del->execute(array(
        'id' => $_GET['delete']
        ));
}

$sql = 'SELECT * FROM widget';
// Récupération de la valeur du select
if ($_POST) {
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
        <a href="add_widget" class="btn btn-primary">Ajouter un Widget</a>
    </div>
</div><br>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width:10px;">Id</th>
                                                <th style="width:200px;">Titre</th>
                                                <th>Contenu</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 

$reponse = $dbb->query($sql);

while ($donnees = $reponse->fetch_array()){
    ?>
 <tr>
     <td><?php echo $donnees['id']; ?></td>
     <td style="width:100px;word-break: break-all;"><?php echo $donnees['title']; ?></td>
     <td><?php echo substr($donnees['content'],0,100); ?></td>
     <td style="width:100px;"><a class="btn btn-danger btn-sm" href="widget?delete=<?php echo $donnees['id']; ?>"><i class="fa fa-times-circle"></i></a>&nbsp<a class="btn btn-primary btn-sm" href="edit_widget.php?voir=<?php echo $donnees['id']; ?>"><i class="fa fa-eye"></i></a></td>
 </tr>
<?php
}
?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
<div style="text-align:center;">
<a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#basicModal">Supprimer tous les widgets</a>
</div>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title" id="myModalLabel">Êtes-vous sur de vouloir supprimer tous les widgets ?</h4>
            </div>
            <div class="modal-footer">
            <div style="text-align:center;">
                <form method="post" action="delete_widget">
                    <input type="submit" name="delete_all" class="btn btn-danger" value="Supprimer définitivement">
                </form>
            </div>
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
