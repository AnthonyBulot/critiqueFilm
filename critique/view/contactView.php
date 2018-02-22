<?php $template = 'template'; ?>

<p>Voici les messages reçus</p>
<label for="noRead">Message non lus seulement</label><input type="checkbox" name="noRead" />
<?php
while($data = $contact->fetch()){ ?>
	<div>
		<p><?= htmlspecialchars($data['name_user']) ?> le <?= $data['date_fr'] ?></p>
		<p><?= htmlspecialchars(substr($data['content'],0,25)) ?>...</p>
		<p><a href="/critique/film/contact/<?= $data['id']?>">Voir plus</a></p>
		<p><?= $data['read_message'] ?></p>
	</div>
<?php }