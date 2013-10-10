<h3>Administrar Videos</h3>
<h4><a href="/videos/add">Agregar un Video</a></h4>

<?php if (sizeof($videos) < 1) {
	echo "<h5>Por el momento no hay videos disponibles</h5>";
} else { ?>
<table class="table table-striped table-condensed table-hover">
	<thead>
	<tr>
		<th>ID</th>
		<th>T&iacute;tulo</th>
		<th>Secci&oacute;n</th>
		<th>Video</th>
		<th>&nbsp;</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($videos as $v) { ?>
	<tr>
		<td>
			<?php echo $v['Video']['id']; ?>
		</td>
		<td>
			<?php echo $v['Video']['title']; ?>
		</td>
		<td>
			<?php echo $v['Section']['name']; ?>
		</td>
		<td>
			<?php echo "<a href='".$v['Video']['video']."' target='_blank'>".$v['Video']['video']."</a>"; ?>
		</td>
		<td>
			<a href="/videos/edit/<?php echo $v['Video']['id']; ?>"><i class="icon-edit" data-toggle="tooltip" title="Editar Video"></i></a> |
			<i class="icon-remove-sign delete" onclick="borrar(<?php echo $v['Video']['id']; ?>)" data-toggle="tooltip" title="Borrar Video"></i>
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

	function borrar(video_id) {
		var choice = confirm("¿Estas seguro que quieres borrar este video?");

		if (choice) {
			window.open('/videos/delete/'+video_id, '_parent');
		}
	}
</script>