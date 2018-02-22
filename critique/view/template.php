<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Critique de film</title>
        <link href="css/styles.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <header>
            <div id="menu">
                <a href="/critique/film/accueil" class="lienMenu">Accueil</a>
                <a href="/critique/film/dernier-film" class="lienMenu">Dernières Sortie</a>
                <p>Catégorie</p>
                <div>
                    <a href="/critique/film/category/Action">Action</a>
                    <a href="/critique/film/category/Aventure">Aventure</a>
                    <a href="/critique/film/category/Comedie">Comedie</a>
                    <a href="/critique/film/category/Drame">Drame</a>
                    <a href="/critique/film/category/Famille">Famille</a>
                    <a href="/critique/film/category/Fantastique">Fantastique</a>
                    <a href="/critique/film/category/Hero">Hero</a>
                    <a href="/critique/film/category/Histoire">Histoire</a>
                    <a href="/critique/film/category/Horreur">Horreur</a>
                    <a href="/critique/film/category/Policier">Policier</a>
                    <a href="/critique/film/category/Science-Fiction">Science-Fiction</a>
                    <a href="/critique/film/category/Romantique">Romantique</a>
                </div>
                <a href="/critique/film/contact">Contact</a>                
                <?php if (isset($_SESSION['password'])): ?>                
                <a href="/critique/film/utilisateur" class="lienMenu">Utilisateur</a>
                <a href="/critique/film/deconnect" class="lienMenu">Déconnexion</a>
                <?php else: ?>              
                <a href="/critique/film/formulaire-connexion" class="lienMenu">Indentifiez-vous</a>
                <?php                                   
                endif;
                ?>
            </div>
            <div class="search">
                <form method="post" action="/critique/film/recherche-film">
                    <input class="searchText" type="search" name="search" placeholder="Nom du film ou de l'acteur" >
                    <input class="searchSubmit" type="submit" name="submit" value="Recherchez"> 
                </form>
            </div>
        </header>        
        <section>      
            <?= $content ?>
        </section> 
        <footer>
            <?php if (isset($_SESSION['admin'])): ?>                
                <a href="/critique/film/administration" class="lienMenu">Page Administration</a>
                <a href="/critique/film/deconnect" class="lienMenu">Déconnexion</a>
                <?php else: ?>              
                <a href="/critique/film/formulaire-admin">Administration</a>
                <?php                                   
                endif;
            ?>
            <p>Ce site a été fait dans le cadre de la formation Développeur Web Junior de OpenClassrooms</p>
        </footer>

    </body>
</html>