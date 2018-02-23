<?php $template = 'template'; ?>
<div class="row">
	<p class="col-lg-offset-2 col-lg-1"><<</p>
	<div class="col-lg-6 image">
	<?php
	while($url_image = $url->fetch()){ ?>
		<img src="css/poster/<?= $url_image['url_image'] ?>">
	<?php } ?>
	</div>
	<p class="col-lg-1">>></p>
</div>