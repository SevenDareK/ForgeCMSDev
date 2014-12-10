<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'inc/header.php'; ?>
    <title>Panel admin de <?php echo $site_name; ?></title>
<?php
        function remove_accent($str)
        {
            $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð',
                'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã',
                'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ',
                'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ',
                'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
                'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī',
                'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ',
                'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ',
                'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť',
                'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ',
                'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ',
                'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');

            $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O',
                'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c',
                'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
                'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D',
                'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g',
                'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K',
                'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o',
                'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S',
                's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W',
                'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i',
                'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
            return str_replace($a, $b, $str);
        }
        /* Générateur de Slug (Friendly Url) : convertit un titre en une URL conviviale.*/
        function Slug($str){
            return mb_strtolower(preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'),
                array('', '-', ''), remove_accent($str)));
        }
        define('KB', 1024);
        define('MB', 1048576);
        define('GB', 1073741824);
        define('TB', 1099511627776);
        ?>
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
                            Ajouter une News <small>Partager vos acctualitées</small>
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
    if (@$_POST['fichier']) {
    $content_dir = '../uploads/news/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') && !strstr($type_file, 'png') )
    {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }
    if ($_FILES['fichier']['name'] > 3*MB) {
        # code...
    }
}
$title = htmlspecialchars($_POST['title']);
$content = $_POST['content'];
$author = $_SESSION['pseudo'];
    if ($_POST['title']) {
        if ($_POST['content']) {
        $req_addNews = $pdo->prepare("INSERT INTO news(title, content, author, hours, daten, stat, feat_img, com) VALUES(:title, :content, :author, :hours, :daten, :stat, :feat_img, :com)");
        $req_addNews->execute(array(
                'title' => $title,
                'content' => $content,
                'author' => $author,
                'hours' => $heure,
                'daten' => $date,
                'stat' => $_POST['stat'],
                'feat_img' => $_FILES['fichier']['name'],
                'com' => $_POST['com']
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
<style type="text/css">
    .col-lg-2 {
width: 12.66666667%;
}
.col-lg-3 {
width: 21.21%;
}
</style>
<form method="post" enctype="multipart/form-data">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Titre" name="title">
        <div class="input-group-btn">
            <button type="submit" class="btn btn-primary">Envoyer <i class="fa fa-send"></i></button>
        </div>
    </div>
<link rel="stylesheet" type="text/css" href="editor/bootstrap3-wysihtml5.css"><br>
<div class="row">
    <div class="col-lg-8">
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
            <li>
                <a class="btn btn-white" data-wysihtml5-command="createLink" title="Insert link" tabindex="-1" href="javascript:;" unselectable="on" data-toggle="modal" data-target="#link"><i class="fa-external-link"></i></a>
                <div class="bootstrap-wysihtml5-insert-link-modal modal fade" id="link"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h4 class="modal-title">Insert link</h4></div><div class="modal-body"><input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control"><label class="checkbox"> <input type="checkbox" class="bootstrap-wysihtml5-insert-link-target iswitch" checked="">Open link in new window</label></div><div class="modal-footer"><a href="#" class="btn btn-white" data-dismiss="modal">Cancel</a><a href="#" class="btn btn-info" data-dismiss="modal">Insert link</a></div></div></div></div>
 
            </li>
            <li class="pull-right">
                <div class="btn-group">
                    <a class="btn btn-default" data-wysihtml5-action="change_view" title="Edit HTML" href="javascript:;" unselectable="on"><i class="fa fa-code"></i></a>
                </div>
            </li>
        </ul>
    <textarea id="wysihtml5-textarea" class="wysihtml5-textarea form-control" name="content" rows="10" style="margin-right:3%;" placeholder="Contenu"></textarea>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">Paramètre de publication</div>
            <div class="panel-body">
            <small style="color:#777777;">Statut de la news</small>
                <select name="stat" id="statue" class="form-control">
                    <option value="1">Publique</option>
                    <option value="2">Privé</option>
                </select><br>
                <small style="color:#777777;">
                    Pour voir un news en privé, vous devez être connecté.
                </small>
               
            </div>
        </div> 
        <div class="panel panel-default">
            <div class="panel-heading">Associer une image <small>Obligatoire</small></div>
            <div class="panel-body">
            <small style="color:#777777;">Selectionnez l'image (748px x 141px)</small>
            <input type="file" name="fichier" class="form-control">
               
            </div>
        </div>    
        <div class="panel panel-default">
            <div class="panel-heading">Gérer les commentaires</div>
            <div class="panel-body">
            <small style="color:#777777;">Activer ou désactiver les commentaires</small><br>
            <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="com" id="option1" autocomplete="off" checked value="activate"> Activer
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="com" id="option2" autocomplete="off" value="deactivate"> Désactiver
  </label>
</div>
               
            </div>
        </div> 
    </div>
</div>
        

</form>

            </div>
            <!-- /.container-fluid -->

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