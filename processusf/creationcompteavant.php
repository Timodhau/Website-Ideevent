<?php 
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

include("../Include/connect_base.php");
$requete=$base->prepare('INSERT INTO client (client_sexe,client_nom,client_prenom,client_naissance,client_ville,client_cp,client_pseudo,client_mail,client_mdp) VALUES (:sexe,:nom,:prenom,:date,:ville,:cp,:pseudo,:mail,:mdp)');
$requete->execute(array('sexe'=>$_POST['membre_sexe'],'nom'=>$nom,'prenom'=>$prenom,'date'=>$date,'ville'=>$ville,'cp'=>$cp,'pseudo'=>$pseudo,'mail'=>$mail,'mdp'=>$mdp));

$id=$base->LastInsertId();

if(isset($_POST['membre_type1'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'sport'));};

if(isset($_POST['membre_type2'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'culture'));};

if(isset($_POST['membre_type3'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'musique'));};

if(isset($_POST['membre_type4'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'nature'));};
	
if(isset($_POST['membre_type5'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'social'));};	
	
if(isset($_POST['membre_type6'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'soiree'));};	
	
if(isset($_POST['membre_type7'])){
	$requete=$base->prepare('INSERT INTO gout (gout_client,gout_categorie) VALUES (:client,:categorie)');
	$requete->execute(array('client'=>$id,'categorie'=>'ceremonie'));};	
	
?>