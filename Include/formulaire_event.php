<form id=event_cre method="post" action="processusf/creationevent.php">
	<div>Proposez votre propre évènement !</div>
  	<fieldset>
    	<legend>Présentation</legend>
 
      	<label for="event_titre">Titre de l'évènement :</label> 
      	<input id="event_titre" name="event_titre" type="text" placeholder="Ajouter un nom clair et court" required autofocus/>

      	<p>Catégorie :</br>
      		<label for="event_type1">Sport</label>
      		<input type="checkbox" name="event_type1" id="event_type1"/>
      		
      		<label for="event_type2">Culture/Art</label> 
      		<input type="checkbox" name="event_type2" id="event_type2"/>
      		
      		<label for="event_type3">Concert/Musique</label>
      		<input type="checkbox" name="event_type3" id="event_type3"/>
      		
      		<label for="event_type4">Nature</label>
      		<input type="checkbox" name="event_type4" id="event_type4"/>
      		
      		<label for="event_type5">Social</label>
      		<input type="checkbox" name="event_type5" id="event_type5"/>
      		
      		<label for="event_type6">Soirée/Fête</label>
      		<input type="checkbox" name="event_type6" id="event_type6"/>
      		
      		<label for="event_type7">Politique</label>
      		<input type="checkbox" name="event_type7" id="event_type7"/>
   		</p>
   		
   		<label for="event_description">Description :</label> 
      	<textarea id="event_description" name="event_description" rows="5" cols="60" placeholder="Description de l'évènement" required></textarea>
   	</fieldset>
   	
   	<fieldset>
   		<legend>Date, Heure, Lieu</legend> 
   		
		<p>Date de début</p>
   		<label for="debutjour">Jour :</label> 
      	<input id="debutjour" name="debutjour" type="number" placeholder="JJ" min="1" max="31" required autofocus/>
    
		<label for="debutmois">Mois :</label> 
      	<input id="debutmois" name="debutmois" type="number" placeholder="MM" min="1" max="12" required autofocus/>
	
		<label for="debutannee">Année :</label> 
      	<input id="debutannee" name="debutannee" type="number" placeholder="AAAA" min="2016" max="2020" required autofocus/>
	
		<p>Date de fin</p>
	
		<label for="finjour">Jour :</label> 
      	<input id="finjour" name="finjour" type="number" placeholder="JJ" min="1" max="31" required autofocus/>
    
		<label for="finmois">Mois :</label> 
      	<input id="finmois" name="finmois" type="number" placeholder="MM" min="1" max="12" required autofocus/>
	
		<label for="finannee">Année :</label> 
      	<input id="finannee" name="finannee" type="number" placeholder="AAAA" min="2016" max="2020" required autofocus/>
	
		<p>Heure de début</p>
	
      	<label for="debutheure">Heure :</label> 
      	<input id="debutheure" name="debutheure" type="number" placeholder="HH" min="0" max="23"required autofocus/>
    
		<label for="debutmin">Minute :</label> 
      	<input id="debutmin" name="debutmin" type="number" placeholder="mm" min="0" max="59"required autofocus/>
	
		<p>Heure de fin</p>
	
      	<label for="finheure">Heure :</label> 
      	<input id="finheure" name="finheure" type="number" placeholder="HH" min="0" max="23"required autofocus/>
    
		<label for="finmin">Minute :</label> 
      	<input id="finmin" name="finmin" type="number" placeholder="mm" min="0" max="59"required autofocus/>
		
      	<label for="event_numad">N° :</label>
      	<input id="event_numad" name="event_numad" type="number" placeholder="" min="0" required autofocus/>

      	<label for="event_rue">Rue :</label>
      	<input id="event_rue" name="event_rue" type="text" placeholder="Voie, Allée..." required autofocus>

		<label for="event_ville">Ville :</label>
      	<input id="event_ville" name="event_ville" type="text" placeholder="" required autofocus/>	

      	<label for="event_cpostal">Code postal :</label>
      	<input id="event_cpostal" name="event_cpostal" type="text" required/>
   	</fieldset>
   	
   	<fieldset>
   		<legend>Informations supplémentaires</legend>	
   		
   		<p>Tranche d'âge :</br>
      		<label for="event_tr_age1">3-5 ans</label>
      		<input type="checkbox" name="event_tr_age1" id="event_tr_age1"/>
      		
      		<label for="event_tr_age2">6-9 ans</label> 
      		<input type="checkbox" name="event_tr_age2" id="event_tr_age2"/>
      		
      		<label for="event_tr_age3">10-13 ans</label>
      		<input type="checkbox" name="event_tr_age3" id="event_tr_age3"/>
      		
      		<label for="event_tr_age4">14-17 ans</label>
      		<input type="checkbox" name="event_tr_age4" id="event_tr_age4"/>
      		
      		<label for="event_tr_age5">18 ans et plus</label>
      		<input type="checkbox" name="event_tr_age5" id="event_tr_age5"/>
   		</p>
   		
   		<label for="event_tmin">Tarif minimum :</label> 
      	<input id="event_tmin" name="event_tmin" type="number" placeholder="en €" min="0" step="0.01" required autofocus/>

      	<label for="event_tmax">Tarif maximum :</label> 
      	<input id="event_tmax" name="event_tmax" type="number" placeholder="en €" min="0" step="0.01" required autofocus/>
      	
      	<label for="event_nbrmaxparticipant">Nombre maximum de participants :</label> 
      	<input id="event_nbrmaxparticipant" name="event_nbrmaxparticipant" type="number" min="1" placeholder="" required autofocus/>
   	</fieldset>
   	
    <fieldset>
    	<legend>A propos</legend>
      	
      	<label for="event_lien">Lien de l'évènement :</label>
      	<input id="event_lien" name="event_lien" type="url" placeholder="Si il y a (Facultatif)"/>

      	<label for="event_sponsor">Sponsor :</label> 
      	<input id="event_sponsor" name="event_sponsor" type="text" placeholder="(Facultatif)" autofocus/>
     
      	<label for="event_image">Photos :</label> 
      	<input id="event_image" name="event_image" type="file" placeholder="Facultatif" autofocus/>
  	
  	<fieldset>
    	<button type="submit">Je propose !</button>
  	</fieldset>
  	
</form>