<?php $template = 'template'; ?>
<p><a href="/critique/film/admin-contact">Précédent</a></p>

<p><?= htmlspecialchars($contact['name_user']) ?> le <?= $contact['date_fr'] ?></p>
<p><?= htmlspecialchars($contact['email']) ?></p>
<p><?= htmlspecialchars($contact['content']) ?></p>
<p><a href="/critique/film/contact/delete/<?= $contact['id'] ?>">Suprimer</a></p>
