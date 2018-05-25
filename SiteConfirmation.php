<?php
session_start();
?>

<?php
include("Include/connect_base.php");
$requete=$base->prepare('SELECT client_id, client_ckey, client_active FROM client WHERE client_id=?');
$requete->execute(array($_GET['id']));
$donnee=$requete->fetch();

if($_GET['key']==$donnee['client_ckey'] AND $donnee['client_active']==0)
	{$req=$base->prepare('UPDATE client SET client_active=? WHERE client_id=?');
	$req->execute(array(1,$_GET['id']));
	$affichage='Votre compte a bien été activé';}
elseif($_GET['key']==$donnee['client_ckey'] AND $donnee['client_active']==1)
	{$affichage='Votre compte a déjà été activé, inutile de spammer le lien sur votre mail';}
else{$affichage='Une erreur est survenue, votre compte n\'a pas pu être activé ou elle est peut-être déjà activé.';};
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="Css/style.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
		<title>Confirmation - IdeEvent</title>
	</head>
	<body>
 
		<!-- L'en-t?te -->
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
    
    		<!-- Le corps -->
    		<section>
			<br/><br/><br/><br/><br/><br/><br/>
			<div id="confirmationinscription">
				<?php echo "$affichage";?>
			</div>
		</section>   
    
    		<!-- Le pied de page -->
		<footer>
        		<?php include("Include/footer.php");?>
    		</footer>
    	
	</body>
</html>		