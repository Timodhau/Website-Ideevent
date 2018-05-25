<?php


$question=strip_tags($_POST['question']);
$reponse=strip_tags($_POST['reponse']);


include("../Include/connect_base.php");

if (isset($question) && isset($reponse)) {
	$requete=$base->prepare('INSERT INTO faq (faq_question,faq_reponse) VALUES (:quest,:rep)');
	$requete->execute(array('quest'=>$question, 'rep'=>$reponse));};
header('Location: ../SiteAdministrer.php');
?>