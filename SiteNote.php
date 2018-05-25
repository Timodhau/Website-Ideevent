<?php
session_start();
include("Include/connect_base.php");
$requete=$base->query('SELECT e.event_id, e.event_titre, e.event_description, e.event_datedebut, AVG(a.psn_noter) AS moyenne FROM event e INNER JOIN participer_suivre_noter a ON e.event_id=a.psn_event GROUP BY e.event_id ORDER BY moyenne DESC');
$nbentree=0;
while($donnee=$requete->fetch())
	{$nbentree++;};
$nbpage=floor($nbentree/4);
if($nbentree%4!=0)
	{$nbpage=floor($nbentree/4)+1;}
else{$nbpage=floor($nbentree/4);};
if(isset($_GET['page']))
	{$dbe=$_GET['page']*4-4;}
else{$dbe=0;};
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Par note - IDEEVENT</title>
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

    
    		<!-- Le corps -->
    		<section>
				
				<div id="note">
					<?php 
					include("Include/connect_base.php");
					$requete=$base->query("SELECT e.event_id, e.event_titre, e.event_description, e.event_datedebut, AVG(a.psn_noter) AS moyenne FROM event e INNER JOIN participer_suivre_noter a ON e.event_id=a.psn_event GROUP BY e.event_id ORDER BY moyenne DESC LIMIT $dbe,4");
					while($donnee=$requete->fetch()
						and $affichage==1)
					{
						$moyenne=$donnee['moyenne'];

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
					echo	 
					"<br/>
					<a href=\"SiteEvenement.php?event=$donnee[event_id]\">
						<div id=\"evenement\">
							<div id=\"titre\">$donnee[event_titre]</div>
							<div id=\"posnote\"class=\"$posnote\"></div>
							<p id=\"description\"><img src=\"IE/$donnee[event_id].jpg\" alt=\"Image d'évènement\"/>$donnee[event_description]</p>
							<p id=\"dateheure\">$donnee[event_datedebut]</p>
						</div>
					</a>
					<br/>"
					;
					}
					?>
				</div>
				<div id="pagination">
					<?php
					for($pas=1;$pas<=$nbpage;$pas++)
						{echo " <a href=\"SiteNote.php?page=$pas\">Page $pas</a> ";}
					?>
				</div><br/>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>