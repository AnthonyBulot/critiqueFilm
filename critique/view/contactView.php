<?php $template = 'template'; ?>

<div class="row"><h2 class="col-lg-12">Voici les messages reçus</h2></div>

<div class="form-check">
	<input type="checkbox" name="noRead" class="form-check-input" id="checkbox" />
	<label for="noRead" class="form-check-label">Message non lus seulement</label>
</div>

<table id="table_id" class="table">
    <thead class="thead-light">
        <tr>
            <th>Nom</th>
            <th>Date</th>
            <th>Message</th>
            <th>Voir le message</th>
            <th>Supprimer</th>
            <th>Lu</th>
        </tr>
    </thead>
    <tbody>
<?php
while($data = $contact->fetch()){ ?>
		<tr class="messages">
			<th class="tdata"><?= htmlspecialchars($data['name_user']) ?></th> 
			<th class="tdata"><?= $data['date_fr'] ?></th>
			<th class="tdata"><?= htmlspecialchars(substr($data['content'],0,50)) ?>...</th>
			<th class="tdata"><a class="tdata" href="/critique/film/contact/<?= $data['id']?>">Voir plus</a></th>
			<th class="tdata"><a class="tdata" href="/critique/film/contact/delete/<?= $data['id'] ?>">Suprimer</a></th>
			<th class="read"><?= $data['read_message'] ?></th>
		</tr>
<?php } ?>
	</tbody>
</table>
<script   src="https://code.jquery.com/jquery-3.3.1.slim.min.js"   integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="   crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            language: {
                processing:     "Traitement en cours...",
                search:         "Rechercher&nbsp;:",
                lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first:      "Premier",
                    previous:   "Pr&eacute;c&eacute;dent",
                    next:       "Suivant",
                    last:       "Dernier"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
    } );
</script>
<script src="js/message.js"></script>
