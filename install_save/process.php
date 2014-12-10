<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Installation automatisée : 2nde étape</title>
<style type="text/css">
body {
font-family:Tahoma, Arial, Serif;
font-size:14px;
}
.note {
font-size:1.1em;
font-style:italic;
}
.ok {
color:green;
font-weight:bold;
}
.echec {
color:red;
font-weight:bold;
}
</style>
</head>
<body>
<p>
<?php
if(isset($_POST['etape']) AND $_POST['etape'] == 1) { // si nous venons du formulaire alors

// on crée des constantes dont on se servira plus tard
define('RETOUR', '<br /><br /><input type="button" value="Retour" onclick="history.back()">');
define('OK', '<span class="ok">OK</span><br />');
define('ECHEC', '<span class="echec">ECHEC</span>');

$fichier = '../inc/config.php';
if(file_exists($fichier) AND filesize($fichier ) > 0) { // si le fichier existe et qu'il n'est pas vide alors
exit('Fichier de configuration déjà existant. Installation interrompue.'. RETOUR);
}   

// on crée nos variables, et au passage on retire les éventuels espaces 
$hote = trim($_POST['hote']);
$login = trim($_POST['login']);
$mdp = trim($_POST['mdp']);
$base = trim($_POST['base']);
$site_name_post = trim($_POST['site_name']);
$slogan_post = trim($_POST['slogan']);
$desc_name_post = trim($_POST['desc']);
$url_name_post = trim($_POST['url']);

// on vérifie la connectivité avec le serveur avant d'aller plus loin
if(!@mysql_connect($hote, $login, $mdp)) {
exit('Mauvais paramètres de connexion.'. RETOUR);
}

// on vérifie la connectivité avec la base avant d'aller plus loin  
if(!@mysql_select_db($base)) {
exit('Mauvais nom de base.'. RETOUR);
}   

// le texte que l'on va mettre dans le config.php
$texte = '<?php
/* ----------------------------------------------- */
/* ----------------- Info du site ---------------- */
/* ----------------------------------------------- */

$site_name = "'. $site_name_post .'";
$slogan = "'. $slogan_post .'";
$desc = "'. $desc_name_post .'";
$url = "'. $url_name_post .'";
$charset = "utf-8";
$favicon = "img/favicon.png";
$lang = "FR";
$op = "Admin";
$creator = "DareK";
$mail = "sevendarek@gmail.com";

/* ----------------------------------------------- */
/* ---------------- Date et heure ---------------- */
/* ----------------------------------------------- */

date_default_timezone_set("Europe/Paris");
$date = date("d/m/Y");
$annee = date("Y");
$heure = date("H:i:s");

/* ----------------------------------------------- */
/* ------- Connexion a la base de donnée --------- */
/* ----------------------------------------------- */


$hote   = "'. $hote .'";
$login  = "'. $login .'";
$mdp    = "'. $mdp .'";
$base   = "'. $base .'";


$dbb = new mysqli($hote,$login,$mdp,$base); 

$pdo = new PDO("mysql:host=".$hote.";dbname=".$base.";charset=utf8", $login, $mdp);
?>';

// on vérifie s'il est possible d'ouvrir le fichier
if(!$ouvrir = fopen($fichier, 'w')) {
exit('Impossible d\'ouvrir le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);
}

// s'il est possible d'écrire dans le fichier alors on ne se gêne pas
if(fwrite($ouvrir, $texte) == FALSE) {
exit('Impossible d\'écrire dans le fichier : <strong>'. $fichier .'</strong>.'. RETOUR);
}

// tout s'est bien passé
echo 'Fichier de configuration : '. OK;
fclose($ouvrir); // on ferme le fichier
    

$requetes = ''; // on crée une variable vide car on va s'en servir après
 
$sql = file('./base.sql'); // on charge le fichier SQL qui contient des requêtes
foreach($sql as $lecture) { // on le lit
    if(substr(trim($lecture), 0, 2) != '--') { // suppression des commentaires et des espaces
    $requetes .= $lecture; // nous avons nos requêtes dans la variable
    }
}
 
$reqs = @split(';', $requetes); // on sépare les requêtes
foreach($reqs as $req){ // et on les exécute
    if(!@mysql_query($req) AND trim($req) != '') { // si la requête fonctionne bien et qu'elle n'est pas vide
        exit('ERREUR : '. $req); // message d'erreur
    }
}
echo 'Installation : '. OK; 
echo '<br /><span class="note">Note : si le site est en ligne, veuillez supprimer le répertoire <strong>/install</strong> du ftp.</span>';

} // si on passe sur ce fichier sans être passé par la première étape alors on redirige
else
exit('Vous devez d\'abord être passé par <a href="./index.php">le formulaire</a>.');    
?>
</p>
</body>
</html>