<?php $template = 'template'; 

while($data = $search->fetch()){
?>
	<div><img src="css/poster/<?= $data['url_image'] ?>" alt="Affiche de <?= $data['title'] ?>"/></div>
	<div>
		<p><?= htmlspecialchars($data['title']) ?></p>
		<p>Sorti le : <?= $data['date_fr'] ?></p>
		<p><?= htmlspecialchars($data['actor']) ?></p>
		<p><?= htmlspecialchars($data['description']) ?></p>
		<a href="/critique/film/<?= $data['id'] ?>">Commentaire</a>
		<?php if (isset($_SESSION['admin'])) { ?>
			<a href="/critique/film/<?= $data['id'] ?>/modification">Modification</a>
			<a href="/critique/film/<?= $data['id'] ?>/suprimer">Suprimer</a>
		<?php } ?>
	</div>
<?php
}
