<?php
session_start();
$_SESSION['errorce']='';

$errorce='';
$titre=ucfirst(htmlspecialchars($_POST[event_titre]));
$description=ucfirst(htmlspecialchars($_POST[event_description]));
$nomlieu=ucfirst(htmlspecialchars($_POST[event_nomlieu]));
$numad=htmlspecialchars($_POST[event_numad]);
$rue=ucfirst(htmlspecialchars($_POST[event_rue]));
$ville=ucfirst(htmlspecialchars($_POST[event_ville]));
$cp=intval(htmlspecialchars($_POST[event_cpostal]));
$n=$cp/10000;
$sponsor=ucfirst(htmlspecialchars($_POST[event_sponsor]));
$lien=ucfirst(htmlspecialchars($_POST[event_lien]));
$dannee=htmlspecialchars($_POST[debutannee]);
$dmois=htmlspecialchars($_POST[debutmois]);
$djour=htmlspecialchars($_POST[debutjour]);
$dheure=htmlspecialchars($_POST[debutheure]);
$dmin=htmlspecialchars($_POST[debutmin]);
$fannee=htmlspecialchars($_POST[finannee]);
$fmois=htmlspecialchars($_POST[finmois]);
$fjour=htmlspecialchars($_POST[finjour]);
$fheure=htmlspecialchars($_POST[finheure]);
$fmin=htmlspecialchars($_POST[finmin]);
$tmin=htmlspecialchars($_POST[event_tmin]);
$tmax=htmlspecialchars($_POST[event_tmax]);
$max=htmlspecialchars($_POST[event_nbrmaxparticipant]);
$debut=date_create("$dannee-$dmois-$djour $dheure:$dmin")->format("Y-m-d h:i");
$fin=date_create("$fannee-$fmois-$fjour $fheure:$fmin")->format("Y-m-d h:i");

if(strlen($titre)>60){$errorce='Entrez un titre valide';};
if(strlen($description)>5000){$errorce='Entrez une description valide';};
if(strlen($nomlieu)>60){$errorce='Entrez un nom de lieu valide';};
if(strlen($rue)>60){$errorce='Entrez un nom de rue valide';};
if(strlen($ville>60)){$errorce='Entrez une ville valide';};
if($n>=10 or $n<0.1){$errorce='Entrez un code postal valide';};
if(!checkdate($dmois,$djour,$dannee)){$errorce='Entrez une date de début valide';};
if(!checkdate($fmois,$fjour,$fannee)){$errorce='Entrez une date de fin valide';};
if($debut>$fin){$errorce='Entrez une date de fin ultérieure à la date de début';};
if($tmin>$tmax){$errorce='Entrez un tarif maximum supérieur ou égal au tarif minimum';};
if($max<1){$errorce='Entrez un nombre de place valide';};
if(!isset($_POST['event_type1']) and !isset($_POST['event_type2']) and !isset($_POST['event_type3']) and !isset($_POST['event_type4']) and !isset($_POST['event_type5']) and !isset($_POST['event_type6']) and !isset($_POST['event_type7'])){$errorce='Choissisez au moins une catégorie pour votre évènement';};
if(!isset($_POST['event_tr_age1']) and !isset($_POST['event_tr_age2']) and !isset($_POST['event_tr_age3']) and !isset($_POST['event_tr_age4']) and !isset($_POST['event_tr_age5'])){$errorce='Choissisez au moins une tranche d\'âge pour votre évènement';};

