<?php

session_start();

?>

<!DOCTYPE html>
<html>

        <head>
            
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="Images accueil/favicon.png"/>
        <title>Help ! - IDEEVENT</title>
        
        </head>
        
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

            
            <h1 class="haut_titre">Trouver l'aide qu'il vous faut grâce à la FAQ #IDV</h1>
            <figure>
            <img src="Images accueil/FAQ.jpg" alt="Foire aux questions" title="posez vos questions"/ id="FAQ">
            <figcaption class="haut_titre">Aide / FAQ / #IDV /</figcaption>
            </figure>
            
            <!-- barre de recherche -->
            <div id="recherche">
                <?php include("Include/recherche.php"); ?>
            </div>


            <?php
            include("Include/connect_base.php");
            $recupere= $base->query('SELECT * FROM faq');
            while($entree = $recupere->fetch())

                { if ($entree['faq_id']%2==0) {
                    echo "<div class=\"aide1\"><h3 class=\"titre1\"> $entree[faq_question] </h3>
                    <p>$entree[faq_reponse]</p></div>";}

                elseif ($entree['faq_id']%2!=0) {
                    echo "<div class=\"aide2\"><h3 class=\"titre2\"> $entree[faq_question] </h3>
                    <p>$entree[faq_reponse]</p></div>";}


            }
            $recupere->closeCursor();

            ?>

            <div id="aide_annexe"><p>D'autres questions ? Consultez notre <a href="forum.php">Forum</a> pour trouver votre réponse ou posez votre question si le topic n'existe pas encore.<br>
            Besoin de nous contacter ? De nous signaler quelque chose ? Consultez la rubrique <a href="<?php if(isset($_SESSION['client_id'])) {echo 'Sitecontacter.php';} else {echo 'SiteIdentification.php';}?>">Nous contacter</a>.</p></div>
            
            <footer>
                <?php include("Include/footer.php"); ?>
            </footer>
            
        </body>
        
</html>
