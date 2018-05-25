<?php
session_start();
include("Include/connect_base.php");
$requete=$base->prepare("SELECT e.event_id, e.event_titre, e.event_description, e.event_datedebut, c.ce_categorie FROM event e INNER JOIN categorie_event c ON e.event_id=c.ce_event WHERE ce_categorie=? ORDER BY e.event_datedebut DESC");
$requete->execute(array($_GET['categorie']));
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
		<title><?php echo "$_GET[categorie]";?> - IDEEVENT</title>
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
				
				<div id="cate">
					<?php 
					include("Include/connect_base.php");
					$requete=$base->prepare("SELECT e.event_id, e.event_titre, e.event_description, e.event_datedebut, c.ce_categorie FROM event e INNER JOIN categorie_event c ON e.event_id=c.ce_event WHERE ce_categorie=? ORDER BY e.event_datedebut DESC LIMIT $dbe,4");
					$requete->execute(array($_GET['categorie']));
					while($donnee=$requete->fetch())
					{	
					echo	 
					"<a href=\"SiteEvenement.php?event=$donnee[event_id]\">
						<div id=\"evenement\">
							<p id=\"titre\">($donnee[ce_categorie]) - $donnee[event_titre]</p><br/>
							<p id=\"description\"><img src=\"IE/$donnee[event_id].jpg\" alt=\"Image d'évènement\"/>$donnee[event_description]</p>
							<p id=\"dateheure\">$donnee[event_datedebut]</p>
						</div>
					</a>";
					}
					?>
				</div>
				<div id="pagination">
					<?php
					for($pas=1;$pas<=$nbpage;$pas++)
						{echo " <a href=\"Categorie.php?categorie=$_GET[categorie]&page=$pas\">Page $pas</a> ";}
					?>
				</div><br/>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>