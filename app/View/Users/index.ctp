<h3>Administrar Usuarios</h3>

<h4><a href="/users/add">Agregar un Usuario nuevo</a></h4>

<table id="albumsTable" class="table table-striped table-condensed table-hover">
	<thead>
	<tr>
		<th>ID</th>
		<th>Album</th>
		<th>Secci&oacute;n</th>
		<th>Fecha de Publicaci&oacute;n</th>
		<th>&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $u) { ?>
	<tr>
		<td>
			<?php echo $u['User']['id']; ?>
		</td>
		<td>
			<?php echo $u['User']['last_name'].' '.$u['User']['first_name']; ?>
		</td>
		<td>
			<?php echo $u['User']['email']; ?>
		</td>
		<td>
			<?php echo $u['User']['role']; ?>
		</td>
		<td>

			<a href="/users/edit/<?php echo $u['User']['id']; ?>"><i class="icon-edit" data-toggle="tooltip" title="Editar Usuario"></i></a>
			<?php if ($this->Session->read('Auth.User') && $this->Session->read('Auth.User.role') == 'admin') { ?>
				&nbsp;|&nbsp;<i class="icon-remove-sign delete" onclick="borrar(<?php echo $u['User']['id']; ?>)" data-toggle="tooltip" title="Borrar Usuario"></i>
			<?php }?>
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

	function borrar(user_id) {
		var choice = confirm("¿Estas seguro que quieres borrar este usuario?");

		if (choice) {
			window.open('/users/delete/'+user_id, '_parent');
		}
	}
</script>