if($errorce==''){include("../Include/connect_base.php");
													$requete=$base->prepare('INSERT INTO event (event_titre, event_createur, event_description, event_datedebut, event_datefin, event_tarifmin, event_tarifmax, event_nomlieu, event_norue, event_rue, event_ville, event_cp, event_maxpart, event_lien, event_sponsor, event_datecreation)
														VALUES (:titre, :createur, :description, :debut, :fin, :tmin, :tmax, :nomlieu, :norue, :rue, :ville, :cp, :maxpart, :lien ,:sponsor ,:datecreation)');
													$requete->execute(array('titre'=>$titre,'createur'=>$_SESSION['client_id'],'description'=>$description,'debut'=>$debut,'fin'=>$fin,'tmin'=>$tmin,'tmax'=>$tmax,'nomlieu'=>$nomlieu,'norue'=>$numad,'rue'=>$rue,'ville'=>$ville,'cp'=>$cp,'maxpart'=>$max,'lien'=>$lien,'sponsor'=>$sponsor, 'datecreation'=>date("Y-m-d")));
													
													$id_event=$base->lastInsertId();
													
													if(isset($_POST['event_type1'])){
														$requete1=$base->prepare('INSERT INTO categorie_event (ce_event, ce_categorie) VALUES (:idevent, :categorie)');
														$requete1->execute(array('idevent'=>$id_event,'categorie'=>'Sport'));};
														
													if(isset($_POST['event_type2'])){
														$requete1=$base->prepare('INSERT INTO categorie_event (ce_event, ce_categorie) VALUES (:idevent, :categorie)');
														$requete1->execute(array('idevent'=>$id_event,'categorie'=>'Culture'));};
													
													if(isset($_POST['event_type3'])){
														$requete1=$base->prepare('INSERT INTO categorie_event (ce_event, ce_categorie) VALUES (:idevent, :categorie)');
														$requete1->execute(array('idevent'=>$id_event,'categorie'=>'Musique'));};
													
													if(isset($_POST['event_type4'])){
														$requete1=$base->prepare('INSERT INTO categorie_event (ce_event, ce_categorie) VALUES (:idevent, :categorie)');
														$requete1->execute(array('idevent'=>$id_event,'categorie'=>'Nature'));};
													
													if(isset($_POST['event_type5'])){
														$requete1=$base->prepare('INSERT INTO categorie_event (ce_event, ce_categorie) VALUES (:idevent, :categorie)');
														$requete1->execute(array('idevent'=>$id_event,'categorie'=>'Social'));};
													
													if(isset($_POST['event_type6'])){
														$requete1=$base->prepare('INSERT INTO categorie_event (ce_event, ce_categorie) VALUES (:idevent, :categorie)');
														$requete1->execute(array('idevent'=>$id_event,'categorie'=>'Soirée'));};
															
													if(isset($_POST['event_type7'])){
														$requete1=$base->prepare('INSERT INTO categorie_event (ce_event, ce_categorie) VALUES (:idevent, :categorie)');
														$requete1->execute(array('idevent'=>$id_event,'categorie'=>'Cérémonie'));};													
													
													if(isset($_POST['event_tr_age1'])){
														$requete1=$base->prepare('INSERT INTO event_age (ea_event, ea_age) VALUES (:idevent, :age)');
														$requete1->execute(array('idevent'=>$id_event,'age'=>'3-5'));};
													
													if(isset($_POST['event_tr_age2'])){
														$requete1=$base->prepare('INSERT INTO event_age (ea_event, ea_age) VALUES (:idevent, :age)');
														$requete1->execute(array('idevent'=>$id_event,'age'=>'6-9'));};
															
													if(isset($_POST['event_tr_age3'])){
														$requete1=$base->prepare('INSERT INTO event_age (ea_event, ea_age) VALUES (:idevent, :age)');
														$requete1->execute(array('idevent'=>$id_event,'age'=>'10-14'));};
														
													if(isset($_POST['event_tr_age4'])){
														$requete1=$base->prepare('INSERT INTO event_age (ea_event, ea_age) VALUES (:idevent, :age)');
														$requete1->execute(array('idevent'=>$id_event,'age'=>'15-17'));};
														
													if(isset($_POST['event_tr_age5'])){
														$requete1=$base->prepare('INSERT INTO event_age (ea_event, ea_age) VALUES (:idevent, :age)');
														$requete1->execute(array('idevent'=>$id_event,'age'=>'18+'));};
													
													
													$_SESSION['errorce']='Votre évènement a bien été ajouté !';
													header('Location: ../SiteFormulaireEvent.php');}
														
else{$_SESSION['errorce']=$errorce;
header('Location : ../SiteFormulaireEvent.php');};
?>
