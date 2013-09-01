<h3>Administrar Albums</h3>

<h4><a href="/album/add">Agregar un Album nuevo</a></h4>

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
		<?php foreach ($albums as $album) { ?>
			<tr>
				<td>
					<?php echo $album['Album']['id']; ?>
				</td>
				<td>
					<?php echo $album['Album']['name']; ?>
				</td>
				<td>
					<?php echo $album['Section']['name']; ?>
				</td>
				<td>
					<?php echo date("d/m/Y H:i:s", strtotime($album['Album']['published_date'].' '.$album['Album']['published_time'])); ?>
				</td>
				<td>
					<a href="/album/edit/<?php echo $album['Album']['id']; ?>"><i class="icon-edit" data-toggle="tooltip" title="Editar Album"></i></a> |
					<i class="icon-remove-sign delete" onclick="borrar(<?php echo $album['Album']['id']; ?>)" data-toggle="tooltip" title="Borrar Album"></i> |
					<a href="/photo/add/<?php echo $album['Album']['id']; ?>"><i class="icon-camera" data-toggle="tooltip" title="Agregar Foto"></i></a>
					<?php //if(sizeof($album)) ?>
					|
					<a href="/album/view/<?php echo $album['Album']['id']; ?>"><i class="icon-picture" data-toggle="tooltip" title="Ver fotos"></i></a>
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

    function borrar(album_id) {
        var choice = confirm("¿Estas seguro que quieres borrar este album?");

        if (choice) {
            window.open('/album/delete/'+album_id, '_parent');
        }
    }
</script>