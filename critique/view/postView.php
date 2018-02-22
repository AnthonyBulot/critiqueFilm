<?php $template = 'template'; ?>


<div><img src="css/poster/<?= $post['url_image'] ?>" alt="Affiche de <?= $post['title'] ?>"/></div>
<div>
	<p><?= htmlspecialchars($post['title']) ?></p>
    <p>Sorti le : <?= $post['date_fr'] ?></p>
	<p>Note :<?= $note ?>/100</p>
	<p><?= htmlspecialchars($post['actor']) ?></p>
	<p><?= htmlspecialchars($post['description']) ?></p>
	<?php if (isset($_SESSION['admin'])) { ?>
		<a href="/critique/film/<?= $post['id'] ?>/modification">Modification</a>
		<a href="/critique/film/<?= $post['id'] ?>/suprimer">Suprimer</a>
	<?php } ?>
</div> 


<h2>Commentaire : </h2>


<?php
if (isset($report) && $report == true){
    echo '<p class="info"> Le commentaire a bien été signalé ! </p>';
}
while ($comment = $comments->fetch())
{
?>
<div>            
    <p ><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date_fr'] ?></p>
    <p>Note : <?= $comment['note'] ?>/100</p>
    <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
    <p><a href="/critique/film/<?= $post['id'] ?>/commentaire-<?= $comment['id'] ?>">Signaler</a></p>
</div>

<?php } 
if (isset($_SESSION['password']) || isset($_SESSION['admin'])){
    if(isset($_SESSION['password'])): $name = $_SESSION['password'];
    else : $name = $_SESSION['admin'];
    endif;
?>
<form method="post" action="/critique/film/<?= $post['id'] ?>/ajout-commentaire">
    <p >Ajouté un commentaire</p>
    <input type="hidden" name="author" value="<?= $name ?>" />
    <label for="note">Note de 0 à 100</label><input type="text" name="note">
    <label for="comment">Commentaire</label><textarea rows="10" name="content" id="comment"></textarea>
    <input type="submit" name="submit" value="Envoyer"/>
</form>
<?php } else { ?>
    <p>Vous devez être connecté pour mettre des commentaire !</p>
<?php
}
