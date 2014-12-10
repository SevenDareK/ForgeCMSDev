<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'inc/header.php'; ?>
    <title>Panel admin de <?php echo $site_name; ?></title>
</head>

<body>

    <div id="wrapper">
<?php include 'sec/head.php';
if (@$_GET['id']) {
    $voir = $pdo->prepare("SELECT * FROM users WHERE id=:id");
    $voir->execute(array(
        'id' => $_GET['id']
        ));
    $donnees = $voir->fetch();

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile de <?php 
                            if ($donnees['rang'] == '2') { ?>
                                <span style="color:rgba(255, 0, 0, 0.8);"><?php echo $donnees['pseudo']; ?></span>
                            <?php } else {
                                echo $donnees['pseudo'];
                            }



                             ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
 <style type="text/css">
.profil_td {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.bg-light-blue {
    background-color: #3071A9;
}
        </style>
<?php
    if (isset($donnees['id'])) {
?>
<div style="text-align:center;">
    <!-- User image -->
    <div class="user-header bg-light-blue">
<?php 
if (isset($donnees['img_profil'])) { ?>
    <img src="../img/user_an.png" class="img-circle" style="margin-top:10px;border-color: rgba(255, 255, 255, 0.2);border-style: solid;border-width: 8px;" alt="<?php echo $donnees['pseudo']; ?>">
<?php } else { ?>
    <img src="../img/user/<?php echo $donnees['pseudo']; ?>.png" class="img-circle" style="margin-top:10px;border-color: rgba(255, 255, 255, 0.2);border-style: solid;border-width: 8px;" alt="<?php echo $donnees['pseudo']; ?>">
<?php } ?>

        <p>
            <?php echo $donnees['pseudo']." (".$donnees['prenom']." ".$donnees['nom'].")"; ?> - <?php if ($donnees['rang'] == 1) { echo "Utilisateur"; } elseif ($donnees['rang'] == 2) { ?><span style="color:rgba(255, 0, 0, 0.8);">Administrateur</span><?php } ?>
        </p>
    </div>
    <!-- Menu Body -->
    <div class="user-body" style="margin-top:-10px;">
<table class="table table-bordered">

    <tbody>
    <tr>
        <td class="profil_td">Pseudo</td>
        <td><?php echo $donnees['pseudo']; ?></td>
    </tr>
    <tr>
        <td class="profil_td">Nom</td>
        <td><?php echo $donnees['nom']; ?></td>
    </tr>
    <tr>
        <td class="profil_td">Prenom</td>
        <td><?php echo $donnees['prenom']; ?></td>
    </tr>
    <tr>
        <td class="profil_td">Mail</td>
        <td><a href="mailto:<?php echo $donnees['mail']; ?>"><?php echo $donnees['mail']; ?></a></td>
    </tr>
    <tr>
        <td class="profil_td">Sexe</td>
        <td><?php if ($donnees['sexe'] == 'H') { echo "Homme"; } elseif ($donnees['sexe'] == 'F') { echo "Femme"; } ?></td>
    </tr>
    <tr>
        <td class="profil_td">Age</td>
        <td>Né le <?php echo $donnees['birth_d']; ?>/<?php echo $donnees['birth_m']; ?>/<?php echo $donnees['birth_y']; ?> (<?php echo $annee-$donnees['birth_y']; ?> ans)</td>
    </tr>
    <tr>
        <td class="profil_td">Bio</td>
        <td><?php 
        if (isset($donnees['bio'])) {
            echo "<em>Aucune biographie</em>";
        } else {
            echo $donnees['bio'];
        } ?></td>
    </tr>
    </tbody>
</table>
    </div>
    <!-- Menu Footer-->
    <div class="user-footer">
    <div>


    </div>
    <div class="row">
<?php
if ($donnees['rang'] == 1) {
    if ($_POST) {
        $rang = 2;
        $req_up = $pdo->prepare("UPDATE users SET rang=:rang WHERE id=:id");
        $req_up->execute(array(
            'rang' => $rang,
            'id' => $donnees['id']
            ));
    }
?>
       <div class="col-xs-6 col-sm-4">
    <form method="post">
        <button type="submit" class="form-control">Promouvoir</button>
    </form>
        </div>
<?php } ?>
        <div style="text-aling:right;" class="col-xs-6 col-sm-4 pull-right">
<?php
if ($donnees['rang'] == 1) { ?>
    <a class="btn btn-danger btn-sm" href="users?delete=<?php echo $donnees['id']; ?>"><i class="fa fa-times-circle"></i> Supprimer</a>
<?php } else { ?>
    <a class="btn btn-danger btn-sm disabled" href="users?delete=<?php echo $donnees['id']; ?>"><i class="fa fa-times-circle"></i> Vous ne pouvez pas supprimer un Administrateur</a>

<?php }


?></div>
        </div>
    </div>
 </div>
<?php } else {
echo 'L\'utilisateur n\'éxiste pas. <a href="users">Voir tous les utilisateur</a>';
}
} else {
    echo "Veuillez saisir un utilisateur";
}
    ?>


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

</body>

</html>