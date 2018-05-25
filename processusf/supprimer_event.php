<?php
session_start();
$id_event=$_GET['id'];
include("../Include/connect_base.php");
$requete=$base->query('DELETE FROM event WHERE event_id='.$id_event.'');
header('Location: ../SiteAdministrer.php');
?>