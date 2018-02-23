<?php $template = 'template'; ?>

<p>Voici les commentaires les plus signalés :</p>
<p><a href="/critique/film/commentaire-signale">Rafraichir la page</a></p>

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
	<div>
    	<p><strong class="author"><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_datefr'] ?></p>
        <p>Note: <?= $comment['note'] ?></p>
    	<p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
    	<p>A été signaler <em class="report"><?= $comment['report'] ?></em> fois</p>
    	<a href="/critique/film/suprimer/commentaire/<?= $comment['id'] ?>">Supprimer le commentaire</a>
    	<a href="/critique/film/suprimer/signalement/<?= $comment['id'] ?>">Enlever les signalements</a>
    </div>
<?php
}

echo '<p>Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$numberPages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$currentPage) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }  
     else //Sinon...
     {
          echo ' <a href="/blog/liste-signalement/page-'.$i.'">'.$i.'</a> ';
     }
}

