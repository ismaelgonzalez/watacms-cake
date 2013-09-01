<h3>Fotos del Album:<?php echo $album['Album']['name'];?></h3>
	<div class="row-fluid">
		<ul class="thumbnails">
			<?php foreach($fotos as $f){ ?>
			<li>
				<div class="thumbnail">
					<img style="width: 300px; height: 200px;" src="/fotos/<?php echo $f['Photo']['album_id'].DS.$f['Photo']['pic']; ?>" alt="<?php echo $f['Photo']['title']; ?>">
					<div class="caption">
						<p>
							<?php echo $f['Photo']['title']; ?>
							<small><?php echo $f['Photo']['blurb']; ?></small>
						</p>
						<p>
							<a href="/photo/edit/<?php echo $f['Photo']['id']; ?>" class="btn btn-primary">Editar</a>
							<a href="/photo/delete/<?php echo $f['Photo']['id']; ?>" class="btn btn-danger">Borrar</a>
						</p>
					</div>
				</div>
			</li>
			<?php } ?>
		</ul>
	</div>
