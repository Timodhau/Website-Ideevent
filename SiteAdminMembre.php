<?php
session_start();
$message='';
$message=$_SESSION['messageadmin'];
$_SESSION['messageadmin']='';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="latin1"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Supprimer un membre - IDEEVENT</title>
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
				<?php
				if(isset($_SESSION['client_moderateur']) and $_SESSION['client_moderateur']==1){
				echo "<div id=\"admin\">
					<form action=\"processusf/supprimer_membre.php\" method=\"post\">
						<label for=\"identifiant\">Pseudo : </label>
						<input type=\"text\" id=\"identifiant\" name=\"identifiant\">
						<button type=\"submit\">Valider</button>
					</form>
				</div>";}
				else{echo "<br/><br/><div style=\"font-family : helvetica; text-align : center;\">Nous sommes désolé, vous ne faites pas partie du cercle des administrateurs du site !</div>";};
				
				echo "<div style=\"font-family : helvetica; text-align : center; font-weight : bold\">$message</div>";
				?>
				
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>