<?php $template = 'template'; ?>
<div class="row">
	<form method="post" action="/critique/film/connexion-admin" class="col-lg-5">
		<div class="form-group">
			<label for="user">Nom d'utilisateur</label>
			<input type="text" name="user" class="form-control" />
		</div>
    	<div class="form-group">
     	    <label for="password">Mot De Passe</label>
        	<input type="password" name=password class="form-control"/>
    	</div>
    	<div class="g-recaptcha" data-sitekey="6Lezm0wUAAAAAHJRZ7aCsi1EG6fH9o03yQrMWDDQ"></div>
    	<input class="btn btn-default" type="submit" name="submit" value="Connexion"/>
	</form>
</div>
