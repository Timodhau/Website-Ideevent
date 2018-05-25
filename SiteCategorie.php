<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="Css/style.css" />
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Catégorie - IDEEVENT</title>
	</head>
	<body>
 
		<!-- L'en-t?te -->
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
			<?php 
            if($affichage==1)
                {include("Include/categorie.php");
                }
            ?>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    	</footer>
    	
	</body>
</html>