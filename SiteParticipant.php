<?php
session_start();
include("Include/connect_base.php");
$requete=$base->query('SELECT e.event_id, e.event_titre, e.event_description, e.event_datedebut, SUM(a.psn_participer) AS somme FROM event e INNER JOIN participer_suivre_noter a ON e.event_id=a.psn_event GROUP BY e.event_id ORDER BY somme DESC');
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
		<title>Par participation - IDEEVENT</title>
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
				
				<div id="participant">
					<?php 
					include("Include/connect_base.php");
					$requete=$base->query("SELECT e.event_id, e.event_titre, e.event_description, e.event_datedebut, SUM(a.psn_participer) AS somme FROM event e INNER JOIN participer_suivre_noter a ON e.event_id=a.psn_event GROUP BY e.event_id ORDER BY somme DESC LIMIT $dbe,4");
					while($donnee=$requete->fetch())
					{	
					echo	 
					"<br/>
					<a href=\"SiteEvenement.php?event=$donnee[event_id]\">
						<div id=\"evenement\">
							<p id=\"titre\">$donnee[somme] participant - $donnee[event_titre]</p><br/>
							<p id=\"description\"><img src=\"IE/$donnee[event_id].jpg\" alt=\"Image d'évènement\"/>$donnee[event_description]</p>
							<p id=\"dateheure\">$donnee[event_datedebut]</p>
						</div>
					</a>
					<br/>";
					}
					?>
				</div>
				<div id="pagination">
					<?php
					for($pas=1;$pas<=$nbpage;$pas++)
						{echo " <a href=\"SiteParticipant.php?page=$pas\">Page $pas</a> ";}
					?>
				</div><br/>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>