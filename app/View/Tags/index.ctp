<h3>Administrar Tags</h3>

<h4><a href="/tags/add">Agregar un Tag</a></h4>

<?php if (sizeof($tags) < 1) {
	echo "<h5>Por el momento no hay tags disponibles</h5>";
} else { ?>
<table class="table table-striped table-condensed table-hover">
	<thead>
	<tr>
		<th>ID</th>
		<th>Tag</th>
		<th>&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tags as $tag) { ?>
	<tr>
		<td>
			<?php echo $tag['Tag']['id']; ?>
		</td>
		<td>
			<?php echo $tag['Tag']['tag']; ?>
		</td>
		<td>
			<a href="/tags/edit/<?php echo $tag['Tag']['id']; ?>"><i class="icon-edit" data-toggle="tooltip" title="Editar Tag"></i></a> |
			<i class="icon-remove-sign delete" onclick="borrar(<?php echo $tag['Tag']['id']; ?>)" data-toggle="tooltip" title="Borrar Tag"></i>
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

	function borrar(tag_id) {
		var choice = confirm("¿Estas seguro que quieres borrar este tag?");

		if (choice) {
			window.open('/tags/delete/'+tag_id, '_parent');
		}
	}
</script>