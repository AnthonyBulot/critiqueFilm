<?php $template = 'template'; ?>
<div class="row">
	<p class="col-lg-offset-2 col-lg-1" id="left"><<</p>
	<div class="col-lg-6 image">
	<?php
	while($url_image = $url->fetch()){
		if(!isset($i)){
			$i=1;
		}	
		if ($i == 1) { ?>
			<p class="center"><img class="imageHome diapo" id="maPhoto" src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>"></p>
		<?php } else { ?>
			<p class="center"><img class="imageHome diapo cache" src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>"></p>
		<?php }
		$i++;
	} ?>
	</div>
	<p class="col-lg-1" id="right">>></p>
</div>

<script src="js/jquery.js"></script>
<script src="js/diaporama.js"></script>
