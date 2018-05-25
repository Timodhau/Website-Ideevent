<?php
$tra='';
include("Include/connect_base.php");
$requete4=$base->query('SELECT ea_age FROM event_age WHERE ea_event='.$idevent.'');
$donnee4=$requete4->fetch();
$tra=$donnee4['ea_age'];
while($donnee4=$requete4->fetch()){$tra=$tra.', '.$donnee4['ea_age'];};
?>