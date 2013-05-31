<h2>Administrar Secciones</h2>

<h3><a href="/section/add">Agregar una Secci&oacute;n nueva</a></h3>

<table class="">
	<tr>
		<th>ID</th>
		<th>Sub-Seccion</th>
		<th>Seccion</th>
		<th>&nbsp;</th>
	</tr>
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
			<a href="/section/edit/<?php echo $section['Section']['id']; ?>"><img src="/img/edit.png" alt="Editar" height="24px" ></a> |
			<img class="img_button" src="/img/delete.png" alt="Borrar" height="24px" onclick="borrar(<?php echo $section['Section']['id']; ?>)">
		</td>
	</tr>
	<?php } ?>
</table>

<?php echo $this->Paginator->numbers(); ?>


<script type="text/javascript">
	$(document).ready(function() {

	});

	function borrar(section_id) {
		var choice = confirm("¿Estas seguro que quieres borrar esta seccion?");

		if (choice) {
			window.open('/section/delete/'+section_id, '_parent');
		}
	}
</script>