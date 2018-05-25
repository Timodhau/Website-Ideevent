?>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="mention">
	<a href="<?php if(isset($_SESSION['client_id'])){echo 'SiteCompte.php';}else{echo 'SiteIdentification.php';}?>">Mon compte</a>
	<a href="<?php if(isset($_SESSION['client_id'])){echo 'SiteContacter.php';}else{echo 'SiteIdentificationC.php';}?>">Nous contacter/Signaler</a>
	<a href="CGU.php">Conditions d'utilisation</a>
	<a href="Faq.php">Aide-FAQ</a>
	<a href="Conseil.php">Quelques conseils ?</a>
</div>
            
<div id="reseaux_sociaux">
	<p>Suivez-nous sur les réseaux sociaux :</p>
	<a href="https://www.facebook.com/Ideevent75" target="_blank"><img src="Images accueil/facebook.jpg" title="Suivez-nous sur Facebook !" id="facebook" alt="Facebook"/></a>
	<a href="https://twitter.com/Ideevent_" target="_blank"><img src="Images accueil/twitter.jpg" title="Suivez-nous sur Twitter !" id="twitter" alt="Twitter"/></a>
	<a href="https://www.instagram.com/ideevent/" target="_blank"><img src="Images accueil/instagram.jpg" title="Suivez-nous sur Instagram !" id="instagram" alt="Instagram"/></a>
	<div class="fb-like" data-href="https://www.facebook.com/Ideevent75/?ref=ts&fref=ts" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
</div>
                
<div id="nous">
	<p>Site réalisé par le groupe 9D - ISEP</p>
	<a href="http://www.isep.fr/" target="_blank"><img src="Images accueil/isep.jpg" id="isep" alt="Isep"/></a>
</div>
