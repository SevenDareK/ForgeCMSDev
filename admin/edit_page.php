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
                            Modifier une page <small>Partager vos acctualitées</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Accueil
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil-square-o"></i> Ajouter un News
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php
include '../inc/config.php';
if ($_POST) {
$title = htmlspecialchars($_POST['title']);
$content = $_POST['content'];
$author = $_SESSION['pseudo'];
    if ($_POST['title']) {
        if ($_POST['content']) {
        $req_addNews = $pdo->prepare("INSERT INTO news(title, content, author, hours, daten) VALUES(:title, :content, :author, :hours, :daten)");
        $req_addNews->execute(array(
                'title' => $title,
                'content' => $content,
                'author' => $author,
                'hours' => $heure,
                'daten' => $date
            )); ?>
                            <div class="alert alert-success alert-dismissable">
    <i class="fa fa-info"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    La news "<?php echo $title; ?>" a bien été créé.
</div>
            <?php } else { ?>
            <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b>Alert!</b> Vous devez ajouter du contenu
            </div>
        <?php }
    } else { ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> Vous devez mettre un titre
        </div>
    <?php }

}
?>

<form method="post">
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
    <?php
        if (!isset($_POST['title'])) { ?>
            <input type="text" class="form-control" placeholder="Titre" name="title" id="inputError">
       <?php } else { ?>
    <input type="text" class="form-control" placeholder="Titre" name="title">
    <?php } ?>
</div>
<div style="margin-top:10px;margin-bottom:10px;">
    <div class='box-header'>
    </div><!-- /.box-header -->
    <div class='box-body'>
        <textarea id="editor1" name="content" rows="10" cols="80" placeholder="Contenu"></textarea>
    </div>
</div>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
</script><br>
<input type="submit" class="btn btn-primary" value="Ajouter">
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
