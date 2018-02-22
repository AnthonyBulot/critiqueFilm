<?php $template = 'template'; ?>

<form method="post" action="/critique/film/message-contact">
	<label for="name">Nom : </label><input type="text" name="name" />
	<label for="email">Adresse Mail : </label><label for=""></label><input type="email" name="email" />
	<label for="content">Message : </label><textarea name="content"></textarea>
	<input type="submit" name="submit" />
</form>
