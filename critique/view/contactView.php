<?php $template = 'template'; ?>

<div class="row"><h2 class="col-lg-12">Voici les messages reçus</h2></div>

<div class="form-check">
	<input type="checkbox" name="noRead" class="form-check-input" id="checkbox" />
	<label for="noRead" class="form-check-label">Message non lus seulement</label>
</div>

<table id="example" class="table" cellspacing="0">
    <thead class="thead-light">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Date</th>
            <th scope="col">Message</th>
        </tr>
    </thead>
    <tbody>
<?php
while($data = $contact->fetch()){ ?>
		<tr class="messages">
			<th scope="col"><?= htmlspecialchars($data['name_user']) ?></th> 
			<th scope="col"><?= $data['date_fr'] ?></th>
			<th scope="col"><?= htmlspecialchars(substr($data['content'],0,50)) ?>...</th>
			<th scope="col"><a href="/critique/film/contact/<?= $data['id']?>">Voir plus</a></th>
			<th scope="col"><a href="/critique/film/contact/delete/<?= $data['id'] ?>">Suprimer</a></th>
			<th scope="col" class="read"><?= $data['read_message'] ?></th>
		</tr>
<?php } ?>
	</tbody>
</table>
<script src="js/message.js"></script>
<script src="js/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#example').DataTable();
	} );
</script>
