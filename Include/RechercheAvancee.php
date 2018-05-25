
<form action="<?php echo $_SERVER['PHP_SELF'];?>" id="rechav" method="post">
	
	<div id="titrerech" class="rechtaille"><strong>Recherche avancée</strong></div></p>
	<div="blocrech1" class="blocrech">
	Titre</p>
	<input id="titre" name="event_titre" type="search" placeholder="titre" class="champs"/></p>
	description</p>
	<input id="description" name="event_description" type="search" placeholder="description" class="champs"/></p>
	Date de début</p>
	<input id="datedebut" name="event_datedebut" type="search" placeholder="AAAA-MM-JJ" class="champs"/></p>
	Date de fin</p>
	<input id="datefin" name="event_datefin" type="search" placeholder="AAAA-MM-JJ" class="champs"/>
	</div>
	<div id="blocrech2" class="blocrech">
	Ville</p>
	<input id="Ville" name="event_ville" type="search" placeholder="Ville" class="champs"/></p>
	Tarif minimum</p>
	<input id="tarifmin" name="event_tarifmin" type="search" placeholder="tarifmin" class="champs"/></p>
	Tarif maximum</p>
	<input id="tarifmax" name="event_tarifmax" type="search" placeholder="tarifmax" class="champs"/></p>
	</div></p>
	<button id="button">Rechercher</button>
</form>

<div id="accueil">
<?php

	$choix = array();	
 	$i =0 ;
 	$affichage=1;


 	include("Include/connect_base.php");

 


 	if(!empty($_POST['event_titre']) && isset($_POST['event_titre'])) { 
		$event_titre =$_POST['event_titre'];
		$titre="'%".$event_titre."%'";
		$choix[$i++] = "event_titre LIKE $titre"; }

	if(!empty($_POST['event_description']) && isset($_POST['event_description'])) { 
		$event_description =$_POST['event_description'];
		$descritpion="'%".$event_description."%'";
		$choix[$i++] = "event_description LIKE $description"; }
	
	if(!empty($_POST['event_datedebut']) && isset($_POST['event_datedebut'])) { 
		$event_datedebut =$_POST['event_datedebut'];
		$datedebut="'".$event_datedebut."%'";
		$choix[$i++] = "event_datedebut LIKE $datedebut"; }
	
	if(!empty($_POST['event_datefin']) && isset($_POST['event_datefin'])) { 
		$event_datefin = $_POST['event_datefin'];
		$datefin="'".$event_datefin."%'";
		$choix[$i++] = "event_datefin LIKE $event_datefin"; }
	
	if(!empty($_POST['event_ville']) && isset($_POST['event_ville'])) { 
		$event_ville = $_POST['event_ville'];
		$ville="'".$event_ville."'";
		$choix[$i++] = "event_ville LIKE $ville"; }

	if(!empty($_POST['event_tarifmin']) && isset($_POST['event_tarifmin'])) { 
		$event_tarifmin = $_POST['event_tarifmin'];
		$ville="'".$event_tarifmin."'";
		$choix[$i++] = "event_tarifmin >= $event_tarifmin"; }

	if(!empty($_POST['event_tarifmax']) && isset($_POST['event_tarifmax'])) { 
		$event_tarifmax = $_POST['event_tarifmax'];
		$tarifmax="'".$event_tarifmax."'";
		$choix[$i++] = "event_tarifmax <= $event_tarifmax"; }





	if($i > 0) {
	
	$critere = $choix[0]." ";

	for($j=1;$j<$i;$j++) 
	{
 		$critere .= " AND ".$choix[$j]." ";
	}

	// requete de selection
	$sql= "SELECT event_id, event_titre, event_description, event_datedebut FROM event WHERE $critere ORDER BY event_titre";

	


	$req = $base->prepare($sql);
	$req->execute();

		

			while($donnee=$req->fetch()
						and $affichage==1){
					

				
					echo	 
					"<br/>
					<a href=\"SiteEvenement.php?event=$donnee[event_id]\">
						<div id=\"evenement\">
							<div id=\"titre\">$donnee[event_titre]</div>
							<p id=\"description\"><img src=\"IE/$donnee[event_id].jpg\" alt=\"Image d'évènement\"/>$donnee[event_description]</p>
							<p id=\"dateheure\">$donnee[event_datedebut]</p>
						</div>
					</a>
					<br/>";
					}

				
					
			
			
		
			
	
	}




	


