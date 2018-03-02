<?php $template = 'template'; ?>

<p>Bonjour <?= $_SESSION['name'] ?></p>
<h2>Voici tous vos commentaires :</h2>
<?php 
while ($comment = $comments->fetch())
{
?>
	<div class="row commentaire">
        <div class="row"><p class="col-lg-12">Commentaire sur : <a href="/critique/film/<?= $movie[$comment['post_id']]['post_id'] ?>" class="commentUser"><?= $movie[$comment['post_id']]['title'] ?></a></p></div>
    	<div class="row"><p class="col-lg-12 author">Le <?= $comment['comment_datefr'] ?></p></div>
        <div class="row"><p class="col-lg-12">Note: <?= $comment['note'] ?>/5</p></div>
    	<div class="row"><p class="col-lg-12"><?= nl2br(htmlspecialchars($comment['content'])) ?></p></div>
    	<div class="row"><p class="col-lg-12"><a href="/critique/film/modification/commentaire-<?= $comment['id'] ?>">Modifier</a></p></div>
    </div>
<?php } ?>


<div class="row">
<p class="pagination">Page : 
<?php 
for($i=1; $i<=$numberPages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$currentPage) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }  
     else //Sinon...
     {
          echo ' <a class="lienPage" href="/critique/film/utilisateur/'.$i.'">'.$i.'</a> ';
     }
} ?>
</p>
</div>