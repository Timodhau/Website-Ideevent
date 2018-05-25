<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="latin1"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Administrer - IDEEVENT</title>
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
				echo
			"<div id=\"admin\">
				<p>Dans cette rubrique apparaitra les évènements signalés comme étant contraire à notre chartre d'utilisation.</p>
				<a href=\"SiteAdminEvent.php\">Les évènements signalés</a>
				<p>Dans cette rubrique, vous pouvez supprimer un membre, directement grâce à l'interface du site.</p>
				<a href=\"SiteAdminMembre.php\">Supprimer un membre</a>
				<p>Dans cette rubrique apparaitra les messages signalés comme étant contraire à notre chartre d'utilisation.</p>
				<a href=\"SiteAdminForum.php\">Les messages signalés</a>
				<p>Dans cette rubrique, vous pouvez ajouter des questions/réponses à la FAQ pour améliorer l'aide.</p>
				<a href=\"FaqFormulaire.php\">Ajouter des questions/réponses</a>
			</div>";}
			else{echo "<br/><br/><div style=\"font-family : helvetica; text-align : center;\">Nous sommes désolé, vous ne faites pas partie du cercle des administrateurs du site !</div>";}
			?>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>