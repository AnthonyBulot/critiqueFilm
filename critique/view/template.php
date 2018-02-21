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
                <a href="/critique/populaire" class="lienMenu">Populaire</a>
                <p>Catégorie</p>
                <div>
                	
                </div>
                <a href="/critique/film/contact">Contact</a>                
                <?php if (isset($_SESSION['password'])): ?>                
                <a href="/critique/film/administration" class="lienMenu">Utilisateur</a>
                <a href="/critique/film/deconnect" class="lienMenu">Déconnexion</a>
                <?php else: ?>              
                <a href="/critique/film/formulaire-connexion" class="lienMenu">Indentifiez-vous</a>
                <?php                                   
                endif;
                ?>
            </div>
            <div class="search">
                <form method="post" action="/critique/film/recherche-film">
                    <input class="searchText" type="search" name="search">
                    <input class="searchSubmit" type="submit" name="submit" value="Recherchez"> 
                </form>
            </div>
        </header>        
        <section>      
            <?= $content ?>
        </section> 
        <footer>
        	<a href="/critique/film/formulaire-admin">Administration</a>
            <p>Ce site a été fait dans le cadre de la formation Développeur Web Junior de OpenClassrooms</p>
        </footer>

    </body>
</html>