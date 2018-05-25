<?php
//appel de la base de données
include("Include/connect_base.php");
session_start();
?>

<!DOCTYPE html >

<html>
	<head>
		<title>Lecture d'un sujet IDEEVENT</title>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		
		<link rel="stylesheet" href="Css/style.css"/>
	</head>

	<body>

		<!-- L'en-tête -->
    		<header>
        		<?php include("Include/Titre.php"); ?>
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
		<!-- on insère un lien qui nous permettra de retourner à l'accueil du forum -->
		</br> </br> <a href="./forum.php" id="pitree">Retour à l'accueil du forum </a>

		<?php
			if (!isset($_GET['id_sujet_a_lire'])) {
				echo 'Sujet non défini.';
			}
			else {
				?>
				</br> </br> <table id="bat"> 
				<td id="futuri">Auteur</td>
				<td id="futuri">Messages</td>
				</tr>
				<?php 
				
					$query=$base->prepare('SELECT auteur, message, date_reponse FROM forum_reponses WHERE correspondance_sujet="'.$_GET['id_sujet_a_lire'].'" ORDER BY date_reponse ASC');
					$req = $base->query('SELECT auteur, message, date_reponse FROM forum_reponses WHERE correspondance_sujet="'.$_GET['id_sujet_a_lire'].'" ORDER BY date_reponse ASC');
					$query->execute();
					$req->execute();
					// on va analyser tous les tuples un par un
					while ($data=$req->fetch()){
					// lit les données et l'interprète en fonction du format
						sscanf($data['date_reponse'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);
					
					// on affiche les résultats
					echo '<tr>';
					echo '<td id="futur">';
					// on affiche le nom de l'auteur de sujet ainsi que la date de la réponse
					echo htmlentities($data['auteur']);
					echo '<br />';
					echo $jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute;

					echo '</td><td id="futur">';

					// on affiche le message, nl2r fait un retour à la ligne html à chaque nouvelle ligne
					echo nl2br(htmlentities($data['message']));
					echo '</td></tr>';
				}
					$req->CloseCursor();
				?>


	<!-- on ferme notre tableau -->
	</table>
	<br /><br />
	<!-- on insère un lien qui nous permettra de rajouter des réponses à ce sujet -->


	<a id="pitree" href="<?php if(isset($_SESSION['client_id'])){echo 'insert_reponse.php?numero_du_sujet='.$_GET['id_sujet_a_lire'].'';} else{echo 'SiteidentificationR.php';}?>">Répondre</a>
	
	<?php
	}
	?>
</div>
	</section>   
    
<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
	
</body>
</html>			