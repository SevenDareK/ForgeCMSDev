<?php session_start(); ?>
<?php include 'inc/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News | <?php echo "".$site_name." | ";echo $slogan; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/app.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
        ?>
        <style type="text/css">

.feat_img {
    width: 100%;
    overflow: hidden;
}
.container_feat {
    height: 141px;
    overflow: hidden;
}
        </style>
</head>

<body>

    <!-- Navigation -->
<?php include 'sec/nav.php' ?>

    <!-- Header Carousel -->
<?php include 'sec/slider.php' ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row" style="margin-top:30px;">
            <div class="col-xs-12 col-sm-6 col-lg-8">
<?php
if (@$_GET['error'] == '1') { ?>
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        Cette news n'éxiste pas ou plus.
    </div>
<?php } ?>
<?php
if (@$_GET['error'] == '2') { ?>
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        Cette news est privée.
    </div>
<?php } ?>


<?php
if (@$_GET['id']) {
    $req_page = $pdo->prepare("SELECT * FROM news WHERE id=:id");
    $req_page->execute(array(
        'id' => $_GET['id']
        ));
    $page = $req_page->fetch();
    if (!isset($_SESSION['id']) && !isset($_SESSION['pseudo']) AND $page['stat'] == 2) {
        echo "<script type='text/javascript'>document.location.replace('news.php?error=2');</script>";
    }
    $req_author_page = $pdo->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
    $req_author_page->execute(array(
        'pseudo' => $page['author']
        ));
    $author_page = $req_author_page->fetch();
    if (isset($page['id'])) {
        $req_count_com = $dbb->query("SELECT * FROM comment WHERE news_id=".$page['id']."");
        $count_com = $req_count_com->num_rows;
    ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><?php echo $page['title']; ?>
                    <small><span class="pull-right"><i class="fa fa-comments-o"></i> <?php echo $count_com; ?></span></small></h4></div>
                    <?php
                    if ($page['feat_img']) { ?>
                    <div class="container_feat">
                        <img src="uploads\news\<?php echo $page['feat_img']; ?>" class="feat_img"/>
                    </div>
                    <?php } ?>
                    <div class="panel-body">
                        <?php echo $page['content']; ?>
                    </div>
                    <div class="panel-footer">
                        <i class="fa fa-user"></i> <a href="profil.php?id=<?php echo $author_page['id']; ?>"><?php echo $page['author']; ?></a> 
                        <div class="pull-right"><i class="fa fa-calendar"></i> Le <?php echo $page['daten']; ?> à <?php echo $page['hours']; ?></div>
                    </div>
                </div>
                <nav>
                    <?php
                    $prev = $page['id']-1;
                    $suiv = $page['id']+1;
                    $req_prevId = $pdo->prepare("SELECT * FROM news WHERE id=:id");
                    $req_prevId->execute(array(
                        'id' => $prev
                        ));
                    $prevId = $req_prevId->fetch();
                    $req_suivId = $pdo->prepare("SELECT * FROM news WHERE id=:id");
                    $req_suivId->execute(array(
                        'id' => $suiv
                        ));
                    $suivId = $req_suivId->fetch();
                    if ($prevId['stat'] == 2) {
                        $prevP = $prev-1;
                    } else {
                        $prevP = $prev;
                    }
                    if ($suivId['stat'] == 2) {
                        $suivP = $suiv-1;
                    } else {
                        $suivP = $suiv;
                    }
                    ?>
                  <ul class="pager">
                    <li class="previous"><a href="<?php echo '?id='.$prevP.''; ?>"><span aria-hidden="true">&larr;</span> Précédent</a></li>
                    <li class="next"><a href="<?php echo '?id='.$suivP.''; ?>">Suivant <span aria-hidden="true">&rarr;</span></a></li>
                  </ul>
                </nav>
                <?php
                if ($page['com'] == 'activate') {
                if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
                    if ($_POST) {
                        if ($_POST['subject']) {
                            if ($_POST['content']) {
                                $subject = htmlspecialchars($_POST['subject']);
                                $content = htmlspecialchars($_POST['content']);
                                $author = $_SESSION['pseudo'];
                                $datec = $date;
                                $hours = $heure;
                                $id = $page['id'];
                                $req_addCom = $pdo->prepare("INSERT INTO comment(subject, content, author, datec, hours, news_id) VALUES(:subject, :content, :author, :datec, :hours, :news_id)");
                                $req_addCom->execute(array(
                                    'subject' => $subject,
                                    'content' => $content,
                                    'author' => $author,
                                    'datec' => $datec,
                                    'hours' => $hours,
                                    'news_id' => $id
                                    )); ?>
                                <div class="alert alert-info" role="alert">
                                    Votre commentaire sera publié quand l'administrateur l'aura approuvé.
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    Veuillez saisir correctement le formulaire.
                                </div>
                            <?php }
                        } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                Veuillez saisir correctement le formulaire.
                            </div>
                        <?php }
                    }
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Envoyer un commentaire : </h4> 
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <input type="text" class="form-control" name="subject" placeholder="Sujet du commentaire"><br>
                            <textarea name="content" cols="30" rows="10" class="form-control" placeholder="Commentaire"></textarea><br>
                            <input type="submit" value="Commenter" class="btn btn-primary pull-right">
                        </form>
                    </div>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Vous devez être connecté pour envoyer un commentaire. <a href="connexion.php">Vous connecter</a>.
                </div>
                <?php } ?>
                <?php
                $req_com = $pdo->prepare("SELECT * FROM comment WHERE news_id=:news_id AND stat='2' ORDER BY id desc");
                $req_com->execute(array(
                    'news_id' => $page['id']
                    ));
                while ($com = $req_com->fetch()) {
                ?>
                <div class="panel panel-default" style="border-bottom: 1px solid #DDDDDD;" id="com">
                      <div class="panel-body">
                        <h3><?php echo $com['subject']; ?></h3>
                        <p><?php echo $com['content']; ?></p>
                        </div>
                        <div class="panel-footer">
                        <div class="row">
                            <div class="col-lg-4"><i class="fa fa-user"></i> <?php echo $com['author']; ?></div>
                            <div class="col-lg-4 pull-right" style="text-align:right;"><i class="glyphicon glyphicon-calendar"></i> Le <?php echo $com['datec']; ?> à <?php echo $com['hours']; ?></div>
                        </div>
                      </div>
                </div>
                    <?php } 
} else { ?>
    <div class="alert alert-info" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Les commentaires son désactivés
                </div>
<?php }
                    ?>
