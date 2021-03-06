<?php $template = 'template'; 

while($data = $search->fetch()){
?>
	<div class="row fiche">
		<div class="col-lg-4"><img class="imagePost img-thumbnail" src="css/poster/<?= $data['url_image'] ?>" alt="Affiche de <?= $data['title'] ?>"/></div>
		<div class="col-lg-8">
			<h2><?= htmlspecialchars($data['title']) ?></h2>
			<p>Sortie le : <?= $data['date_fr'] ?></p>
			<div class="row">
				<p class="col-lg-4"> Note : <?= $data['note'] ?>/5</p>
				<p class="col-lg-8">Avec : <?= htmlspecialchars($data['actor']) ?></p>
			</div>	
			<p><?= htmlspecialchars($data['description']) ?></p>
			<div class="row">
				<p class="col-lg-2"><a href="/critique/film/<?= $data['id'] ?>">Commentaires</a></p>
				<?php if (isset($_SESSION['admin'])) { ?>
					<p class="col-lg-2"><a href="/critique/film/<?= $data['id'] ?>/modification">Modification</a></p>
					<p class="col-lg-2"><a href="/critique/film/<?= $data['id'] ?>/suprimer">Suprimer</a></p>
				<?php } ?>
			</div>
		</div>
	</div>
<?php
}
