<?php
session_start();
if(isset($_SESSION['client_id'])){
	include("../Include/connect_base.php");
	$requete=$base->query('SELECT p.psn_participer, p.psn_suivre, p.psn_noter FROM participer_suivre_noter p WHERE psn_client='.$_SESSION['client_id'].' AND psn_event='.$_SESSION['event'].'');
	if($donnee=$requete->fetch()){
		if($donnee['psn_participer']==1){
			$base->exec('UPDATE participer_suivre_noter SET psn_participer=0 WHERE psn_client='.$_SESSION['client_id'].' AND psn_event='.$_SESSION['event'].'');
			header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'');
			}
		else{
			$requete2=$base->query('SELECT SUM(p.psn_participer) AS somme FROM participer_suivre_noter p WHERE psn_event='.$_SESSION['event'].'');
			if($donnee2=$requete2->fetch() and isset($donnee2['somme'])){
				$requete3=$base->query('SELECT event_maxpart AS part FROM event WHERE event_id='.$_SESSION['event'].'');
				$donnee3=$requete3->fetch();
				if($donnee2['somme']<$donnee3['part']){
					$base->exec('UPDATE participer_suivre_noter SET psn_participer=1 WHERE psn_client='.$_SESSION['client_id'].' AND psn_event='.$_SESSION['event'].'');
					header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'');
					}
				else{
					$_SESSION['error']="Nous sommes désolé, malheureusement il n'y a plus de place pour cet évènement !";
					header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'&error=1');
					};
				}
			else{
				$base->exec('UPDATE participer_suivre_noter SET psn_participer=1 WHERE psn_client='.$_SESSION['client_id'].' AND psn_event='.$_SESSION['event'].'');
				header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'');
				};
			};
		}
	else{
		$requete2=$base->query('SELECT SUM(p.psn_participer) AS somme FROM participer_suivre_noter p WHERE psn_event='.$_SESSION['event'].'');
		if($donnee2=$requete2->fetch() and isset($donnee2['somme'])){
			$requete3=$base->query('SELECT event_maxpart AS part FROM event WHERE event_id='.$_SESSION['event'].'');
			$donnee3=$requete3->fetch();
			if($donnee2['somme']<$donnee3['part']){
				$base->exec('INSERT INTO participer_suivre_noter(psn_client, psn_event, psn_participer) VALUES('.$_SESSION['client_id'].','.$_SESSION['event'].',1)');
				header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'');
				}
			else{
				$_SESSION['error']="Nous sommes désolé, malheureusement il n'y a plus de place pour cet évènement !";
				header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'&error=1');
				};
			}
		else{
			$base->exec('INSERT INTO participer_suivre_noter(psn_client, psn_event, psn_participer) VALUES('.$_SESSION['client_id'].','.$_SESSION['event'].',1)');
			header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'');
			};
		};
	}
else{
	$_SESSION['error']="Vous devez vous identifier pour vous déclarer participant à un évènement.";
	header('Location: ../SiteEvenement.php?event='.$_SESSION['event'].'&error=1');
	};
?>