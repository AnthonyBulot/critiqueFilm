<?php $template = 'template'; ?>

<form action="/critique/film/<?= $post['id'] ?>/modification-fiche-film" method="post" enctype="multipart/form-data">
	<label for="title">Titre : </label><input type="text" name="title" value="<?= $post['title'] ?>" /><br/>
	<label for="description">Description : </label><br/>
	<textarea rows=8 name="description"><?= $post['description'] ?></textarea><br/>
	<label for="actor">Acteurs Principaux : </label><input type="text" name="actor" value="<?= $post['actor'] ?>" /><br/>
	<label for="poster">Affiche du film</label><input type="file" name="poster" /><br/>
	<label for="category">Catégorie : </label> 
	<select name="category" value="<?= $post['category'] ?>">
		<option value="Action">Action</option>
		<option value="Aventure">Aventure</option>
		<option value="Comedie">Comedie</option>
		<option value="Drame">Drame</option>
		<option value="Famille">Famille</option>
		<option value="Fantastique">Fantastique</option>
		<option value="Hero">Hero</option>
		<option value="Histoire">Histoire</option>
		<option value="Horreur">Horreur</option>
		<option value="Policier">Policier</option>
		<option value="Science-Fiction">Science-Fiction</option>
		<option value="Romantique">Romantique</option>
	</select><br/>
	<label for="date_exit">Date de sortie : </label><input type="date" name="date_exit" /><br/>
	<input type="submit" name="submit" value="Ajoutez">
</form>