<div id="entete">
	<a href="SiteC.php">
	<div id="titre_ideevent">
		<img src="Images accueil/logo_titre.png" id="logo_titre" alt="Titre"/>
	</div>
	</a>
	<div id="widget">
		<?php 
		if(isset($_SESSION['client_moderateur'])){
			if($_SESSION['client_moderateur']==1){
				echo "				
				<div id=\"connected\">
					<div id=\"bienvenue\"><img src=\"Images accueil/$_SESSION[client_sexe].jpg\"/>Bienvenue !</div><br/>
					<div id=\"nom\">$_SESSION[client_prenom] $_SESSION[client_nom]</div><br/>
					<div><a href=\"SiteCompte.php\">Mon compte</a>  <a href=\"processusf/deconnexion.php\">Deconnexion</a>	<a href=\"SiteAdministrer.php\">Administrer</a></div>	
				</div>";
				}
			else{
				echo "				
				<div id=\"connected\">
					<div id=\"bienvenue\"><img src=\"Images accueil/$_SESSION[client_sexe].jpg\"/>Bienvenue !</div><br/>
					<div id=\"nom\">$_SESSION[client_prenom] $_SESSION[client_nom]</div><br/>
					<div><a href=\"SiteCompte.php\">Mon compte</a>  <a href=\"processusf/deconnexion.php\">Deconnexion</a></div>	
				</div>";
				};	
			}
		else{echo "
				<div id=\"bouton\"><a href=\"\" id=\"mem\">Membre</a><a href=\"\" id=\"agen\">Agenda</a></div>
				<div id=\"connexion\">
					<p>Connexion<p/>
					<form action=\"processusf/authentification.php\" method=\"post\">
						<input type=\"text\" name=\"identifiant\" id=\"identifiant\" placeholder=\"Identifiant\"/>
						<input type=\"password\" name=\"mdp\" id=\"mdp\" placeholder=\"Mot de passe\"/>
						<input type=\"submit\" value=\"Se Connecter\"/> 
					</form>
					<div id=\"error\"></div>	
					<div><a href=\"SiteFormulaire.php\">Inscription</a>  <a href=\"SiteRecuperation.php\">Mot de passe perdu</a></div>	
				</div>";};
		?>
	</div>
</div>