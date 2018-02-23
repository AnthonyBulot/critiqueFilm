<?php $template = 'template'; ?>

<div class="row">
    <div class="col-lg-4"><img src="css/poster/<?= $post['url_image'] ?>" alt="Affiche de <?= $post['title'] ?>"/></div>
    <div class="col-lg-8">
	    <p><?= htmlspecialchars($post['title']) ?></p>
        <p>Sorti le : <?= $post['date_fr'] ?></p>
        <div class="row">
            <p class="col-lg-4"> Note : <?= $post['note'] ?></p>
            <p class="col-lg-8"><?= htmlspecialchars($post['actor']) ?></p>
        </div>
	    <p><?= htmlspecialchars($post['description']) ?></p>
        <div class="row">
	        <?php if (isset($_SESSION['admin'])) { ?>
		       <p class="col-lg-2"><a href="/critique/film/<?= $post['id'] ?>/modification">Modification</a></p>
		       <p class="col-lg-2"><a href="/critique/film/<?= $post['id'] ?>/suprimer">Suprimer</a></p>
	        <?php } ?>
        </div>
    </div> 
</div>

<div class="row"><h2 class="col-lg-12">Commentaire : </h2></div>


<?php
if (isset($_GET['report']) && $_GET['report'] == true){
    echo '<p> Le commentaire a bien été signalé ! </p>';
}
while ($comment = $comments->fetch())
{

?>
<div class="row">            
    <div class="row"><p class="col-lg-12"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date_fr'] ?></p></div>
    <div class="row"><p class="col-lg-12"class="col-lg-12"><?= $comment['note'] ?></p></div>
    <div class="row"><p class="col-lg-12"><?= nl2br(htmlspecialchars($comment['content'])) ?></p></div>
    <div class="row">
    <p class="col-lg-1"><a href="/critique/film/report/commentaire/<?= $comment['id'] ?>/<?= $post['id'] ?>">Signaler</a></p>
    <?php if (isset($_SESSION['name']) && $comment['author'] == $_SESSION['name']){ ?>
    <p class="col-lg-1"><a href="/critique/film/modification/commentaire-<?= $comment['id'] ?>">Modifier</a></p>
    <?php }
    ?>
    </div>
</div>
<?php } ?>
<div class="row"><h3 class="col-lg-12">Ajouté un commentaire</h3></div>
<?php
if (isset($_SESSION['name'])){
    if(!isset($author) || (isset($author) && !array_key_exists($_SESSION['name'], $author))){ ?>   
        <div class="row">  
            <form method="post" action="/critique/film/<?= $post['id'] ?>/ajout-commentaire" class="col-lg-5" />
                <input type="hidden" name="author" value="<?= $_SESSION['name'] ?>" />
                <div class="form-group">
                    <label for="note">Note</label>
                    <input type="radio" name="note" value="20">
                    <input type="radio" name="note" value="40">
                    <input type="radio" name="note" value="60">
                    <input type="radio" name="note" value="80">
                    <input type="radio" name="note" value="100">
                </div>
                <div class="form-group">
                    <label for="comment">Commentaire</label>
                    <textarea rows="10" name="content" class="form-control"></textarea>
                </div>
                <input type="submit" name="submit" value="Envoyer" class="btn btn-default"/>
            </form>
        </div> 
    <?php } else { ?>
            <p class="col-lg-12">Vous avez déjà commenté</p>
    <?php }
} else { ?>
    <p class="col-lg-12">Vous devez être connecté pour mettre des commentaire !</p>
<?php
}
