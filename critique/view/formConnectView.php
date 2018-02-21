<?php $template = 'template'; ?>
<div>
	<p>Connexion</p>
	<form method="post" action="/critique/film/connexion" class="">
		<div>
			<label>Nom d'utilisateur</label>
			<input type="text" name="user">
		</div>
    	<div>
        	<label>Mot De Passe</label>
        	<input type="password" name=password />
    	</div>
    	<input id="" type="submit" name="submit" value="Connexion"/>
	</form>
</div>
<div>
	<p>Inscription</p>
	<form method="post" action="/critique/film/inscription" class="">
		<div>
			<label>Nom d'utilisateur</label>
			<input type="text" name="user">
		</div>
		<?php
			if(isset($_GET['exist'])){ ?>
				<p>Ce nom d'utilisateur existe déjà</p>
		<?php	
			}
		?>
    	<div>
        	<label>Mot De Passe</label>
        	<input type="password" name=password />
    	</div>
    	<input id="" type="submit" name="submit" value="Inscription"/>
	</form>
</div>