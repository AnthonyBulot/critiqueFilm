<?php $template = 'template'; ?>
	<div id="carousel-critique" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carousel-critique" data-slide-to="0" class="active"></li>
    		<li data-target="#carousel-critique" data-slide-to="1"></li>
    		<li data-target="#carousel-critique" data-slide-to="2"></li>
  		</ol>
  		<div class="carousel-inner" role="listbox">
	<?php
	while($url_image = $url->fetch()){
		if(!isset($i)){
			$i=1;
		}	
		if ($i == 1) { ?>
			<div class="center carousel-item active">
      			<img class="imageHome d-block w-100" src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>">
    		</div>
		<?php } else { ?>
			<div class="center carousel-item">
      			<img class="imageHome d-block w-100" src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>">
    		</div>
		<?php }
		$i++;
	} ?>
		</div>
  		<a class="carousel-control-prev" href="#carousel-critique" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
   	 		<span class="sr-only">Précédent</span>
  		</a>
  		<a class="carousel-control-next" href="#carousel-critique" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Suivant</span>
  		</a>
	</div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$('.carousel').carousel()
</script>
