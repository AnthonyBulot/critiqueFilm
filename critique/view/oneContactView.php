<?php $template = 'template'; ?>
<p><a href="/critique/film/admin-contact">Précédent</a></p>

<div class="row">
	<p class="col-lg-4"><?= htmlspecialchars($contact['name_user']) ?> le <?= $contact['date_fr'] ?></p>
	<p class="col-lg-4"><?= htmlspecialchars($contact['email']) ?></p>
</div>
<p><?= htmlspecialchars($contact['content']) ?></p>
<p><a href="/critique/film/contact/delete/<?= $contact['id'] ?>">Suprimer</a></p>
