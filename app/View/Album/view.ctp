<h3>Fotos del Album:<?php echo $album['Album']['name'];?></h3>
	<div class="row-fluid">
		<ul class="thumbnails">
			<?php foreach($fotos as $f){ ?>
			<li>
				<div class="thumbnail">
					<img style="width: 150px; height: 100px;" src="/fotos/<?php echo $f['Photo']['album_id'].DS.'thumbs'.DS.$f['Photo']['pic']; ?>" alt="<?php echo $f['Photo']['title']; ?>">
					<div class="caption">
						<p>
							<?php echo $f['Photo']['title']; ?>
							<small><?php echo $f['Photo']['blurb']; ?></small>
						</p>
						<p>
							<a href="/photo/edit/<?php echo $f['Photo']['id']; ?>" class="btn btn-primary">Editar</a>
							<a onclick="borrar(<?php echo $f['Photo']['id']; ?>)" class="btn btn-danger">Borrar</a>
						</p>
					</div>
				</div>
			</li>
			<?php } ?>
		</ul>
        <p>
            <a href="/album/index" class="btn btn-info">Regresar</a>
        </p>
	</div>
<script type="text/javascript">
    $(document).ready(function() {

    });

    function borrar(album_id) {
        var choice = confirm("¿Estas seguro que quieres borrar esta foto?");

        if (choice) {
            window.open('/photo/delete/'+album_id, '_parent');
        }
    }
</script>