<h3>Administrar Secciones</h3>

<h4><a href="/section/add">Agregar una Secci&oacute;n nueva</a></h4>

<table class="table table-striped table-condensed table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Sub-Seccion</th>
			<th>Seccion</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($sections as $section) { ?>
			<tr>
				<td>
					<?php echo $section['Section']['id']; ?>
				</td>
				<td>
					<?php echo $section['Section']['parent_section']; ?>
				</td>
				<td>
					<?php echo $section['Section']['name']; ?>
				</td>
				<td>
					<a href="/section/edit/<?php echo $section['Section']['id']; ?>"><i class="icon-edit" data-toggle="tooltip" title="Editar Sección"></i></a> |
					<i class="icon-remove-sign delete" onclick="borrar(<?php echo $section['Section']['id']; ?>)" data-toggle="tooltip" title="Borrar Sección"></i>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<?php echo $this->Paginator->numbers(); ?>


<script type="text/javascript">
	$(document).ready(function() {
        $("[data-toggle=tooltip]").tooltip({placement: 'right'});
	});

	function borrar(section_id) {
		var choice = confirm("¿Estas seguro que quieres borrar esta seccion?");

		if (choice) {
			window.open('/section/delete/'+section_id, '_parent');
		}
	}
</script>