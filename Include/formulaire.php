﻿<form id=membre_cre method="post" action="CreationCompte.php">
	<div>Inscrivez-vous !</div>
  	<fieldset>
    	<legend>Informations personnelles</legend>
    	
    	<label for="masculin">M</label>
    	<input type="radio" name="membre_sexe" id="masculin" value="M"/>
    	
    	<label for="feminin">F</label>
    	<input type="radio" name="membre_sexe" id="feminin" value="F" required/>
 
  		<label for="membre_nom">Nom :</label>
  		<input type="text" name="membre_nom" id="membre_nom" required autofocus/>
  		
  		<label for="membre_prenom">Prénom :</label>
  		<input type="text" name="membre_prenom" id="membre_prenom" required autofocus/>
  		
  		<label for="membre_naissance">Date de naissance :</label>
  		<input type="date" name="membre_naissance" id="membre_naissance" placeholder="JJ/MM/AAAA" required autofocus/>
  	</fieldset>
  	
  	<fieldset>
  		<legend>Votre région</legend>
  		
  		<label for="membre_adresse_ville">Ville :</label>
  		<input type="text" name="membre_adresse_ville" id="membre_adresse_ville" required autofocus/>
  		
  		<label for="membre_adresse_cp">Code postal :</label>
  		<input type="text" name="membre_adresse_cp" id="membre_adresse_cp" required autofocus/>
  		
  	</fieldset>
  	
  	<fieldset>
  		<legend>Informations compte</legend>
  		
  		<label for="membre_pseudo">Pseudo :</label>
  		<input type="text" name="membre_pseudo" id="membre_pseudo" required autofocus/>
  		
  		<label for="membre_mail">Mail :</label>
  		<input type="mail" name="membre_mail" id="membre_mail" required autofocus/>
  		
  		<label for="membre_mail_confirm">Mail confirmation :</label>
  		<input type="mail" name="membre_mail_confirm" id="membre_mail_confirm" required autofocus/>
  		
  		<label for="membre_mdp">Mot de passe :</label>
  		<input type="password" name="membre_mdp" id="membre_mdp" required autofocus/>
  		
  		<label for="membre_mdp_confirm">Mot de passe confirmation :</label>
  		<input type="password" name="membre_mdp_confirm" id="membre_mdp_confirm" required autofocus/>
  		
  	</fieldset>
  		  		
  	<fieldset>
  		<legend>Goûts</legend>
  		
  		<p>Catégorie :</br>
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
      		
      		<label for="membre_type7">Politique</label>
      		<input type="checkbox" name="membre_type7" id="membre_type7"/>
   		</p>
  		
  	</fieldset>
  			  		
  	
  	<fieldset>
    	<button type="submit">Je m'inscris !</button>
  	</fieldset>
  	
</form>