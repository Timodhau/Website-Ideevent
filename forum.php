<?php 
//appel de la base de données
include("Include/connect_base.php");
session_start();
?>
<!DOCTYPE html >

<html>
	<head>
		<title>Index du forum IDEEVENT </title>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		
		<link rel="stylesheet" href="Css/style.css"/>
		
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
				<div id="forum">
					
					<a id="pitree" href="<?php if(isset($_SESSION['client_id'])){echo 'insert_sujet.php';}else{echo 'SiteIdentificationF.php';}?>">Poster un sujet</a>
					
		

					<?php 
				$sql=$base->prepare('SELECT id, auteur, titre, date_derniere_reponse FROM forum_sujets ORDER BY date_derniere_reponse DESC');
				$req =$base->query('SELECT id, auteur, titre, date_derniere_reponse FROM forum_sujets ORDER BY date_derniere_reponse DESC');
				$sql->execute();
				$req->execute();
				// on compte le nombre de sujets du forum
				$nb_sujets = $req->rowCount();

				if ($nb_sujets == 0) {
					echo "Aucun sujet" ;
				}
				else {
					?>
					<table id="bat"> 
						<tr>
							<td id='titreauteur'>Auteur</td>
							<td id='titresujet'>Titre du sujet</td>
							<td id='titredate'>Date dernière réponse</td>
						</tr>
					<?php
					//on va analyser chaque tuple un par un 
					while ($data=$req-> fetch()){ 
					// lit les données et l'interprète en fonction du format
					sscanf($data['date_derniere_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
					
					// on affiche les résultats
					echo '<tr id="topics">';
					echo '<td id="auteur">';

					// on affiche le nom de l'auteur de sujet, htmlentities convertit tous les caractères en entités html
					echo htmlentities($data['auteur']);
					echo '</td><td id="sujet">';

					// on affiche le titre du sujet, et sur ce sujet, on insère le lien qui nous permettra de lire les différentes réponses de ce sujet
					echo '<a href="./lire_sujet.php?id_sujet_a_lire=' , $data['id'] , '">' , htmlentities($data['titre']) , '</a>';
					echo '</td><td id="date">';

					// on affiche la date de la dernière réponse de ce sujet
					echo $jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute;
					}
					?>
					</td></tr></table>
	<?php
	}			
	$req->CloseCursor();
	?>
</div>
</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
	</body>
</html>