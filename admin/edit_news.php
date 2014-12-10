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
                            Modifier une News
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Accueil
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil-square-o"></i> Modifier une News
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php 
include '../inc/config.php';

if (@$_GET['voir']) {
    $voir = $pdo->prepare("SELECT * FROM news WHERE id=:id");
    $voir->execute(array(
        'id' => $_GET['voir']
        ));
    $donnees = $voir->fetch();
    if (isset($donnees['id'])) {
    if ($_POST) {
        $title = $_POST['title'];
        $content = $_POST['content'];
    $maj = $pdo->prepare("UPDATE news SET title=:title, content=:content WHERE id=:id");
    $maj->execute(array(
        'title' => $title,
        'content' => $content,
        'id' => $_GET['voir']
        ));
    echo "<script type='text/javascript'>document.location.replace('news?succes=1');</script>";
    }
?>
    
    <form method="post">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Titre" name="title" value="<?php echo $donnees['title']; ?>">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Modifier <i class="fa fa-edit"></i></button>
                        </div>
                    </div><br>
<link rel="stylesheet" type="text/css" href="editor/bootstrap3-wysihtml5.css">
        <ul id="toolbar" class="wysihtml5-toolbar btn-toolbar" style="widh:90%;" >
            <li class="dropdown">
                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-font"></i>&nbsp;<span class="current-font"> Format </span>&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="div" href="javascript:;" unselectable="on">Normal</a></li>
                    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" href="javascript:;" unselectable="on">Heading 1</a></li>
                    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" href="javascript:;" unselectable="on">Heading 2</a></li><li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" href="javascript:;" unselectable="on">Heading 3</a></li>
                </ul>
            </li>
            <li>
                <div class="btn-group">
                    <a class="btn btn-default" data-wysihtml5-command="bold" title="CTRL+B" href="javascript:;" unselectable="on">Gras</a>
                    <a class="btn btn-default" data-wysihtml5-command="italic" title="CTRL+I" href="javascript:;" unselectable="on">Italique</a>
                    <a class="btn btn-default" data-wysihtml5-command="underline" title="CTRL+U" href="javascript:;" unselectable="on">Souligner</a>
                </div>
            </li>
            <li>
                <div class="btn-group">
                    <a class="btn btn-default" data-wysihtml5-command="insertUnorderedList" title="Unordered list" href="javascript:;" unselectable="on"><i class="fa fa-list"></i></a>
                    <a class="btn btn-default" data-wysihtml5-command="insertOrderedList" title="Ordered list" href="javascript:;" unselectable="on"><i class="fa fa-th-list"></i></a>
                    <a class="btn btn-default" data-wysihtml5-command="Outdent" title="Outdent" href="javascript:;" unselectable="on"><i class="fa fa-outdent"></i></a>
                    <a class="btn btn-default" data-wysihtml5-command="Indent" title="Indent" href="javascript:;" unselectable="on"><i class="fa fa-indent"></i></a>
                </div>
            </li>
            <li class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default" data-wysihtml5-action="change_view" title="Edit HTML" href="javascript:;" unselectable="on"><i class="fa fa-code"></i></a>
                </div>
            </li>
        </ul>
            <textarea id="wysihtml5-textarea" class="wysihtml5-textarea form-control" name="content" rows="10" style="margin-right:3%;" placeholder="Contenu"><?php echo $donnees['content']; ?></textarea>

</div>

    </form>
<?php } else {
    echo "<script type='text/javascript'>document.location.replace('news');</script>";
}
} else {
    echo "<script type='text/javascript'>document.location.replace('news');</script>";
}




?>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

<script src="editor/advanced.js"></script>
<!-- Library -->
<script src="editor/wysihtml5-0.3.0.min.js"></script>
<script>
(function() {
        var editor = new wysihtml5.Editor("wysihtml5-textarea", { // id of textarea element
            toolbar:      "toolbar", // id of toolbar element
            parserRules:  wysihtml5ParserRules // defined in parser rules set 
        });
})();
</script>
</body>

</html>
