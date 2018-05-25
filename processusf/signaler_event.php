<?php
session_start();
include("../Include/connect_base.php");
$requete=$base->query('SELECT event_signalement FROM event WHERE event_id='.$_GET['id'].'');
$donnee=$requete->fetch();
$donnee['event_signalement']=$donnee['event_signalement']+1;
echo $donnee['event_signalement'];
$requete=$base->query('UPDATE event SET event_signalement='.$donnee['event_signalement'].' WHERE event_id='.$_GET['id'].'');
header('Location: ../SiteEvenement.php?event='.$_GET['id'].'')
?>