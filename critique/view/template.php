<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Critique de film</title>
        <link href="css/style/bootstrap.min.css" rel="stylesheet" />
        <link href="css/style/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div class="container">
            <header>
                <div class="row">
                    <p class="col-lg-2 col-md-2 col-sm-12 col-xs-12 "><img src="css/logo.png" alt="logo" /></p>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="row">
                            <a href="/critique/film/accueil" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 lienMenu">Accueil</a>
                            <a href="/critique/film/dernier-film" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 lienMenu">Films</a>
                            <ul class="navigation col-lg-3 col-md-2 col-sm-3 col-xs-4 " id="lienCategory">
                                <li class="toggleSubMenu lienMenu"><span>Catégorie</span>
                                    <ul class="subMenu">
                                        <li><a href="/critique/film/category/Action">Action</a></li>
                                        <li><a href="/critique/film/category/Aventure">Aventure</a></li>
                                        <li><a href="/critique/film/category/Comedie">Comedie</a></li>
                                        <li><a href="/critique/film/category/Drame">Drame</a></li>
                                        <li><a href="/critique/film/category/Famille">Famille</a></li>
                                        <li><a href="/critique/film/category/Fantastique">Fantastique</a></li>
                                        <li><a href="/critique/film/category/Hero">Hero</a></li>
                                        <li><a href="/critique/film/category/Histoire">Histoire</a></li>
                                        <li><a href="/critique/film/category/Horreur">Horreur</a></li>
                                        <li><a href="/critique/film/category/Policier">Policier</a></li>
                                        <li><a href="/critique/film/category/Science-Fiction">Science-Fiction</a></li>
                                        <li><a href="/critique/film/category/Romantique">Romantique</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <p class="col-lg-2 col-md-2 col-sm-2 col-xs-4 lienMenu"><a href="/critique/film/contact">Contact</a></p>                
                            <?php if (isset($_SESSION['user'])): ?>                
                            <a href="/critique/film/utilisateur" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 lienMenu">Utilisateur</a>
                            <a href="/critique/film/deconnect" class="col-lg-1 col-md-1 col-sm-2 lienMenu">Déconnexion</a>
                            <?php else: ?>              
                            <a href="/critique/film/formulaire-connexion" class="col-lg-3 col-md-3 col-sm-3 col-xs-4 lienMenu">Indentifiez-vous</a>
                            <?php                                   
                            endif;
                            ?>
                        </div>
                        <div class="row">
                            <p class="col-lg-4 col-md-6 col-sm-4 col-xs-6 lienMenu"><a href="/critique/film/carte-cinema-paris">Cinéma Parisien</a></p>
                            <form method="post" action="/critique/film/recherche-film" class="col-lg-offset-2 col-lg-6  col-md-5 col-sm-6 col-xs-6">
                                <div class="input-group">
                                    <input class="form-control" type="search" name="search" placeholder="Nom du film ou de l'acteur" >
                                    <span class="input-group-btn">
                                        <input class="btn btn-default" type="submit" name="submit" value="Recherchez"> 
                                    </span>
                                </div>
                            </form>
                        </div>                   
                    </div>
                </div>    

            </header>  
            <script src="js/jquery.js"></script>
            <script src="js/menu.js"></script>
            <section>      
                <?= $content ?>
            </section> 
            <footer>
                <div class="row">
                    <a href="/critique/film/accueil" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Accueil</a>
                    <a href="/critique/film/dernier-film" class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Films</a>
                    <p class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="/critique/film/contact">Contact</a></p> 
                <?php if (isset($_SESSION['admin'])): ?>                
                    <p class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="/critique/film/administration" class="lienMenu">Page Administration</a></p>
                    <p class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="/critique/film/deconnect" class="lienMenu">Déconnexion</a></p>
                    <?php else: ?>              
                    <p class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><a href="/critique/film/formulaire-admin">Administration</a></p>
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