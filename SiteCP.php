<?php
session_start();
$idclient=$_SESSION['client_id'];
include("Include/connect_base.php");
$requete=$base->query('SELECT p.psn_event, e.event_titre, e.event_datedebut, e.event_description FROM participer_suivre_noter p LEFT JOIN event e ON e.event_id=p.psn_event WHERE p.psn_client='.$idclient.' AND p.psn_participer=1 ORDER BY event_datedebut ASC');
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
		<meta charset="latin1"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Accueil - IDEEVENT</title>
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
				
				<div id="accueil">
					<?php 
					include("Include/connect_base.php");
					$requete=$base->query("SELECT p.psn_event, e.event_titre, e.event_datedebut, e.event_description FROM participer_suivre_noter p LEFT JOIN event e ON e.event_id=p.psn_event WHERE p.psn_client=$idclient AND p.psn_participer=1 ORDER BY event_datedebut LIMIT $dbe,4");
					

					while($donnee=$requete->fetch()
						and $affichage==1)
					{	
					echo	 
					"<a href=\"SiteEvenement.php?event=$donnee[psn_event]\">
						<div id=\"evenement\">
							<p id=\"titre\">$donnee[event_titre]</p><br/>
							<p id=\"description\"><img src=\"IE/$donnee[psn_event].jpg\" alt=\"Image d'évènement\"/>$donnee[event_description]</p>
							<p id=\"dateheure\">$donnee[event_datedebut]</p>
						</div>
					</a>";
					}



					?>
				</div>
				<div id="pagination">
					<?php
					for($pas=1;$pas<=$nbpage;$pas++)
						{echo " <a href=\"SiteCP.php?page=$pas\">Page $pas</a> ";}
					?>
				</div><br/>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>