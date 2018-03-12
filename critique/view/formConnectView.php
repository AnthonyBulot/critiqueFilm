<?php $template = 'template'; ?>

<div class="row">
	<div class="col-lg-6">
		<h2>Connexion</h2>
		<form method="post" action="/critique/film/connexion" class="">
			<div class="form-group">
				<label for="user">Nom d'utilisateur</label>
				<input type="text" name="user" class="form-control" />
			</div>
    		<div class="form-group">
        		<label for="password">Mot De Passe</label>
        		<input type="password" name=password class="form-control" />
    		</div>
	    	<input type="submit" name="submit" value="Connexion" class="btn btn-default"/>
		</form>
	</div>
	<div class="col-lg-6">
		<h2>Inscription</h2>
		<form method="post" action="/critique/film/inscription" id="form">
			<div class="form-group">
				<label for="user">Nom d'utilisateur</label>
				<input type="text" name="user" class="form-control" />
			</div>
			<?php
				if(isset($_GET['exist'])){ ?>
					<p>Ce nom d'utilisateur existe déjà</p>
			<?php	
				}
			?>
    		<div class="form-group">
        		<label for="password">Mot De Passe</label>
        		<input type="password" name="password" class="form-control" id="mdp" />
        		<p id="aideMdp"></p>
        		<p id="aide" class="noSubmit"></p>
    		</div>
    		<div class="form-group">
        		<label for="password">Répété le Mot De Passe</label>
        		<input type="password" name="password2" class="form-control" id="mdp2" />
        		<p id="MdpIdentique" class="noSubmit"></p>
    		</div>
    		   <div class="form-group">
        		<label for="email">Email</label>
        		<input type="email" name="email" class="form-control" id="email" />
        		<p id="aideEmail" class="noSubmit"></p>
    		</div>
    		<input type="submit" name="submit" value="Inscription" class="btn btn-default"/>
		</form>
	</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/formVerify.js"></script>
<script>
	$(document).ready(function(){
		var verify = Object.create(formVerify);
		verify.passwordLength("mdp", "aideMdp");
		verify.passwordCorrect("mdp", "aide");
		verify.passwordEqual("mdp", "mdp2", "MdpIdentique");
		verify.email("email", "aideEmail");
		verify.submit("form", "aideMdp", "noSubmit");
	});
</script>