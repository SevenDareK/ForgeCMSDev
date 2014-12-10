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

            <div class="container-fluid" style="overflow:hidden;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Utilisateurs <small>Gerez vos utilisateurs</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Acceuil
                            </li>
                            <li class="active">
                                <i class="fa fa-users"></i> Utilisateurs
                            </li>
                        </ol>
                    </div>
                </div>
<?php 
if (@$_GET['success'] == 1) { ?>
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Vous avez bien supprimer tous les utilisateurs
    </div>
<?php }

if (@$_GET['delete']) {
    $del = $pdo->prepare("DELETE FROM users WHERE id=:id");
    $del->execute(array(
        'id' => $_GET['delete']
        ));
}

?>
<?php 
$sql = 'SELECT * FROM users';
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
        <a href="add_users" class="btn btn-primary">Ajouter un Utilisateur</a>
    </div>
</div><br>
<table id="example1" class="table table-bordered table-striped">
    <thead>

        <tr>
            <th style="width:10px;">Id</th>
            <th>Pseudo</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Mail</th>
            <th>Sexe</th>
            <th style="width:150px;">Date de naissance</th>
            <th>Rang</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php 

$charset8 = $dbb->query("set names 'utf8'");
$news = $dbb->query($sql);

while ($donnees = $news->fetch_array()) { ?>
<tr class="tdnormal">
    <td><?php echo $donnees['id']; ?></td>
    <td><?php echo $donnees['pseudo']; ?></td>
    <td><?php echo $donnees['nom']; ?></td>
    <td><?php echo $donnees['prenom']; ?></td>
    <td><?php echo $donnees['mail']; ?></td>
    <td><?php if ($donnees['sexe'] == 'H') {
    echo "Homme";
} elseif ($donnees['sexe'] == 'F') {
    echo "Femme";
}
?></td>
    <td><?php echo $donnees['birth_d']; ?>/<?php echo $donnees['birth_m']; ?>/<?php echo $donnees['birth_y']; ?> (<?php echo $annee-$donnees['birth_y']; ?> ans)</td>
    <td><?php 
if ($donnees['rang'] == 1) { echo "Utilisateur"; } elseif ($donnees['rang'] == 2) { ?><span style="color:rgba(255, 0, 0, 0.8);">Administrateur</span><?php } ?></td>
    <td style="width:100px;"><a class="btn btn-danger btn-sm" href="users?delete=<?php echo $donnees['id']; ?>"><i class="fa fa-times-circle"></i></a>&nbsp<a class="btn btn-primary btn-sm" href="profil_user?id=<?php echo $donnees['id']; ?>"><i class="fa fa-eye"></i></a></td>
</tr>
<?php } ?>
                                        </tbody>
                                    </table>
<div style="text-align:center;">
<a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#basicModal">Supprimer tous les Utilisateurs</a>
</div>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title" id="myModalLabel">Êtes-vous sur de vouloir supprimer tous les Utilisateurs ?</h4>
            </div>
            <div class="modal-footer">
            <div style="text-align:center;">
                <form method="post" action="delete_users">
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
