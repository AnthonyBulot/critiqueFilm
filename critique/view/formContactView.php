<?php $template = 'template'; ?>
<div class="row">
	<form method="post" action="/critique/film/message-contact" class="col-lg-12" id="form">
		<div class="form-group">
			<label for="name">Nom : </label>
			<input type="text" name="name" class="form-control" />
		</div>
		<div class="form-group">
			<label for="email">Adresse Mail : </label>
			<input type="email" name="email" class="form-control" id="courriel" />
			<p id="aideCourriel" class="noSubmit"></p>
		</div>
		<div class="form-group">
			<label for="content">Message : </label>
			<textarea name="content" class="form-control" rows="10"></textarea>
		</div>
		<input type="submit" name="submit" value="Envoyez" class="btn btn-default" />
	</form>
</div>


<script src="js/jquery.js"></script>
<script src="js/formVerify.js"></script>
<script>
	$(document).ready(function(){
    	var verify = Object.create(formVerify);
    	verify.email("courriel", "aideCourriel");
    	verify.submit("form", null, "noSubmit");
	});
</script>