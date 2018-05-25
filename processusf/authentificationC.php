<?php
session_start();
$_SESSION['errorauth']='';
if(strstr($_POST['identifiant'],'@'))
	{include("../Include/connect_base.php");
	$requete=$base->prepare('SELECT client_id, client_nom, client_prenom, client_pseudo, client_mail, client_mdp, client_sexe, client_active, client_moderateur FROM client WHERE client_mail=?');
	$requete->execute(array($_POST['identifiant']));
	if($donnee=$requete->fetch() and $_POST['identifiant']==$donnee['client_mail']){		
		if($donnee['client_active']==1){		
			if($_POST['mdp']==$donnee['client_mdp'])
				{$_SESSION['client_id']=$donnee['client_id'];
				$_SESSION['client_nom']=$donnee['client_nom'];
				$_SESSION['client_prenom']=$donnee['client_prenom'];
				$_SESSION['client_pseudo']=$donnee['client_pseudo'];
				$_SESSION['client_sexe']=$donnee['client_sexe'];
				$_SESSION['client_moderateur']=$donnee['client_moderateur'];}
			else{$_SESSION['errorauth']='Mot de passe incorrect';};			
			}
		else{$_SESSION['errorauth']='Votre compte n\'a pas encore été activé';};	
		}	
	else{$_SESSION['errorauth']='Mail incorrect';};}
else{include("../Include/connect_base.php");
	$requete=$base->prepare('SELECT client_id, client_nom, client_prenom, client_pseudo, client_mail, client_mdp, client_sexe, client_active, client_moderateur FROM client WHERE client_pseudo=?');
	$requete->execute(array($_POST['identifiant']));
	if($donnee=$requete->fetch() and $_POST['identifiant']==$donnee['client_pseudo']){
		if($donnee['client_active']==1){
			if($_POST['mdp']==$donnee['client_mdp'])
				{$_SESSION['client_id']=$donnee['client_id'];
				$_SESSION['client_nom']=$donnee['client_nom'];
				$_SESSION['client_prenom']=$donnee['client_prenom'];
				$_SESSION['client_pseudo']=$donnee['client_pseudo'];
				$_SESSION['client_sexe']=$donnee['client_sexe'];
				$_SESSION['client_moderateur']=$donnee['client_moderateur'];}
			else{$_SESSION['errorauth']='Mot de passe incorrect';};
			}
		else{$_SESSION['errorauth']='Votre compte n\'a pas encore été activé';};	
		}	
	else{$_SESSION['errorauth']='Pseudo incorrect';};};
header('Location: ../SiteContacter.php'); 
?>