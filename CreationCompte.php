<?php 
session_start();

$nom=htmlspecialchars($_POST['membre_nom']);
$prenom=htmlspecialchars($_POST['membre_prenom']);
$date=htmlspecialchars($_POST['membre_naissance']);
$ville=htmlspecialchars($_POST['membre_adresse_ville']);
$cp=htmlspecialchars($_POST['membre_adresse_cp']);
$pseudo=htmlspecialchars($_POST['membre_pseudo']);
$mail=htmlspecialchars($_POST['membre_mail']);
$mailc=htmlspecialchars($_POST['membre_mail_confirm']);
$mdp=htmlspecialchars($_POST['membre_mdp']);
$mdpc=htmlspecialchars($_POST['membre_mdp_confirm']);

if(strlen($nom)>30){echo "Nom incorrect ou trop long";break;};
if(strlen($prenom)>30){echo "Prenom incorrect ou trop long";break;};

include("Include/connect_base.php");
$requete=$base->prepare('INSERT INTO client (client_sexe,client_nom,client_prenom,client_naissance,client_ville,client_cp,client_pseudo,client_mail,client_mdp) VALUES (:sexe,:nom,:prenom,:date,:ville,:cp,:pseudo,:mail,:mdp)');
$requete->execute(array('sexe'=>$_POST['membre_sexe'],'nom'=>$nom,'prenom'=>$prenom,'date'=>$date,'ville'=>$ville,'cp'=>$cp,'pseudo'=>$pseudo,'mail'=>$mail,'mdp'=>$mdp));

$id=$base->LastInsertId();

if(isset($_POST['membre_type1'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'Sport'));};

if(isset($_POST['membre_type2'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'Culture'));};

if(isset($_POST['membre_type3'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'Musique'));};

if(isset($_POST['membre_type4'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'Nature'));};
	
if(isset($_POST['membre_type5'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'Social'));};	
	
if(isset($_POST['membre_type6'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'Soirée'));};	
	
if(isset($_POST['membre_type7'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'Politique'));};

$key=md5(uniqid(rand(), true));

include("Include/connect_base.php");
$requete=$base->prepare('UPDATE client SET client_ckey=? WHERE client_id=?');
$requete->execute(array($key, $id));
	

$sujet='Activer votre compte IdeEvent';
$from='equipe.idev@ideevent.fr';
$message="Bonjour, Vous venez de vous inscrire sur notre site IdeEvent, pour procéder à l'activation de votre compte veuillez cliquer sur  le lien ci-dessous : http://localhost/20012016/SiteConfirmation.php?id=$id&key=$key. Ceci est un message automatique, merci de ne pas y répondre !";

if(mail($mail,$sujet,$message,$from)){$affichage='Un mail de confirmation vous a été envoyé, suivez les instructions y figurant !';}
else{$affichage='Un problème est survenue lors de l\'envoi d\'un mail de confirmation. Veuillez réessayer ultérieurement !';};

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Accueil - IDEEVENT</title>
	</head>
	<body>
 
		<!-- L'en-t?te -->
    		<header>
        		<?php include("Include/titre.php"); ?>
		</header>
    
    		<!-- La connection -->
    		<div id="connection">
   		</div>
    
    		<!-- Le menu -->
    		<nav id="menu">        
        		<?php include("Include/nav.php"); ?>
    		</nav>
    
    		<!-- Le corps -->
    		<section>
			<div id="confirmationinscription">
				<br/><br/><br/><br/><br/><br/><br/>
				<?php echo "$affichage";?>
			</div>	
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>