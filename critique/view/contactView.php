<?php $template = 'template'; ?>

<p>Voici les messages reçus</p>

<?php
while($data = $contact->fetch()){ ?>
	<p><?= $data['name_user'] ?> le <?= $data['date_fr'] ?></p>
	<p><?= htmlspecialchars(substr($data['content'],0,25)) ?></p>
	<p><a href="/critique/film/contact/<?= $data['id']?>">Voir plus</a></p>
	<p><?= $data['read_message'] ?></p>
<?php }