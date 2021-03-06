<?php $template = 'template'; ?>

<div class="row">
	<form method="post" action="/critique/film/modifier/mot-de-passe/reussi" class="col-lg-5" id="formPassword">
		<div class="form-group">
			<label for="password">Ancien mot de passe</label>
			<input type="password" name="password" class="form-control" />
		</div>
		<div class="form-group">
			<label for="passwordNew">Nouveau mot de passe</label>
			<input type="password" name="passwordNew" class="form-control" id="newPassword" />
			<p id="aide1"></p>
			<p id="aide2" class="noSubmit"></p>
		</div>
    	<div class="form-group">
     	    <label for="passwordNew2">Répéter le nouveau mot de passe</label>
        	<input type="password" name="passwordNew2" class="form-control" id="newPassword2" />
        	<p id="newMdpIdentique" class="noSubmit"></p>
    	</div>
    	<input class="btn btn-default" type="submit" name="submit" value="Modifiez"/>
	</form>
</div>
<script src="js/jquery.js"></script>
<script src="js/formVerify.js"></script>
<script>
	$(document).ready(function(){
    	var verify = Object.create(formVerify);
    	verify.passwordLength("newPassword", "aide1");
    	verify.passwordCorrect("newPassword", "aide2");
    	verify.passwordEqual("newPassword", "newPassword2", "newMdpIdentique");
    	verify.submit("formPassword", "aide1", "noSubmit");
	});
</script>
