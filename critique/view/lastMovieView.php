<?php $template = 'template'; 

while($data = $posts->fetch()){
?>
	<div class="row fiche">
		<div class="col-lg-4"><img class="imagePost img-thumbnail" src="css/poster/<?= $data['url_image'] ?>" alt="Affiche de <?= $data['title'] ?>"/></div>
		<div class="col-lg-8">
			<h2><?= htmlspecialchars($data['title']) ?></h2>
			<p>Sorti le : <?= $data['date_fr'] ?></p>
			<div class="row">
				<p class="col-lg-4"> Note : <?= $data['note'] ?>/5</p>
				<p class="col-lg-8">Avec : <?= htmlspecialchars($data['actor']) ?></p>
			</div>
			<p><?= htmlspecialchars($data['description']) ?></p>
			<div class="row">
				<p class="col-lg-4"><a href="/critique/film/<?= $data['id'] ?>">Commentaire</a></p>
				<?php if (isset($_SESSION['admin'])) { ?>
					<p class="col-lg-4"><a href="/critique/film/<?= $data['id'] ?>/modification">Modification</a></p>
					<p class="col-lg-4"><a href="/critique/film/<?= $data['id'] ?>/suprimer">Suprimer</a></p>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

<div class="row">
	<p class="">Page : 
	<?php 
	for($i=1; $i<=$numberPages; $i++) //On fait notre boucle
	{
     	if($i==$currentPage) //Si il s'agit de la page actuelle...
     	{
         	echo ' [ '.$i.' ] '; 
     	}	
     	else //Sinon...
     	{
          	echo ' <a class="lienPage" href="/critique/film/'.$i.'">'.$i.'</a> ';
     	}
	} ?>
	</p>
</div>
