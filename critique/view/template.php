<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Critique de film</title>
        <link href="css/style/style.css" rel="stylesheet" /> 
        <link href="css/style/bootstrap.min.css" rel="stylesheet" />
    </head>
        
    <body>
        <div class="container">
            <header>
                <div class="row">
                    <p class="col-lg-2"></p>
                    <div class="col-lg-8">
                        <a href="/critique/film/accueil" class="col-lg-2">Accueil</a>
                        <a href="/critique/film/dernier-film" class="col-lg-3">Dernières Sortie</a>
                        <p class="col-lg-2">Catégorie</p>
                        <div class="category">
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
                        <p class="col-lg-2"><a href="/critique/film/contact">Contact</a></p>                
                        <?php if (isset($_SESSION['user'])): ?>                
                        <a href="/critique/film/utilisateur" class="col-lg-2">Utilisateur</a>
                        <a href="/critique/film/deconnect" class="col-lg-1">Déconnexion</a>
                        <?php else: ?>              
                        <a href="/critique/film/formulaire-connexion" class="col-lg-3">Indentifiez-vous</a>
                        <?php                                   
                        endif;
                        ?>
                    </div>
                </div>    
                <div class="row">
                    <form method="post" action="/critique/film/recherche-film" class="col-lg-offset-8 col-lg-4">
                        <div class="input-group">
                            <input class="form-control" type="search" name="search" placeholder="Nom du film ou de l'acteur" >
                            <span class="input-group-btn">
                                <input class="btn btn-default" type="submit" name="submit" value="Recherchez"> 
                            </span>
                        </div>
                    </form>
                </div>
            </header>        
            <section>      
                <?= $content ?>
            </section> 
            <footer>
                <div class="row">
                <?php if (isset($_SESSION['admin'])): ?>                
                    <p class="col-lg-2"><a href="/critique/film/administration" class="lienMenu">Page Administration</a></p>
                    <p class="col-lg-2"><a href="/critique/film/deconnect" class="lienMenu">Déconnexion</a></p>
                    <?php else: ?>              
                    <p class="col-lg-2"><a href="/critique/film/formulaire-admin">Administration</a></p>
                    <?php                                   
                    endif;
                ?>
                </div>
                <div class="row">
                    <p class="col-lg-12 center">Ce site a été fait dans le cadre de la formation Développeur Web Junior de OpenClassrooms</p>
                </div>
            </footer>
        </div>
    </body>
</html>