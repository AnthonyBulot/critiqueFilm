<?php $template = 'template'; ?>
<div class="row">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>
  		<div class="carousel-inner">
	<?php
	while($url_image = $url->fetch()){
		if(!isset($i)){
			$i=1;
		}	
		if ($i == 1) { ?>
			<div class="carousel-item active">
      			<img class="imageHome center d-block w-100" src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>">
      			<a href="/critique/film/<?= $url_image['id'] ?>" class="lienDiapo" id="lienMaPhoto" ></a>
    		</div>
		<?php } else { ?>
			<div class="carousel-item">
      			<img class="imageHome center d-block w-100" src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>">
      			<a href="/critique/film/<?= $url_image['id'] ?>" class="lienDiapo"></a>
    		</div>
		<?php }
		$i++;
	} ?>
		</div>
  		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
   	 		<span class="sr-only">Previous</span>
  		</a>
  		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
  		</a>
	</div>
</div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$('.carousel').carousel()
</script>
