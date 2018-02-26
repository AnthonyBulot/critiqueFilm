<?php $template = 'template'; ?>

<div class="row"><h2 class="col-lg-12">Voici les messages reçus</h2></div>

<div class="form-check">
	<input type="checkbox" name="noRead" class="form-check-input" id="checkbox" />
	<label for="noRead" class="form-check-label">Message non lus seulement</label>
</div>

<?php
while($data = $contact->fetch()){ ?>
	<div class="row messages">
		<p class="col-lg-3"><?= htmlspecialchars($data['name_user']) ?> le <?= $data['date_fr'] ?></p>
		<p class="col-lg-7"><?= htmlspecialchars(substr($data['content'],0,50)) ?>...</p>
		<p class="col-lg-2"><a href="/critique/film/contact/<?= $data['id']?>">Voir plus</a></p>
		<p class="read"><?= $data['read_message'] ?></p>
	</div>
<?php } ?>

<script src="js/message.js"></script>