<?php
session_start();
$messagemail='';
if(isset($messagemail)){$messagemail=$_SESSION['messagemail'];};
$_SESSION['messagemail']='';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Nous contacter - IDEEVENT</title>
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
				
				<div id="nouscontacter">
					<div class="form-style-6">
						<h1>Nous contacter</h1>
						<form action="processusf/contacter.php" method="post">
							<input type="text" name="sujet" placeholder="Sujet" />
							<textarea name="message" placeholder="Message"></textarea>
							<input type="submit" value="Send" />
						</form><br/>
						<div id="messagemail"><?php echo "$messagemail";?></div>
					</div>	
				</div>
				
		</section>
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>