<?php
session_start();
$erreurrecup='';
$erreurrecup=$_SESSION['errorrecup'];
$_SESSION['errorrecup']='';
include("Include/connect_base.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="latin1"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Connexion</title>
	</head>
	<body>
 
		<!-- L'en-t? -->
    	<header>
        	<?php include("Include/titre.php"); ?>
		</header>
    
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
			<div id="recupmdp">
				<p>Vous vous souvenez plus de votre mot de passe ? <br/>Entrez votre Identifiant, nous vous enverrons votre mot de passe sur votre boîte mail !</p>
				<div id="errorrecup"><?php echo "$erreurrecup";?></div>
				<form action="processusf/recuperation.php" method="post">
					<label for="identifiant">Identifiant :</label>
					<input type="text" name="identifiant" id="identifiant" required autofocus/><br/><br/>
					<button type="submit">Envoyer</button>
				</form>
			</div>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>