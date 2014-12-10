<?php
$users_count = $dbb->query("SELECT * FROM users");
$users_rowcount = $users_count->num_rows;
$news_count = $dbb->query("SELECT * FROM news");
$news_rowcount = $news_count->num_rows;
$widget_count = $dbb->query("SELECT * FROM widget");
$widget_rowcount = $widget_count->num_rows;
$comment_count = $dbb->query("SELECT * FROM comment");
$comment_rowcount = $comment_count->num_rows;
?>
<style type="text/css">
.badge-color {
  background-color: #3071A9;
}
</style>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../"><?php echo $site_name; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo $_SESSION['pseudo'];} ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profil_user?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../deconnexion"><i class="fa fa-fw fa-power-off"></i> Déconnexion</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo "".$url."admin/"; ?>"><i class="fa fa-fw fa-dashboard"></i> Accueil</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#news"><i class="fa fa-fw fa-pencil-square-o"></i> News <i class="fa fa-fw fa-caret-down"></i><span class="pull-right badge badge-color"><?php echo $news_rowcount; ?></span></a>
                        <ul id="news" class="collapse">
                            <li>
                                <a href="news">Voir toutes les News</a>
                            </li>
                            <li>
                                <a href="add_news">Ajouter une News</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i> Utilisateurs <i class="fa fa-fw fa-caret-down"></i><span class="pull-right badge badge-color" style="background-color: #5CB85C;"><?php echo $users_rowcount; ?></span></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="users">Voir tous les Utilisateurs</a>
                            </li>
                            <li>
                                <a href="add_users">Ajouter un Utilisateur</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#widget"><i class="fa fa-fw fa-cog"></i> Widgets <i class="fa fa-fw fa-caret-down"></i><span class="pull-right badge badge-color" style="background-color: #F0AD4E;"><?php echo $widget_rowcount; ?></span></a>
                        <ul id="widget" class="collapse">
                            <li>
                                <a href="widget">Voir toutes les News</a>
                            </li>
                            <li>
                                <a href="add_widget">Ajouter une News</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="comment"><i class="fa fa-fw fa-comment"></i> Commantaires <span class="pull-right badge badge-color" style="background-color:#D9534F;"><?php echo $comment_rowcount; ?></span></a>
                    </li>
                    <li>
                        <a href="db"><i class="fa fa-database"></i> Base de données</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>