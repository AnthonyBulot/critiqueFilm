<?php $template = 'template'; ?>

<form action="/critique/film/ajout-fiche-film" method="post" enctype="multipart/form-data">
	<label>Titre : </label><input type="text" name="title" /><br/>
	<label>Description : </label><br/>
	<textarea rows=8 name="description"></textarea><br/>
	<label>Acteurs Principaux : </label><input type="text" name="actor" /><br/>
	<label>Affiche du film</label><input type="file" name="poster" /><br/>
	<label>Catégorie : </label> 
	<select name="category">
		<option value="Test">Test</option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
		<option value=""></option>
	</select><br/>
	<label>Date de sortie : </label><input type="date" name="date_exit" /><br/>
	<input type="submit" name="submit" value="Ajoutez">

</form>