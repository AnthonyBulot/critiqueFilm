<?php $template = 'template'; ?>
	<div id="my_carousel" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
			<li data-target="#my_carousel" data-slide-to="0" class="active"></li>
			<li data-target="#my_carousel" data-slide-to="1"></li>
			<li data-target="#my_carousel" data-slide-to="2"></li>
		</ol>
  		<div class="carousel-inner">
	<?php
	while($url_image = $url->fetch()){
		if(!isset($i)){
			$i=1;
		}	
		if ($i == 1) { ?>
			<div class="item active">  
				<div class="carousel-page">
      				<img class="imageHome img-responsive" style="margin:0px auto;"  src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>">
      			</div>
    		</div>
		<?php } else { ?>
			<div class="item">   
				<div class="carousel-page">    			
					<img class="imageHome img-responsive img-rounded" style="margin:0px auto;" src="css/poster/<?= $url_image['url_image'] ?>" alt="Affiche de <?= $url_image['title'] ?>">
				</div>
    		</div>
		<?php }
		$i++;
	} ?>
		</div>
  		<a class="left carousel-control" href="#my_carousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#my_carousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/bootstrap.min.js"></script>

