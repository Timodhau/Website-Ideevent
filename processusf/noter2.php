﻿<?php
session_start();
if(isset($_SESSION['client_id'])){
	include("../Include/connect_base.php");
	$requete=$base->query('SELECT p.psn_participer, p.psn_suivre, p.psn_noter FROM participer_suivre_noter p WHERE psn_client='.$_SESSION['client_id'].' AND psn_event='.$_SESSION['event'].'');
	if($donnee=$requete->fetch()){
		$base->exec('UPDATE participer_suivre_noter SET psn_noter=2 WHERE psn_client='.$_SESSION['client_id'].' AND psn_event='.$_SESSION['event'].'');
		header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'');}
	else{$base->exec('INSERT INTO participer_suivre_noter(psn_client, psn_event, psn_noter) VALUES('.$_SESSION['client_id'].','.$_SESSION['event'].',2)');
			header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'');};}
else{$_SESSION['error']="Vous devez vous identifier pour pouvoir noter un évènement.";
	header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'&error=1');};
?>