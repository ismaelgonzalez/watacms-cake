<h3>Administrar Encuestas</h3>


<h4><a href="/poll/add">Agregar una Encuesta nueva</a></h4>

<?php if (sizeof($polls) < 1) {
	echo "<h5>Por el momento no hay encuestas disponibles</h5>";
} else { ?>
<table id="pollsTable" class="table table-striped table-condensed table-hover">
	<thead>
	<tr>
		<th>ID</th>
		<th>Titulo</th>
		<th>&nbsp;</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($polls as $poll) { ?>
	<tr valign="middle">
		<td>
			<?php echo $poll['Poll']['id']; ?>
		</td>
		<td>
			<?php echo $poll['Poll']['title']; ?>
		</td>
		<td>
			<a href="/poll/edit/<?php echo $poll['Poll']['id']; ?>"><i class="icon-edit" data-toggle="tooltip" title="Editar Encuesta"></i></a> |
			<i class="icon-remove-sign delete" onclick="borrar(<?php echo $poll['Poll']['id']; ?>)" data-toggle="tooltip" title="Borrar Encuesta"></i> |
			<a href="/poll_answer/edit/<?php echo $poll['Poll']['id']; ?>"><i class="icon-tasks" data-toggle="tooltip" title="Editar Respuestas"></i></a>
		</td>
	</tr>
		<?php } ?>
	</tbody>
</table>
<?php } ?>

<?php echo $this->Paginator->numbers(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});
	});

	function borrar(poll_id) {
		var choice = confirm("¿Estas seguro que quieres borrar esta Encuesta?");

		if (choice) {
			window.open('/poll/delete/'+poll_id, '_parent');
		}
	}
</script>