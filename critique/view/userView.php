<?php $template = 'template'; ?>

<p class="user">Nom d'utilisateur : <?= $_SESSION['name'] ?></p>
<p class="user">Adresse mail : <?= $email ?></p>
<p><a href="/critique/film/modifier/mot-de-passe">Modifier mot de passe</a></p>
<p><a href="/critique/film/modifier/email">Modifier adresse email</a></p>

<p class="center"><a href="/critique/film/utilisateur/commentaire" class="adminPage">Vos Commentaires</a></p>
