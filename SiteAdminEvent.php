<?php
session_start();
include("Include/connect_base.php");
$requete=$base->query('SELECT e.event_id, e.event_titre, e.event_description, e.event_datedebut, e.event_signalement FROM event e WHERE event_signalement ORDER BY event_signalement!=0 DESC');
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
		<title>Evènements signalés - IDEEVENT</title>
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
				<div id="erreurauthentification"></div>
				<div id="accueil">
					<?php 
					if(isset($_SESSION['client_moderateur']) and $_SESSION['client_moderateur']==1){
					include("Include/connect_base.php");
					$requete=$base->query("SELECT e.event_id, e.event_titre, e.event_description, e.event_datedebut, e.event_signalement FROM event e WHERE event_signalement!=0 ORDER BY event_signalement DESC LIMIT $dbe,4");

					while($donnee=$requete->fetch()
						and $affichage==1)
					{
					echo	 
					"<a href=\"SiteEvenement.php?event=$donnee[event_id]\">
						<div id=\"evenement\">
							<div id=\"titre\">$donnee[event_titre]</div>
							<p id=\"description\"><img src=\"IE/$donnee[event_id].jpg\" alt=\"Image d'évènement\"/>$donnee[event_description]</p>
							<p id=\"dateheure\">$donnee[event_datedebut]</p>
						</div>
					</a>
					<a id=\"supprimer_event\" href=\"processusf/supprimer_event.php?id=$donnee[event_id]\">Supprimer l'&#233v&#233nement '".$donnee['event_titre']."'</a>";
					};}
					else{echo "<br/><br/><div id=\"pasadmin\">Nous sommes désolé, vous ne faites pas partie du cercle des administrateurs du site !</div>";}
					?>
				</div>
				<br/>
				<div id="pagination">
					<?php
					for($pas=1;$pas<=$nbpage;$pas++)
						{echo " <a href=\"SiteC.php?page=$pas\">Page $pas</a> ";}
					?>
				</div><br/>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>