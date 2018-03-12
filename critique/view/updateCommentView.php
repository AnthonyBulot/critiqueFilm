<?php $template = 'template'; ?>

<div class="row"><h2 class="col-lg-12">Modifié votre commentaire</h2></div>
<p id="note"><?= $comment['note']?></p>

<div class="row">
<form method="post" action="/critique/film/modification/commentaire/<?= $comment['id']?>/<?= $comment['post_id']?>" class="col-lg-12">
	<div class="form-group">
    	<label for="note">Note</label>
    	<input type="radio" name="note" value="1" class="radioNote">
    	<input type="radio" name="note" value="2" class="radioNote">
    	<input type="radio" name="note" value="3" class="radioNote">
    	<input type="radio" name="note" value="4" class="radioNote">
    	<input type="radio" name="note" value="5" class="radioNote">
    </div>
    <div class="form-group">
    	<label for="comment">Commentaire</label>
    	<textarea rows="10" name="content" id="comment" class="form-control"><?= $comment['content'] ?></textarea>
    </div>
    <input type="submit" name="submit" value="Envoyer" class="btn btn-default"/>
</form>
</div>

<script>
    var note = document.getElementById("note").textContent;
    var radio = document.getElementsByClassName("radioNote");
    var x = note - 1;
    var check = radio[x];
    check.setAttribute('checked', 'checked');
</script>