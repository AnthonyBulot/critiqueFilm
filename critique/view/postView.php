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
if (isset($_GET['report']) && $_GET['report'] == true){
    echo '<p class="info"> Le commentaire a bien été signalé ! </p>';
}
while ($comment = $comments->fetch())
{

?>
<div>            
    <p ><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date_fr'] ?></p>
    <p><?= $comment['note'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
    <p><a href="/critique/film/report/commentaire/<?= $comment['id'] ?>/<?= $post['id'] ?>">Signaler</a></p>
    <?php if (isset($_SESSION['name']) && $comment['author'] == $_SESSION['name']){ ?>
    <p><a href="/critique/film/modification/commentaire-<?= $comment['id'] ?>">Modifier</a></p>
    <?php }
    ?>
</div>

<?php } 
if (isset($_SESSION['name'])){
    if(!array_key_exists($_SESSION['name'], $author)){
?>
        <form method="post" action="/critique/film/<?= $post['id'] ?>/ajout-commentaire">
            <p >Ajouté un commentaire</p>
            <input type="hidden" name="author" value="<?= $_SESSION['name'] ?>" />
            <label for="note">Note</label>
            <input type="radio" name="note" value="20">
            <input type="radio" name="note" value="40">
            <input type="radio" name="note" value="60">
            <input type="radio" name="note" value="80">
            <input type="radio" name="note" value="100">
            <label for="comment">Commentaire</label><textarea rows="10" name="content" id="comment"></textarea>
            <input type="submit" name="submit" value="Envoyer"/>
        </form>
    <?php } else { ?>
            <p>Vous avez déjà commenté</p>
    <?php }
} else { ?>
    <p>Vous devez être connecté pour mettre des commentaire !</p>
<?php
}
