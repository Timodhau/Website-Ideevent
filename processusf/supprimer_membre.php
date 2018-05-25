<?php
session_start();
include("../Include/connect_base.php");
$requete=$base->prepare('SELECT client_id, client_nom, client_prenom, client_pseudo, client_mail, client_mdp, client_sexe, client_active, client_moderateur FROM client WHERE client_pseudo=?');
$requete->execute(array($_POST['identifiant']));
if($donnee=$requete->fetch() and $_POST['identifiant']==$donnee['client_pseudo']){
	$requete=$base->query('DELETE FROM client WHERE client_pseudo=\''.$_POST['identifiant'].'\'');
	$_SESSION['messageadmin']='Le compte associé à ce membre a été supprimé !';}
else{$_SESSION['messageadmin']='Aucun membre portant ce pseudo existe !';}
header('Location: ../SiteAdminMembre.php');
?>