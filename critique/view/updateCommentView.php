<?php $template = 'template'; ?>

<p >Modifié votre commentaire</p>
<p><?= $comment['note']?></p>

<form method="post" action="/critique/film/modification/commentaire/<?= $comment['id']?>/<?= $comment['post_id']?>">
    <label for="note">Note</label>
    <input type="radio" name="note" value="20">
    <input type="radio" name="note" value="40">
    <input type="radio" name="note" value="60">
    <input type="radio" name="note" value="80">
    <input type="radio" name="note" value="100">
    <label for="comment">Commentaire</label>
    <textarea rows="10" name="content" id="comment"><?= $comment['content'] ?></textarea>
    <input type="submit" name="submit" value="Envoyer"/>
</form>