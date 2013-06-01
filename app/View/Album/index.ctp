<h2>Administrar Albums</h2>

<h3><a href="/album/add">Agregar un Album nuevo</a></h3>

<table class="">
    <tr>
        <th>ID</th>
        <th>Album</th>
        <th>Secci&oacute;n</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($albums as $album) { ?>
    <tr>
        <td>
            <?php echo $album['Album']['id']; ?>
        </td>
        <td>
            <?php echo $album['Album']['name']; ?>
        </td>
        <td>
            <?php echo $album['Album']['section_id']; ?>
        </td>
        <td>
            <a href="/album/edit/<?php echo $album['Album']['id']; ?>"><img src="/img/edit.png" alt="Editar" height="24px" ></a> |
            <img class="img_button" src="/img/delete.png" alt="Borrar" height="24px" onclick="borrar(<?php echo $album['Album']['id']; ?>)">
        </td>
    </tr>
    <?php } ?>
</table>

<?php echo $this->Paginator->numbers(); ?>


<script type="text/javascript">
    $(document).ready(function() {

    });

    function borrar(album_id) {
        var choice = confirm("¿Estas seguro que quieres borrar este album?");

        if (choice) {
            window.open('/album/delete/'+album_id, '_parent');
        }
    }
</script>