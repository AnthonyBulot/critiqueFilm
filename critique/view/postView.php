<?php $template = 'template'; ?>

<div class="row">
    <div class="col-lg-4"><img class="imagePost img-thumbnail" src="css/poster/<?= $post['url_image'] ?>" alt="Affiche de <?= $post['title'] ?>"/></div>
    <div class="col-lg-8">
	    <h2><?= htmlspecialchars($post['title']) ?></h2>
        <p>Sortie le : <?= $post['date_fr'] ?></p>
        <div class="row">
            <p class="col-lg-4"> Note : <?= $post['note'] ?>/5</p>
            <p class="col-lg-8">Avec : <?= htmlspecialchars($post['actor']) ?></p>
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

<div class="row"><h2 class="col-lg-12 titre">Commentaires : </h2></div>


<?php
if (isset($_GET['report']) && $_GET['report'] == true){
    echo '<p> Le commentaire a bien été signalé ! </p>';
}
while ($comment = $comments->fetch())
{

?>
<div class="row commentaire">            
    <div class="row"><p class="col-lg-12 author"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date_fr'] ?></p></div>
    <div class="row"><p class="col-lg-12"class="col-lg-12">Note : <?= $comment['note'] ?>/5</p></div>
    <div class="row"><p class="col-lg-12"><?= nl2br(htmlspecialchars($comment['content'])) ?></p></div>
    <div class="row">
    <p class="col-lg-1"><a href="/critique/film/report/film-<?= $post['id'] ?>/commentaire-<?= $comment['id'] ?>">Signaler</a></p>
    <?php if (isset($_SESSION['name']) && $comment['author'] == $_SESSION['name']){ ?>
    <p class="col-lg-1"><a href="/critique/film/modification/commentaire-<?= $comment['id'] ?>">Modifier</a></p>
    <?php }
    ?>
    </div>
</div>
<?php } ?>
<div class="row"><h3 class="col-lg-12">Ajouter un commentaire</h3></div>
<?php
if (isset($_SESSION['name'])){
    if(!isset($author) || (isset($author) && !array_key_exists($_SESSION['name'], $author))){ ?>   
        <div class="row">  
            <form method="post" action="/critique/film/<?= $post['id'] ?>/ajout-commentaire" class="col-lg-5" />
                <input type="hidden" name="author" value="<?= $_SESSION['name'] ?>" />
                <div class="form-group">
                    <label for="note">Note</label>
                    <input type="radio" name="note" value="1"  checked>
                    <input type="radio" name="note" value="2">
                    <input type="radio" name="note" value="3">
                    <input type="radio" name="note" value="4">
                    <input type="radio" name="note" value="5">
                </div>
                <div class="form-group">
                    <label for="comment">Commentaire</label>
                    <textarea rows="10" name="content" class="form-control"></textarea>
                </div>
                <input type="submit" name="submit" value="Envoyer" class="btn btn-default"/>
            </form>
        </div> 
    <?php } else { ?>
            <p class="col-lg-12 center comInfo">Vous avez déjà commenté</p>
    <?php }
} else { ?>
    <p class="col-lg-12 center comInfo">Vous devez être connecté pour mettre des commentaires !</p>
<?php
} ?>
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
          echo ' <a class="lienPage" href="/critique/film/' . $post['id'] . '/page-'.$i.'">'.$i.'</a> ';
     }
} ?>
</p>
</div>
