<div class="videos form">
<?php echo $this->Form->create('Video'); ?>
	<fieldset>
		<legend><?php echo __('Add Video'); ?></legend>
	<?php
		echo $this->Form->input('video');
		echo $this->Form->input('title');
		echo $this->Form->input('blurb');
		echo $this->Form->input('section_id', array('options' => array(1,2,3)));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?></li>
	</ul>
</div>
