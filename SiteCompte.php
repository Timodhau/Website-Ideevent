<?php
session_start();
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
 
		<!-- L'en-t�te -->
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
			
			<div id="client_event">
				<p id="mesevenements">Mes évènements</p>
				<p>Dans cette rubrique vous pouvez accéder aux évènements auxquelles vous vous êtes signalé comme étant "participant" ou ceux que vous avez décidé de suivre.</p>
				<div>
					<a href="SiteCP.php" id="participationclient">Mes prochains évènements</a>
					<a href="SiteCS.php" id="suiviclient">Mes suivis</a>
				</div>
			</div>
			
			<div id="modif">
				<h5>Modifier mon profil</h5>
				<div>
					<form method="post" action="processusf/modification.php">
					
						<p>Modifier mon adresse mail</p>
						
						<label for="membre_mail">Nouvelle adresse Mail :</label>
						<input type="mail" name="membre_mail" id="membre_mail"/><br/>
						
						<label for="membre_mailc">Confirmation Mail :</label>
						<input type="mail" name="membre_mailc" id="membre_mailc"/><br/><br/>
						
						<p>Modifier mon mot de passe</p>
						
						<label for="membre_mdp">Nouveau mot de passe :</label>
						<input type="password" name="membre_mdp" id="membre_mdp"/><br/>
						
						<label for="membre_mdpc">Confirmation mot de passe :</label>
						<input type="password" name="membre_mdpc" id="membre_mdpc"/><br/><br/>
						
						<p>Modifier mon adresse</p>
						
						<label for="ville">Ville :</label>
						<input type="text" name="ville" id="ville"/><br/>
						
						<label for="cp">Code postal :</label>
						<input type="text" name="cp" id="cp"/><br/><br/>
						
						<p>Modifier mes préférences</p>
						
						<label for="membre_type1">Sport</label>
						<input type="checkbox" name="membre_type1" id="membre_type1"/>
      		
						<label for="membre_type2">Culture/Art</label> 
						<input type="checkbox" name="membre_type2" id="membre_type2"/>
      		
						<label for="membre_type3">Concert/Musique</label>
						<input type="checkbox" name="membre_type3" id="membre_type3"/>
      		
						<label for="membre_type4">Nature</label>
						<input type="checkbox" name="membre_type4" id="membre_type4"/>
      		
						<label for="membre_type5">Social</label>
						<input type="checkbox" name="membre_type5" id="membre_type5"/>
      		
						<label for="membre_type6">Soirée/Fête</label>
						<input type="checkbox" name="membre_type6" id="membre_type6"/>
      		
						<label for="membre_type7">Cérémonie</label>
						<input type="checkbox" name="membre_type7" id="membre_type7"/><br/><br/><br/><br/><br/>
						
						<button type="submit">Valider</button>
						
					</form>
				</div>
			</div>
				
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    	</footer>
    	
	</body>
</html>