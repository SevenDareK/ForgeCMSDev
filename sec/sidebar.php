<?php
if (isset($_SESSION['id']) && isset($_SESSION['id']))
{ ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4><i class="fa fa-fw fa-angle-right"></i> Compte de <?php echo $_SESSION['pseudo']; ?></h4>
    </div>
    <div class="panel-body">
    <a href="profil?id=<?php echo $_SESSION['id']; ?>" ><i class="fa fa-eye"></i> Voir mon profil</a><br>
    <a href="users"><i class="fa fa-users"></i> Tous le Utilisateurs</a><br>
    <?php
    $rang = $pdo->prepare("SELECT *	FROM users WHERE id=:id AND pseudo=:pseudo");
    $rang->execute(array(
    	'id' => $_SESSION['id'],
    	'pseudo' => $_SESSION['pseudo']
    	));
    $data = $rang->fetch();
    if ($data['rang'] == 2) { ?>
    	<a href="admin"><i class="fa fa-dashboard"></i> Panel d'administration</a><br>
    <?php }
    ?>
    <a href="deconnexion"><i class="fa fa-sign-out "></i> Déconnexion</a>
    </div>
</div>
    
<?php } else { ?>


<div class="btn-group-vertical" role="group" aria-label="Vertical button group" style="width:100%;margin-bottom:0px;">
      <a href="inscription" class="btn btn-primary" style="padding:10px;">S'inscrire</a>
      <a href="connexion" class="btn btn-danger" style="padding:10px;">Se connecter</a>
 </div>
 <hr>
<?php
}

$charset8 = $dbb->query("set names 'utf8'");
$req_widget = $dbb->query('SELECT * FROM widget');
while ($widget = $req_widget->fetch_array()){
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4><i class="fa fa-fw fa-angle-right"></i> <?php echo $widget['title']; ?></h4>
    </div>
    <div class="panel-body">
        <p><?php echo $widget['content']; ?></p>
    </div>
</div>
<?php
}
?>