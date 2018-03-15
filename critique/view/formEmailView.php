<?php $template = 'template'; ?>

<div class="row">
	<form method="post" action="/critique/film/modifier/email/reussi" class="col-lg-5" id="formEmail">
		<div class="form-group">
			<label for="email">Ancienne adresse mail</label>
			<input type="email" name="email" class="form-control" id="emailPast" />
			<p id="aideEmailPast" class="noSubmit"></p>
		</div>
    	<div class="form-group">
     	    <label for="email2">Nouvelle adresse mail</label>
        	<input type="email" name=email2 class="form-control" id="emailNew" />
        	<p id="aideEmailNew" class="noSubmit"></p>
    	</div>
    	<input class="btn btn-default" type="submit" name="submit" value="Modifiez"/>
	</form>
</div>
<script src="js/jquery.js"></script>
<script src="js/formVerify.js"></script>
<script>
	$(document).ready(function(){
    	var verify = Object.create(formVerify);
    	verify.email("emailPast", "aideEmailPast");
    	verify.email("emailNew", "aideEmailNew");
    	verify.submit("formEmail", null, "noSubmit");
	});
</script>