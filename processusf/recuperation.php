<?php
session_start();

$_SESSION['errorrecup']='';
if(strstr($_POST['identifiant'],'@'))
	{include("../Include/connect_base.php");
	$requete=$base->prepare('SELECT client_mail, client_mdp FROM client WHERE client_mail=?');
	$requete->execute(array($_POST['identifiant']));
	if($donnee=$requete->fetch() and $_POST['identifiant']==$donnee['client_mail']){		
		mail($donnee['client_mail'],'Votre mot de passe IdeEvent','Cher(e) membre, Vous avez récemment demandé à ce que nous vous renvoyons votre mot de passe. Nous vous rappelons que le mot de passe du compte IdeEvent associé à ce mail est le suivant : '.$donnee['client_mdp'].'','equipe.idev@mail.fr');
		$_SESSION['errorrecup']='Un mail contenant votre mot de passe vous a été envoyé !';
		}	
	else{$_SESSION['errorrecup']='Mail incorrect';};}
else{include("../Include/connect_base.php");
	$requete=$base->prepare('SELECT client_mail, client_mdp, client_pseudo FROM client WHERE client_pseudo=?');
	$requete->execute(array($_POST['identifiant']));
	if($donnee=$requete->fetch() and $_POST['identifiant']==$donnee['client_pseudo']){
		mail($donnee['client_mail'],'Votre mot de passe IdeEvent','Cher(e) membre, Vous avez récemment demandé à ce que nous vous renvoyons votre mot de passe. Nous vous rappelons que le mot de passe du compte IdeEvent associé à ce mail est le suivant : '.$donnee['client_mdp'].'','equipe.idev@mail.fr');	
		$_SESSION['errorrecup']='Un mail contenant votre mot de passe vous a été envoyé !';
		}	
	else{$_SESSION['errorrecup']='Pseudo incorrect';};};
header('Location: ../SiteRecuperation.php');
?>