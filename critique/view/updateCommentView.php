<?php $template = 'template'; ?>

<div class="row"><h2 class="col-lg-12">Modifié votre commentaire</h2></div>
<p><?= $comment['note']?></p>

<div class="row">
<form method="post" action="/critique/film/modification/commentaire/<?= $comment['id']?>/<?= $comment['post_id']?>" class="col-lg-12">
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
    	<textarea rows="10" name="content" id="comment" class="form-control"><?= $comment['content'] ?></textarea>
    </div>
    <input type="submit" name="submit" value="Envoyer" class="btn btn-default"/>
</form>
</div>