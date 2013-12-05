<h3>Agregar Nota</h3>
<?php
$this->TinyMCE->editor(array('theme' => 'advanced', 'mode' => 'textareas', 'theme_advanced_toolbar_location' => 'top', 'theme_advanced_buttons3' => ''));

echo $this->Form->Create('Article', array('type' => 'file'));
echo $this->Form->input('section_id', array(
	'label' => 'Sección',
	'options' => array($sections),
	'empty' => array('-- Elige una sección --'),
));
echo $this->Form->input('title', array('label' => 'T&iacute;tulo', 'class' => 'span4'));
echo $this->Form->input('blurb', array('label' => 'Blurb', 'type' => 'text', 'class' => 'span6 input-large'));
echo $this->Form->input('body', array('label' => 'Nota', 'class' => 'span6 input-large', 'rows' => '25'));
echo "<hr><h4>Tags</h4>";
echo $this->Form->input('tags', array('class' => 'tagsinput', 'label' => 'Agregar Tags'));
echo $this->Form->input('tagged', array('type' => 'hidden'));
?>
<hr>
<h4>MultiMedia</h4>
<h5>Foto de la Nota</h5>
<div class="fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="fileupload-new">Select image</span>
            <span class="fileupload-exists">Change</span>
            <input type="file" id="pic" name="data[Article][pic]"/>
        </span>
        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('pic_blurb', array('label' => 'Blurb de la Foto', 'type' => 'text', "class" => "span6 input-large"));
echo $this->Form->input('video', array('class' => 'span3'));
echo $this->Form->input('video_blurb', array('label' => 'Blurb del Video', 'type' => 'text', "class" => "span6 input-large"));

echo $this->Form->input('published_date', array(
        'type' => 'text',
        'label' => 'Fecha de Publicaci&oacute;n',
));

$time = $this->Timeoptions->getTimeOptions();

echo $this->Form->input('published_time', array(
        'label' => 'Hora de Publicaci&oacute;n',
        'type' => 'select',
        'options' => array(
                $time,
        ),
        'empty' => array(0 => '-- Publicar Ahora --'),
));

echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();
?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#ArticlePublishedDate").datepicker({dateFormat:"yy-mm-dd"});
		$(".fileupload").fileupload();
		$('#ArticleVideo').parent().prepend('<p><small class="alert alert-info">copiar la URL del video y pegarlo aqui</small></p>');

		$('#ArticleTags').autocomplete({source: '/tags/autocomplete/', minlength:2, select: function (event, ui){
			if (ui.item != null) {
				var label = "<span id='tag"+ui.item.id+"' class='label tag'>"+ui.item.value+"<a onclick='deltag("+ui.item.id+")'>x</a></span>";
				$(this).parent().append(label);
				$('#ArticleTagged').val(function(e, val) {
					return val + (val ? ',' : '') + ui.item.id
				});
				$(this).val("");
				return false;
			}
		}});
		$('#ArticleTags').keypress(function(e){
			if (e.which == 13) {
				e.preventDefault();
				alert('am i even here?'+$(this).val());
				var new_tag = $(this).val();
				var label = "<span id='tag"+new_tag+"' class='label tag'>"+new_tag+"<a onclick='deltag("+new_tag+")'>x</a></span>";
				$(this).parent().append(label);
				$('#ArticleTagged').val(function(e, val) {
					return val + (val ? ',' : '') + new_tag
				});
				this.value = "";
				return false;
			}
		});
	});

	function deltag(tag_id){
		$("#tag"+tag_id).remove();
		var arrTags = $('#ArticleTagged').val().split(',');

		for(i=0; i< arrTags.length; i++){
			console.log(arrTags[i]);
			if (arrTags[i] == tag_id){
				arrTags.splice(i, 1);
			}
		}

		$('#ArticleTagged').val(arrTags.toString());
	}
</script>