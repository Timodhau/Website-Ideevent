<?php
session_start();
$_SESSION['messagemail']='';
$mail='equipe.idev@mail.fr';
$sujet=htmlspecialchars($_POST['sujet']);
$message=htmlspecialchars($_POST['message']);
$from=$_SESSION['client_mail'];
if(mail($mail, $sujet, $message, $from)){$_SESSION['messagemail']='Votre message a bien été envoyé. Nous ferons, notre possible pour traiter votre demande';}
else{$_SESSION['messagemail']='Une erreur est survenue, lors de l\'envoi, nous vous prions de nous excuser.';}
header('Location: ../SiteContacter.php');
?>
