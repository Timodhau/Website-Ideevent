<?php

session_start();


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
    		<!-- Le corps -->
    		<section>				
				<div class=\"note_etoile\">
									<a href=\"\" title=\"Très bien\">&#10004</a>
									<a href=\"\" title=\"Bien\">&#10004</a>
									<a href=\"\" title=\"Assez bien\">&#10004</a>
 									<a href=\"\" title=\"Moyen\">&#10004</a>
									<a href=\"\" title=\"Pas terrible\">&#10004</a>
				</div>
			</section>   
    
    		<!-- Le pied de page -->
		<footer>
        	<?php include("Include/footer.php");?>
    	</footer>
    	
	</body>
</html>