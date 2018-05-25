<?php

session_start();

$idevent=$_GET['event'];
include("Include/connect_base.php");
$requete=$base->prepare('SELECT c.ce_categorie FROM categorie_event c WHERE ce_event=?');
$requete->execute(array($idevent));
$donnee=$requete->fetch();
$categorie=$donnee['ce_categorie'];
while($donnee=$requete->fetch()){
	$categorie=$categorie.', '.$donnee['ce_categorie'];
};
?>

<?php 
include("Include/connect_base.php");
$requete=$base->prepare('SELECT e.event_id, e.event_titre, e.event_description, e.event_datedebut, e.event_datefin, e.event_tarifmin, e.event_tarifmax, e.event_nomlieu, e.event_norue, e.event_rue, e.event_ville, e.event_cp, e.event_maxpart, e.event_lien, e.event_sponsor, c.client_pseudo FROM event AS e LEFT JOIN client AS c ON e.event_createur=c.client_id WHERE event_id=? GROUP BY e.event_id');
$requete->execute(array($idevent));
$donnee=$requete->fetch();
$requete3=$base->query('SELECT SUM(p.psn_participer) AS somme FROM participer_suivre_noter p WHERE psn_event='.$idevent.'');
$donnee3=$requete3->fetch();
$restant=$donnee['event_maxpart']-$donnee3['somme'];
?>

<?php
$_SESSION['event']=$idevent;
$participation='Participer';
$suivi='Suivre cet évènement';
$note='Noter cet évènement';
if(isset($_SESSION['client_id'])){
	$requete2=$base->query('SELECT p.psn_participer, p.psn_suivre, p.psn_noter FROM participer_suivre_noter p WHERE psn_client='.$_SESSION['client_id'].' AND psn_event='.$idevent.'');
	if($donnee2=$requete2->fetch()){
		if($donnee2['psn_participer']==1){$participation='Ne plus participer';};
		if($donnee2['psn_suivre']==1){$suivi='Ne plus suivre';};
		if(isset($donnee2['psn_noter'])){$note='Noté '.$donnee2['psn_noter'].'/5';};};};
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title><?php echo "$donnee[event_titre]";?> - IDEEVENT</title>
	</head>
	<body>
 
		<!-- L'en-tête -->
    		<header>
        		<?php include("Include/titre.php"); ?>
		</header>
    
    		<!-- La connection -->
    		<div id="connection">
   		</div>
    
    		<!-- Le menu -->
    		<nav id="menu">        
        		<?php include("Include/nav.php"); ?>
    		</nav>
        
            <!-- barre de recherche -->
            <div id="recherche">
                <?php include("Include/recherche.php"); ?>
            </div>
			<?php if(isset($_GET['error'])){if($_GET['error']==1){echo "<div id=\"error\">$_SESSION[error]</div>";}}?>

			<?php
			$requeten=$base->query('SELECT AVG(psn_noter) AS moyenne FROM participer_suivre_noter WHERE psn_event='.$_SESSION['event'].'');
			$donneen=$requeten->fetch();

			$moyenne=$donneen['moyenne'];

						$moyenne_arrondie=round($moyenne*2)/2;
							switch ($moyenne_arrondie) {
									case 1:
										$posnote="pos1";
										break;

									case 1.5:
										$posnote="pos1_5";
										break;

									case 2:
										$posnote="pos2";
										break;

									case 2.5:
										$posnote="pos2_5";
										break;

									case 3:
										$posnote="pos3";
										break;

									case 3.5:
										$posnote="pos3_5";
										break;

									case 4:
										$posnote="pos4";
										break;

									case 4.5:
										$posnote="pos4_5";
										break;

									case 5:
										$posnote="pos5";
										break;

									default:
										$posnote="pos0";
										break;
									}
									?>
    		<!-- Le corps -->

    		<section>				
				<div id="develop"><br/><br/><br/><br/>
					<h2 id="titre_event"><?php echo "$donnee[event_titre] "; ?></h2>
					<?php echo "<div id=\"posnote\"class=\"$posnote\"></div>";?><br/><br/><br/>
					<div id="description_event">
						<img src="IE/<?php echo "$idevent";?>.jpg" alt="Image évènement"/>
						<u>Description</u> : <br/><br/><?php echo "$donnee[event_description]"?></div>
						<br/><br/>
						<!-- Partie informations {BDD 15x} -->
					<div id="info_event">
						<u>Date</u>: <?php  echo "du $donnee[event_datedebut] au $donnee[event_datefin]"?><br/>
						<u>Adresse</u> : <?php echo "$donnee[event_nomlieu], $donnee[event_norue] $donnee[event_rue], $donnee[event_cp] $donnee[event_ville]"?><br/>
						<u>Tarif</u> : <?php echo "entre $donnee[event_tarifmin] et $donnee[event_tarifmax] euros"?> <br/>
						<u>Participants max</u> : <?php echo "$donnee[event_maxpart] Personnes"?><br/>
						<u>Participant(s) déclaré(s)</u> : <?php echo "$donnee3[somme] participant(s)"?><br/>
						<u>Place(s) restante(s)</u> : <?php echo "$restant"?><br/>
						<u>Sponsors</u> : <?php echo "$donnee[event_sponsor]"?></br>
						<u>Public ciblé</u> : <?php include("processusf/extrairetrage.php");echo "$tra";?><br/>
					</div><br/>

						<!-- Photo & liens (informations complÃ©mentaires) {BDD 2x} -->

					<div id="annexe_event">Voici les photos concernant cet évènement: <br> <!-- BDD! -->
						Pour en savoir plus, accéder directement <a href="siteC.php"><?php echo "$donnee[event_lien]"?></a><br>
						Cet évènement a été proposé par <i><?php echo "$donnee[client_pseudo]"?>.</i><br>
					</div>
				</div><br/>
				<div>
					<div id="psn_event">
						<a href="processusf/participer.php" id="participer"><?php echo "$participation";?></a>
						<a href="processusf/suivre.php" id="suivre"><?php echo "$suivi";?></a>
						<a class="note_etoile" href="processusf/noter5.php" title="Très bien">&#10004</a>
						<a class="note_etoile" href="processusf/noter4.php" title="Bien">&#10004</a>
						<a class="note_etoile" href="processusf/noter3.php" title="Assez bien">&#10004</a>
 						<a class="note_etoile" href="processusf/noter2.php" title="Moyen">&#10004</a>
						<a class="note_etoile" href="processusf/noter1.php" title="Pas terrible">&#10004</a>
					</div>
				</div>
					<a id="signaler_event" href="processusf/signaler_event.php?id=<?php echo $idevent;?>">Signaler</a>
				</div>
			</section>   
    
    		<!-- Le pied de page -->
		<footer>
        	<?php include("Include/footer.php");?>
    	</footer>
    	
	</body>
</html>