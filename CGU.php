<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>CGU - IDEEVENT</title>
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
			<div id="cgu">
				<h5>Editeur du Site "IdeEvent": Groupe 9D de l'ISEP</h5>
				<div id="maj">Date de mise à jour : 10/01/2016</div>
				<div>Société en cours de déploiement au capital voisinant 0€<br/><br/>
				Siège social : ISEP, 10 rue de Vanves 92130 ISSY LES MOULINEAUX, salle 114 (parfois dans la salle 220)<br/><br/>
				Vous pouvez contacter l'equipe, en cliquant <a href="<?php if(isset($_SESSION['client_id'])){echo 'SiteContacter.php';}else{echo 'SiteIdentificationC.php';}?>">ici</a><br/><br/>
				<u>Directeur publication</u> : Batmunkh YONDONJAMTS<br/>
				<u>Directeur Ressource</u> : Abdelhakim BOUYDRAREN<br/>
				<u>Designer</u> : Timothée DHAUSSY<br/>
				<u>Cerveau du groupe</u> : Antoine QUINQUENEL<br/>
				<u>Responsable manager</u> : Amine OUDDIZ<br/>
				<u>Directeur commercial</u> : Matthieu FAVROTE<br/><br/>

				Date de création du site : 10/01/2016</div>				
				<h5>Conditions d'utilisation du site "IdeEvent"</h5>
				<div id="maj">Date de mise à jour : 10/01/2016</div>
				<div>Télécharger les <a href="CGU.pdf">Conditions Générales d'utilisation</a> (fichier pdf de 211Ko)</div>
			</div>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>