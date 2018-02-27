<?php $template = 'template'; ?>
<div class="row">
	<p class="col-lg-offset-2 col-lg-1 col-md-1 col-sm-1" id="left"><<</p>
	<div class=" col-lg-6 col-md-10 col-sm-10 image">
	<?php
	while($url_image = $url->fetch()){
		if(!isset($i)){
			$i=1;
		}	
		if ($i == 1) { ?>
			<p class="center"><a href="/critique/film/<?= $url_image['id'] ?>" class="lienDiapo" id="lienMaPhoto" ><img class="imageHome diapo img-thumbnail" id="maPhoto" src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>"></a></p>
		<?php } else { ?>
			<p class="center"><a href="/critique/film/<?= $url_image['id'] ?>" class="lienDiapo"><img class="imageHome diapo cache img-thumbnail" src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>"></a></p>
		<?php }
		$i++;
	} ?>
	</div>
	<p class="col-lg-1 col-md-1 col-sm-1" id="right">>></p>
</div>

<script src="js/diaporama.js"></script>
