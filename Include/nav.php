<div id="nav">
    <ul id="deroulant">
        <li>
            <a href="SiteC.php">Accueil</a>
        </li>
        <li>
            <a href="<?php if(isset($_SESSION['client_id'])){echo 'SiteFormulaireEvent.php';}else{echo 'SiteIdentificationP.php';}?>">Proposer</a>
        </li>
        <li>
            <a href="">Top &Eacutev&eacutenement</a>
            <ul>
                <li><a href="SiteNote.php">Note</a></li>
                <li><a href="SiteParticipant.php">Nombre de participants</a></li>
            </ul>
        </li>
        <li>
            <a href="SiteCategorie.php">Cat&eacutegorie</a>
            <ul>
                <li><a href="Categorie.php?categorie=Sport">Sport</a></li>
                <li><a href="Categorie.php?categorie=Culture">Culture/Art</a></li>
                <li><a href="Categorie.php?categorie=Musique">Concert/Musique</a></li>
                <li><a href="Categorie.php?categorie=Nature">Nature</a></li>
                <li><a href="Categorie.php?categorie=Social">Social</a></li>
                <li><a href="Categorie.php?categorie=Soirée">Soirée/Fete</a></li>
                <li><a href="Categorie.php?categorie=Politique">Politique</a></li>
            </ul>
        </li>
        <li>
            <a href="Galerie.html">Galerie</a>
        </li>
        <li>
            <a href="forum.php">Forum</a>
        </li>
        <li>
            <a href="Faq.php">Aide</a>
        </li> 
    </ul>
</div>