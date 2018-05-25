<?php
//appel de la base de données
include("Include/connect_base.php");
session_start();
// on teste si le formulaire a été soumis
if (isset ($_POST['go']) && $_POST['go']=='Poster') {
	// on teste la déclaration de nos variables
	if (!isset($_POST['message'])) {
	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
	}
	else {
	// on teste si les variables ne sont pas vides
	if (empty($_POST['titre']) || empty($_POST['message'])) {
		$erreur = 'Au moins un des champs est vide.';
	}

	// si tout est bon, on peut commencer l'insertion dans la base
	else {
		// on calcule la date actuelle
		$date = date("Y-m-d H:i:s");
		// préparation de la requête d'insertion (pour la table forum_sujets)
		$sql=$base->prepare('INSERT INTO forum_sujets VALUES("", "'.$_SESSION['client_pseudo'].'", "'.$_POST['titre'].'", "'.$date.'")');
		$sql->execute();

		// on recupère l'id qui vient de s'insérer dans la table forum_sujets
		$id_sujet=$base->lastInsertId();

		// lancement de la requête d'insertion (pour la table forum_reponses
		$sql=$base->prepare('INSERT INTO forum_reponses VALUES("", "'.$_SESSION['client_pseudo'].'", "'.$_POST['message'].'", "'.$date.'", "'.$id_sujet.'")');
		$sql->execute();

		// on ferme la connexion à la base de données
		$sql->CloseCursor();

		// on redirige vers la page d'accueil
		header('Location: forum.php');

		// on termine le script courant
		exit;

	}
	}
}
?>

<!DOCTYPE html>
<html> 
	<head>  
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Insertion d'un nouveau sujet IDEEVENT </title>
		
		<link rel="stylesheet" href="Css/style.css"/>
	</head>

	<body>
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
    				 </br>   </br>  
            <a href="forum.php" id="pitree">Retour à l'accueil du forum </a>
		<!-- on fait pointer le formulaire vers la page traitant les données -->
		<form action="insert_sujet.php" method="post">
			<fieldset>
		<table>
		<tr><td id="sujet">
		Titre
		</td></br><td>
		<input type="text" name="titre" maxlength="50" size="50" id="cadre" value="<?php if (isset($_POST['titre'])) echo htmlentities(($_POST['titre'])); ?>">
		</td></tr><tr><td id="sujet">
		Message
		</td><td>
		<textarea name="message" cols="50" rows="10" id="cadre"><?php if (isset($_POST['message'])) echo htmlentities(($_POST['message'])); ?></textarea>
		</td></tr><tr><td><td align="right">
		<input type="submit" name="go" value="Poster" >
		</td></tr></table>
		</fieldset>
		</form>
		<?php
		// on affiche les erreurs éventuelles
		if (isset($erreur)) echo '<br /><br />',$erreur;
		?>
	</div>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
	</body>
</body>
</html>