<?php $template = 'template'; ?>

<div class="row"><h2 class="col-lg-12">Voici les commentaires les plus signalés :</h2></div>

<?php
if (isset($_GET['delete']) && $_GET['delete'] == 1){ ?>
	<p>Commentaire supprimé avec succès</p>
<?php
}
elseif (isset($_GET['delete']) && $_GET['delete'] == 2){ ?>
	<p>Signalement supprimé avec succès</p>
<?php
}
while ($comment = $comments->fetch())
{
?>
	<div class="row commentaire">
        <div class="row"><p class="col-lg-12">Commentaire sur : <a href="/critique/film/<?= $movie[$comment['post_id']]['post_id'] ?>" class="commentUser"><?= $movie[$comment['post_id']]['title'] ?></a></p></div>
    	<div class="row"><p class="col-lg-12 author"><strong class="author"><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_datefr'] ?></p></div>
        <div class="row"><p class="col-lg-12">Note: <?= $comment['note'] ?>/5</p></div>
    	<div class="row"><p class="col-lg-12"><?= nl2br(htmlspecialchars($comment['content'])) ?></p></div>
    	<div class="row"><p class="col-lg-12">A été signaler <span class="report"><?= $comment['report'] ?></span> fois</p></div>
        <div class="row">
    	   <p class="col-lg-2"><a href="/critique/film/suprimer/commentaire/<?= $comment['id'] ?>">Supprimer le commentaire</a></p>
    	   <p class="col-lg-2"><a href="/critique/film/suprimer/signalement/<?= $comment['id'] ?>">Enlever les signalements</a></p>
        </div>
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
          echo ' <a class="lienPage" href="/critique/film/'.$i.'">'.$i.'</a> ';
     }
} ?>
</p>
</div>
