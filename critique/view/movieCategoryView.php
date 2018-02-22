<?php $template = 'template'; 

while($data = $posts->fetch()){
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


echo '<p class="numberPages">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$numberPages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$currentPage) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }	
     else //Sinon...
     {
          echo ' <a class="lienPage" href="/critique/film/'.$i.'">'.$i.'</a> ';
     }
}

