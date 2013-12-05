<h3>Administrar Notas</h3>

<h4><a href="/articles/add">Agregar una Nota Nueva</a></h4>

<?php if (sizeof($articles) < 1) {
	echo "<h5>Por el momento no hay notas disponibles</h5>";
} else { ?>
<table class="table table-striped table-condensed table-hover" border="0">
	<thead>
		<tr>
			<th>ID</th>
			<th>Título</th>
			<th>Sección</th>
			<th>Fecha de Publicación</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($articles as $a) { ?>
			<tr>
				<td>
					<a href="/articles/edit/<?php echo $a['Article']['id']; ?>"><?php echo $a['Article']['id']; ?></a>
				</td>
				<td>
					<a href="/articles/edit/<?php echo $a['Article']['id']; ?>"><?php echo $a['Article']['title']; ?></a>
				</td>
				<td>
					<?php echo $a['Section']['name']; ?>
				</td>
				<td>
					<?php echo date('d-m-Y H:i', strtotime($a['Article']['published_date'].' '.$a['Article']['published_time'])); ?>
				</td>
				<td>
					<?php echo $this->Status->getStatus($a['Article']['status']); ?>
				</td>
				<td>
					<a href="/articles/edit/<?php echo $a['Article']['id']; ?>"><i class="icon-edit" data-toggle="tooltip" title="Editar Nota"></i></a>&nbsp;|&nbsp;
					<i class="icon-remove-sign delete" onclick="borrar(<?php echo $a['Article']['id']; ?>)" data-toggle="tooltip" title="Borrar Nota"></i></a>&nbsp;|&nbsp;
					<a href="#details"><i class="icon-file-text" data-toggle="tooltip" title="Ver detalles de Nota"></i></a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php } ?>

<?php echo $this->paginator->numbers(); ?>

<style type="text/css">
	th{
		width: 16%;
	}
</style>
<script type="text/javascript">
	$(document).ready(function () {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});
	});

	function borrar(article_id) {
        var choice = confirm("¿Estas seguro que quieres borrar esta nota?");

        if (choice) {
            window.open('/articles/delete/'+article_id, '_parent');
        }
    }
</script>