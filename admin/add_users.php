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
                            Ajouter un Utilisateur <small>Inscrivez des Utilisateurs</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Accueil
                            </li>
                            <li class="active">
                                <i class="fa fa-plus-square-o "></i> Ajouter un Utilisateur
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<style type="text/css">
    .input-group-addon {
        width: 130px;
    }
    td {
        padding-bottom: 5px;
    }
</style>
<?php                
if ($_POST) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = md5($_POST['password']);
    $sexe = $_POST['sexe'];
    $age = htmlspecialchars($_POST['age']);
    $bio = htmlspecialchars($_POST['bio']);
    $rang = htmlspecialchars($_POST['rang']);
    $session = md5(rand());
    if ($_POST['pseudo']) {
        if ($_POST['nom']) {
            if ($_POST['prenom']) {
                if ($_POST['mail']) {
                    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    if ($_POST['password'] == $_POST['retape']) {
                        if ($_POST['sexe']) {
                            if ($_POST['age'] && is_numeric($_POST['age']) && $_POST['age'] >= 1 && $_POST['age'] <= 99) {
                                if ($_POST['rang'] && is_numeric($_POST['rang']) && $_POST['rang'] >= 1 && $_POST['rang'] <= 2) {
                            $req = $pdo->prepare("INSERT INTO users(pseudo, nom, prenom, mail, password, sexe, age, bio, session, rang) VALUES(:pseudo, :nom, :prenom, :mail, :password, :sexe, :age, :bio, :session, :rang)");
                            $req->execute(array(
                                        'pseudo' => $pseudo,
                                        'nom' => $nom,
                                        'prenom' => $prenom,
                                        'mail' => $mail,
                                        'password' => $password,
                                        'sexe' => $sexe,
                                        'age' => $age,
                                        'bio' => $bio,
                                        'session' => $session,
                                        'rang' => $rang
                                        )); ?>
                            <div class="alert alert-success alert-dismissable">
    <i class="fa fa-info"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    L'<?php if ($_POST['rang'] == 1) { echo "utilisateur"; } else { echo "administrateur"; } echo " ".$_POST['pseudo']."";?> a bien été créé.
</div>
                               <?php } 
                            } else { ?>
                                <div class="notification">Vous n'avez pas indiquez votre age ou il n'est pas valide (seulement numérique)</div>
                            <?php }
                        } else { ?>
                            <div class="notification">Vous n'avez pas indiquez votre sexe</div>
                        <?php }
                    } else { ?>
                        <div class="notification">Vos mots de passe ne sont pas indentiques</div>
                   <?php } 
                } else { ?>
                    <div class="notification">Votre email est invalide il doit être sous la forme 'email@domain.com</div>
                <?php } 
                } else { ?>
                    <div class="notification">Vous n'avez pas indiquez votre mail</div>
                <?php } 
            } else { ?>
                <div class="notification">Vous n'avez pas indiquez votre prenom</div>
            <?php } 
        } else { ?>
            <div class="notification">Vous n'avez pas indiquez votre nom</div>
        <?php } 
    } else { ?>
        <div class="notification">Vous n'avez pas indiquez votre pseudo</div>
    <?php } }?>
<form method='post'>
    <fieldset>
        <legend>Informations générales</legend>
            <table>
                <tr>
                    <td><div class="input-group"><span class="input-group-addon">Pseudo</span><input type="text" class="form-control" name="pseudo"></div></td>
                </tr>
                <tr>
                    <td><div class="input-group"><span class="input-group-addon">Nom</span><input type="text" class="form-control" name="nom"></div></td>
                </tr>
                <tr>
                    <td><div class="input-group"><span class="input-group-addon">Prenom</span><input type="text" class="form-control" name="prenom"></div></td>
                </tr>
                <tr>
                    <td><div class="input-group"><span class="input-group-addon">Mail</span><input type="text" class="form-control" name="mail"></div></td>
                </tr>
                <tr>
                    <td><div class="input-group"><span class="input-group-addon">Mot de passe</span><input type="password" class="form-control" name="password"></div></td>
                </tr>
                <tr>
                    <td><div class="input-group"><span class="input-group-addon">Repeter</span><input type="password" class="form-control" name="retape"></div></td>
                </tr>
                <tr>
                    <td><div class="input-group"><span class="input-group-addon">Rang</span><select name="rang" id="id" class="form-control"><option value="1">Utilisateur</option><option value="2">Administrateur</option></select></div></td>
                </tr>
            </table>
    </fieldset>
    <fieldset>
        <legend>Informations personnels</legend>
            <table>
                <tr>
                    <td><div class="input-group"><span class="input-group-addon sexe">Sexe</span>&nbsp&nbsp<input type="radio" name="sexe" value="H" class="sexe">Homme&nbsp&nbsp<input type="radio" name="sexe" value="F">Femme</div></td>
                </tr>
                <tr>
                    <td><div class="input-group"><span class="input-group-addon">Age</span><input type="text" class="form-control" name="age"></div></td>
                </tr>
                <tr>
                    <td>
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-edit "></i></span>
    <textarea name="bio" id="bio" cols="30" rows="10" class="form-control" placeholder="Biographie"></textarea>
</div>
</td>
                </tr>
            </table>
    </fieldset>
    <input type="submit" value="S'inscrire" name="submit" class="btn btn-primary">
</form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

</body>

</html>
