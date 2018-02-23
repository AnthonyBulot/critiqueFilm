<?php $template = 'template'; ?>
<div class="row">
<form action="/critique/film/ajout-fiche-film" method="post" enctype="multipart/form-data" class="col-lg-8" />
	<div class="form-group">
		<label for="title">Titre : </label>
		<input type="text" name="title" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="description">Description : </label>
		<textarea rows=8 name="description" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="actor">Acteurs Principaux : </label>
		<input type="text" name="actor" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="poster">Affiche du film</label>
		<input type="file" name="poster" />
	</div>
	<div class="form-group">
		<label for="category">Catégorie : </label> 
		<select name="category" class="form-control">
			<option value="Action">Action</option>
			<option value="Aventure">Aventure</option>
			<option value="Comedie">Comédie</option>
			<option value="Drame">Drame</option>
			<option value="Famille">Famille</option>
			<option value="Fantastique">Fantastique</option>
			<option value="Heroique">Héroïque</option>
			<option value="Histoire">Histoire</option>
			<option value="Horreur">Horreur</option>
			<option value="Policier">Policier</option>
			<option value="Science-Fiction">Science-Fiction</option>
			<option value="Romantique">Romantique</option>
		</select>
	</div>
	<div class="form-group">
		<label for="date_exit">Date de sortie : </label>
		<input type="date" name="date_exit" class="form-control" />
	</div>
	<input type="submit" name="submit" value="Ajoutez" class="btn btn-default" />
</form>
</div>