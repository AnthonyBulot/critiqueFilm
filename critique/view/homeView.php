<?php $template = 'template'; ?>

<p><<</p>
<div>
<?php
while($url_image = $url->fetch()){ ?>
	
	<img src="css/poster/<?= $url_image['url_image'] ?>">

<?php } ?>
</div>
<p>>></p>