<h3>Administrar Pics</h3>
<p>Pics son posts con fotos únicas, para postear memes o fotos interesantes</p>

<h4><a href="/pic/add">Agregar un Pic nuevo</a></h4>

<?php if (sizeof($pics) < 1) {
	echo "<h5>Por el momento no hay pics disponibles</h5>";
} else { ?>
<table id="picsTable" class="table table-striped table-condensed table-hover">
	<thead>
	<tr>
		<th>ID</th>
		<th>Pic</th>
		<th>Secci&oacute;n</th>
		<th>Título</th>
		<th>&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($pics as $pic) { ?>
	<tr valign="middle">
		<td>
			<?php echo $pic['Pic']['id']; ?>
		</td>
		<td>
			<img src="/files/timthumb.php?src=/fotos/pics/<?php echo $pic['Pic']['pic']; ?>&w=80&h=60" />
		</td>
		<td>
			<?php echo $pic['Section']['name']; ?>
		</td>
		<td>
			<?php echo $pic['Pic']['title']; ?>
		</td>
		<td>
			<a href="/pic/edit/<?php echo $pic['Pic']['id']; ?>"><i class="icon-edit" data-toggle="tooltip" title="Editar Pic"></i></a> |
			<i class="icon-remove-sign delete" onclick="borrar(<?php echo $pic['Pic']['id']; ?>)" data-toggle="tooltip" title="Borrar Pic"></i>
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

	function borrar(album_id) {
		var choice = confirm("¿Estas seguro que quieres borrar este Pic?");

		if (choice) {
			window.open('/pic/delete/'+album_id, '_parent');
		}
	}
</script>