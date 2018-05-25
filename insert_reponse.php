<?php
//appel de la base de données
include("Include/connect_base.php");
session_start();
// on teste si le formulaire a été soumis
if (isset ($_POST['go']) && $_POST['go']=='Poster') {
	// on teste le contenu de la variable $auteur
	if (!isset($_SESSION['client_pseudo']) || !isset($_POST['message']) || !isset($_GET['numero_du_sujet'])) {
	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
	}
	else {
	if (empty($_SESSION['client_pseudo']) || empty($_POST['message']) || empty($_GET['numero_du_sujet'])) {
		$erreur = 'Au moins un des champs est vide.';
	}
	// si tout est bon, on peut commencer l'insertion dans la base
	else {
		// on recupere la date de l'instant présent
		$date = date("Y-m-d H:i:s");

		// préparation de la requête d'insertion (table forum_reponses)
		$sql=$base->prepare('INSERT INTO forum_reponses VALUES("", "'.$_SESSION['client_pseudo'].'", "'.$_POST['message'].'", "'.$date.'", "'.$_GET['numero_du_sujet'].'")');
		//on lance la requête
		$sql->execute();

		// préparation de la requête de modification de la date de la dernière réponse postée (dans la table forum_sujets)
		$sql=$base->prepare('UPDATE forum_sujets SET date_derniere_reponse="'.$date.'" WHERE id="'.$_GET['numero_du_sujet'].'"');
		$sql->execute();

		//on ferme la connexion à la base de données
		$sql->CloseCursor();
		// on redirige vers la page de lecture du sujet en cours
		header('Location: lire_sujet.php?id_sujet_a_lire='.$_GET['numero_du_sujet'].'');

		// on termine le script courant
		exit;
	}
	}
}
?>

<!DOCTYPE html>
<html>
	<head> <title>Insertion d'une nouvelle réponse IDEEVENT </title>
			 <link rel="stylesheet" href="Css/style.css"/>
			</head>
	<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>	
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
    			 </br>   </br>  
            <a href="index.php" id="pitree">Retour à l'accueil du forum </a>
	<!-- on fait pointer le formulaire vers la page traitant les données -->
		<form action="insert_reponse.php?numero_du_sujet=<?php echo $_GET['numero_du_sujet']; ?>" method="post">
		<fieldset>
		<table>
		<tr><td id="sujet">
		Message 
		</td><td>
		</br><textarea name="message"  id="cadre" cols="50" rows="10"><?php if (isset($_POST['message'])) echo htmlentities(($_POST['message'])); ?></textarea>
		</td></tr><tr><td><td align="right">
		<input type="submit" id="cadre" name="go" value="Poster">
		</td></tr></table>
		</fieldset>
		</form>
		<?php
		if (isset($erreur)) echo '<br /><br />',$erreur;
		?>
	</div>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
	</body>
</html>