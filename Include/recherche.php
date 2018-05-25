<div id="rech">
<div class="recherche_p">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" id="searchthis" method="post">
	<input id="query" name="query" type="search" placeholder="Rechercher" />
	<select name="filtre">
		<option value="Tout">Tout</option>
		<option value="Titre">Titre</option>
		<option value="Description">Description</option>
	
	</select>
	<input id="search-btn" type="submit" value="Rechercher" /></p>
	<a id="atextebutt" href="SiteRechercheAvancee.php"><span id="button"><div id="textebutt">recherche avanc&#233e</div></span></a>

</form>





</div>
</div>


<div id="accueil">
<?php

	$affichage=1;	
	$resultats ="";
	$nbreparametres = 2;
	//traitement de la requete
	if(isset($_POST['query']) && !empty($_POST['query'])){
	//si l'utilisateur a rentré quelque chose
	
	
		$query = preg_replace("#[^a-zA-Z ?0-9]#i", "", $_POST['query']);
		if($_POST['filtre']=="Tout"){
			$nbreparametres = 4;
			$sql="(SELECT event_id, event_titre, event_description, event_datedebut FROM event WHERE event_titre LIKE ?)
			UNION (SELECT event_id, event_titre, event_description, event_datedebut FROM event WHERE event_description LIKE ?)";
			
		
		
		} else if($_POST['filtre']=="Titre"){
			$sql="SELECT event_id, event_titre, event_description, event_datedebut FROM event WHERE event_titre LIKE ?";
			
		} else if($_POST['filtre']=="Description"){
			$sql="SELECT event_id, event_titre, event_description, event_datedebut FROM event WHERE event_description LIKE ?";
		}
		
	
		
		include("Include/connect_base.php");
		
		$req = $base->prepare($sql);
		if($nbreparametres == 2){
			$req->execute(array('%'.$query.'%'));
		} else {
			$req->execute(array('%'.$query.'%','%'.$query.'%'));
		}
		
		$count = $req->rowCount();
		
		if($count >=1){
			
			echo "$count r&#xE9sultat(s) trouv&#xE9(s) pour <strong>$query</strong><hr/>";
			while($data = $req->fetch(PDO::FETCH_OBJ)){
				echo	 
					"<br/>
					<a href=\"SiteEvenement.php?event=$data->event_id\">
						<div id=\"evenement\">
							<p id=\"titre\">$data->event_titre</p><br/>
							<p id=\"description\"><img src=\"IE/$data->event_id.jpg\" alt=\"Image d'évènement\"/>$data->event_description</p>
							<p id=\"dateheure\">$data->event_datedebut</p>
						</div>
					</a>
					<br/>";
				$affichage=0;
			}
			
			
		} else {
			echo"<hr/>0 r&#xE9sultat trouv&#xE9 pour <strong>$query</strong><hr/>";
			$affichage=0;
		}
	
	}

	
?>
</div>

