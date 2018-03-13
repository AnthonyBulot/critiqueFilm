<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Critique de film</title>
        <link href="css/style/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
        <link href="css/style/style.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="css/favicon.png" />
    </head>
        
    <body>
        <div class="container">
            <header>
                <div class="row">
                    <p class="col-lg-2 col-md-2 col-sm-12 col-xs-12 pLogo"><img src="css/logo.png" alt="logo" class="logo" /></p>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="row">
                            <p class="col-lg-2 col-md-2 col-sm-4 lienMenu"><a href="/critique/film/accueil">Accueil</a></p>
                            <p class="col-lg-2 col-md-2 col-sm-4 lienMenu"><a href="/critique/film/dernier-film">Films</a></p>
                            <p class="col-lg-2 col-md-2 col-sm-4 lienMenu"><a href="/critique/film/contact">Contact</a></p>                
                            <ul class="navigation col-lg-3 col-md-2 col-sm-4 " id="lienCategory">
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
                            <?php if (isset($_SESSION['user'])): ?>                
                            <p class="col-lg-2 col-md-2 col-sm-4 lienMenu"><a href="/critique/film/utilisateur">Utilisateur</a></p>
                            <p class="col-lg-1 col-md-1 col-sm-4 lienMenu"><a href="/critique/film/deconnect">Déconnexion</a></p>
                            <?php else: ?>              
                            <p class="col-lg-3 col-md-3 col-sm-8 lienMenu"><a href="/critique/film/formulaire-connexion">Indentifiez-vous</a></p>
                            <?php                                   
                            endif;
                            ?>
                        </div>
                        <div class="row">
                            <p class="col-lg-4 col-md-6 col-sm-4 lienMenu"><a href="/critique/film/carte-cinema-paris">Cinéma Parisien</a></p>
                            <form method="post" action="/critique/film/recherche-film" class="col-lg-offset-2 col-lg-6  col-md-5 col-sm-8">
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
            <section>      
                <?= $content ?>
            </section> 
            <footer>
                <div class="row">
                    <p class="col-lg-2 col-md-2 col-sm-4 col-xs-4 lienMenu"><a href="/critique/film/accueil">Accueil</a></p>
                    <p class="col-lg-2 col-md-2 col-sm-4 col-xs-4 lienMenu"><a href="/critique/film/dernier-film">Films</a></p>
                    <p class="col-lg-2 col-md-2 col-sm-4 col-xs-4 lienMenu"><a href="/critique/film/contact">Contact</a></p> 
                <?php if (isset($_SESSION['admin'])): ?>                
                    <p class="col-lg-2 col-md-2 col-sm-4 col-xs-4 lienMenu"><a href="/critique/film/administration">Page Administration</a></p>
                    <p class="col-lg-2 col-md-2 col-sm-4 col-xs-4 lienMenu"><a href="/critique/film/deconnect">Déconnexion</a></p>
                    <?php else: ?>              
                    <p class="col-lg-2 col-md-2 col-sm-4 col-xs-4 lienMenu"><a href="/critique/film/formulaire-admin">Administration</a></p>
                    <?php                                   
                    endif;
                ?>
                </div>
                <div class="row">
                    <p class="col-lg-12 center">Ce site a été fait dans le cadre de la formation Développeur Web Junior de OpenClassrooms</p>
                </div>
            </footer>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/menu.js"></script>
    </body>
</html>