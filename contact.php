<?php 
session_start();
include 'inc/config.php';
include 'inc/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact | <?php echo "".$site_name." | ";echo $slogan; ?></title>

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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Contact</h4>
                    </div>
                    <div class="panel-body">
<?php
/*
    ********************************************************************************************
    CONFIGURATION
    ********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'moi@fournisseur.tld';
 
// copie ? (envoie une copie au visiteur)
$copie = 'oui';
 
// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = '';
 
// Messages de confirmation du mail
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
 
// Message d'erreur du formulaire
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";
 
/*
    ********************************************************************************************
    FIN DE LA CONFIGURATION
    ********************************************************************************************
*/
 
/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function Rec($text)
{
    $text = htmlspecialchars(trim($text), ENT_QUOTES);
    if (1 === get_magic_quotes_gpc())
    {
        $text = stripslashes($text);
    }
 
    $text = nl2br($text);
    return $text;
};
 
/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function IsEmail($email)
{
    $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
    return (($value === 0) || ($value === false)) ? false : true;
}
if (login()) {
    $req_data_contact = $pdo->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
    $req_data_contact->execute(array(
        'pseudo' => $_SESSION['pseudo']
        ));
    $data_contact = $req_data_contact->fetch();
    $nom = $_SESSION['pseudo'];
    $email = $data_contact['mail'];
} else {
    $nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
    $email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
}
// formulaire envoyé, on récupère tous les champs.

$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
 
// On va vérifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin
 
if (isset($_POST['envoi']))
{
    if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
    {
        // les 4 variables sont remplies, on génère puis envoie le mail
        $headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
        //$headers .= 'Reply-To: '.$email. "\r\n" ;
        //$headers .= 'X-Mailer:PHP/'.phpversion();
 
        // envoyer une copie au visiteur ?
        if ($copie == 'oui')
        {
            $cible = $destinataire.','.$email;
        }
        else
        {
            $cible = $destinataire;
        };
 
        // Remplacement de certains caractères spéciaux
        $message = str_replace("&#039;","'",$message);
        $message = str_replace("&#8217;","'",$message);
        $message = str_replace("&quot;",'"',$message);
        $message = str_replace('&lt;br&gt;','',$message);
        $message = str_replace('&lt;br /&gt;','',$message);
        $message = str_replace("&lt;","&lt;",$message);
        $message = str_replace("&gt;","&gt;",$message);
        $message = str_replace("&amp;","&",$message);
 
        // Envoi du mail
        if (mail($cible, $objet, $message, $headers))
        {
            echo '<p>'.$message_envoye.'</p>';
        }
        else
        {
            echo '<p>'.$message_non_envoye.'</p>';
        };
    }
    else
    {
        // une des 3 variables (ou plus) est vide ...
        echo '<p>'.$message_formulaire_invalide.'</p>';
        $err_formulaire = true;
    };
}; // fin du if (!isset($_POST['envoi']))
 
if (($err_formulaire) || (!isset($_POST['envoi'])))
{ ?>
<form id="contact" method="post">
<?php
if (!login()) {

?>
    <div class="row">
        <div class="col-sm-5 col-md-6">
            <input type="text" placeholder="Pseudo" id="pseudo" name="pseudo" tabindex="1" class="form-control" />
        </div>
        <div class="col-sm-5 col-md-6">
            <input type="text" placeholder="Email" id="email" name="email" tabindex="2" class="form-control" /><br>
        </div>
    </div>
<?php } ?>
        <div>
            <input type="text" placeholder="Sujet" id="objet" name="objet" tabindex="3" class="form-control" />
        </div>
    <br>
    <div class="row">
        <div style="margin-left:2%;margin-right:2%;">
        <textarea id="message" name="message" tabindex="4" rows="8" class="form-control"></textarea>
        </div>
    </div><br>
    <div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer" class="btn btn-primary" /></div>
</form><?php
}
?>
                    </div>
                </div>
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

</body>

</html>