<?php } else {
header('Location: news.php');
echo "<script type='text/javascript'>document.location.replace('news.php?error=1');</script>";            }
} else {
$charset8 = $dbb->query("set names 'utf8'");
$stat = '1';
$req_news = $dbb->query("SELECT * FROM news WHERE stat='1' ORDER BY id DESC");
if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
    $req_adminUser = $pdo->prepare("SELECT * FROM users WHERE id=:id AND pseudo=:pseudo");
    $req_adminUser->execute(array(
        'id' => $_SESSION['id'],
        'pseudo' => $_SESSION['pseudo']
        ));
    $adminUser = $req_adminUser->fetch();
    if ($adminUser['rang'] == 2) {
$req_privateNews = $dbb->query("SELECT * FROM news WHERE stat='2'");
$count_privateNews = $req_privateNews->num_rows;
if ($count_privateNews != 0) {
?>

<fieldset>
    <legend>Les news privées</legend>
    <?php

while ($privateNews = $req_privateNews->fetch_array()) {
$req_authorPrivate = $pdo->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
$req_authorPrivate->execute(array(
    'pseudo' => $privateNews['author']
    ));
$authorPrivate = $req_authorPrivate->fetch();
$req_count_comPrivate = $dbb->query("SELECT * FROM comment WHERE news_id=".$privateNews['id']."");
$count_comPrivate = $req_count_comPrivate->num_rows;
?>
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="?id=<?php echo $privateNews['id']; ?>"><?php echo $privateNews['title']; ?></a><span class="pull-right"><a href="?id=<?php echo $privateNews['id']; ?>#com"><i class="fa fa-comments-o"></i> <?php echo $count_comPrivate; ?></a></span></div>
                    <?php if ($privateNews['feat_img']) { ?>
                    <div class="container_feat">
                        <a href="?id=<?php echo $privateNews['id']; ?>">
                        <img src="uploads\news\<?php echo $privateNews['feat_img']; ?>" class="feat_img"/>
                    </a>
                    </div>
                    <?php } ?>
                    <div class="panel-body">
                        <?php echo strip_tags(substr($privateNews['content'],0,150)); ?>...
                    </div>
                    <div class="panel-footer">
                        <i class="fa fa-user"></i> <a href="profil.php?id=<?php echo $authorPrivate['id']; ?>"><?php echo $privateNews['author']; ?></a> 
                        <div class="pull-right"><i class="fa fa-calendar"></i> Le <?php echo $privateNews['daten']; ?> à <?php echo $privateNews['hours']; ?></div>
                    </div>
                </div>
</fieldset>

<?php
}
}
}
}
?>
<fieldset>
    <legend>Toutes les news</legend>

<?php while ($news = $req_news->fetch_array()) {
$req_author = $pdo->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
$req_author->execute(array(
    'pseudo' => $news['author']
    ));
$author = $req_author->fetch();
$req_count_com_2 = $dbb->query("SELECT * FROM comment WHERE news_id=".$news['id']."");
$count_com_2 = $req_count_com_2->num_rows;
?>
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="?id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a><span class="pull-right"><a href="?id=<?php echo $news['id']; ?>#com"><i class="fa fa-comments-o"></i> <?php echo $count_com_2; ?></a></span></div>
                    <?php if ($news['feat_img']) { ?>
                    <div class="container_feat">
                        <a href="?id=<?php echo $news['id']; ?>">
                    
                        <img src="uploads\news\<?php echo $news['feat_img']; ?>" class="feat_img"/>
                    </a>
                    </div>
                    <?php } ?>
                    <div class="panel-body">
                        <?php echo strip_tags(substr($news['content'],0,150)); ?>...
                    </div>
                    <div class="panel-footer">
                        <i class="fa fa-user"></i> <a href="profil.php?id=<?php echo $author['id']; ?>"><?php echo $news['author']; ?></a> 
                        <div class="pull-right"><i class="fa fa-calendar"></i> Le <?php echo $news['daten']; ?> à <?php echo $news['hours']; ?></div>
                    </div>
                </div>
</fieldset>
<?php } } ?>
            </div>
            <div class="col-xs-6 col-lg-4">
                <?php include 'sec/sidebar.php'; ?>
            </div>
        </div>
        <!-- /.row -->
        <hr>

        <!-- Footer -->
<?php include 'sec/footer.php' ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    <script type="text/javascript" src="js/jquery.timeago.js"></script>

</body>

</html>
