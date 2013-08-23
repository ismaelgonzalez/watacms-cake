<h4>Agregar Fotos</h4>

<?php
echo $this->Form->create('Photo', array('type'=>'file', 'id'=>'addPhoto'));
if (sizeof($albums) == 1) {
    echo $this->Form->input('album_select', array(
        'label' => 'Album',
        'options' => array(
            $albums
        ),
        'default' => $album_id,
        'disabled' => true,
        'empty' => array(0 => '-- Elige un album --'),
    ));
    echo $this->Form->input('album_id', array(
        'type' => 'hidden',
        'default' => $album_id,
    ));
} else {
    echo $this->Form->input('album_id', array(
        'label' => 'Album',
        'options' => array(
            $albums
        ),
        'default' => $album_id,
        'empty' => array(0 => '-- Elige un album --'),
    ));
}

?>
<h5>Foto 1</h5>
<div class="fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="fileupload-new">Select image</span>
            <span class="fileupload-exists">Change</span>
            <input type="file" id="pic1" name="data[Photo][pic1]"/>
        </span>
        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title1', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb1', array('label' => 'Blurb', 'type' => 'text', "class" => "span6 input-large"));
echo "<hr>";
?>
<h5>Foto 2</h5>
<div class="fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="fileupload-new">Select image</span>
            <span class="fileupload-exists">Change</span>
            <input type="file" id="pic1" name="data[Photo][pic2]"/>
        </span>
        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title2', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb2', array('label' => 'Blurb', 'type' => 'text', "class" => "span6 input-large"));
echo "<hr>";
?>
<h5>Foto 3</h5>
<div class="fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="fileupload-new">Select image</span>
            <span class="fileupload-exists">Change</span>
            <input type="file" id="pic1" name="data[Photo][pic3]"/>
        </span>
        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title3', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb3', array('label' => 'Blurb', 'type' => 'text', "class" => "span6 input-large"));
echo "<hr>";
?>
<h5>Foto 4</h5>
<div class="fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="fileupload-new">Select image</span>
            <span class="fileupload-exists">Change</span>
            <input type="file" id="pic1" name="data[Photo][pic4]"/>
        </span>
        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title4', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb4', array('label' => 'Blurb', 'type' => 'text', "class" => "span6 input-large"));
echo "<hr>";
?>
<h5>Foto 5</h5>
<div class="fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="fileupload-new">Select image</span>
            <span class="fileupload-exists">Change</span>
            <input type="file" id="pic1" name="data[Photo][pic5]"/>
        </span>
        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title5', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb5', array('label' => 'Blurb', 'type' => 'text', "class" => "span6 input-large"));
echo "<hr>";

echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fileupload").fileupload();
    });
</script>