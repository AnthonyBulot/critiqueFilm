<?php $template = 'template'; ?>

<div class="row">
	<form method="post" action="/critique/film/modifier/email/reussi" class="col-lg-5" id="formEmail">
		<div class="form-group">
			<label for="email">Ancienne adresse email</label>
			<input type="email" name="email" class="form-control" id="emailPast" />
			<p id="aideEmailPast"></p>
		</div>
    	<div class="form-group">
     	    <label for="email2">Nouvelle adresse email</label>
        	<input type="email" name=email2 class="form-control" id="emailNew" />
        	<p id="aideEmailNew"></p>
    	</div>
    	<input class="btn btn-default" type="submit" name="submit" value="Connexion"/>
	</form>
</div>
<script src="js/updateEmail.js"></script>