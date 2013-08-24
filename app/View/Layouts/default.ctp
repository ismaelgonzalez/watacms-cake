<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'WATACMS');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet">

	<?php
	echo $this->Html->meta('icon');

	//echo $this->Html->css('cake.generic');
	echo $this->Html->css('bootstrap');
	echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('bootstrap-fileupload.min');
	echo $this->Html->css('bootstrap-responsive');
	echo $this->Html->css('flush.less?', 'stylesheet/less');
	echo $this->Html->css('watacms');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	echo $this->Html->script('jquery-1.10.0.min');
	echo $this->Html->script('jquery-ui-1.10.3.custom.min');
	echo $this->Html->script('bootstrap');
    echo $this->Html->script('bootstrap-fileupload.min');
	echo $this->Html->script('cakebootstrap');
	?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="/">WataCMS</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">Login</a></li>
					<li><a href="#about">Hello User...</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2 flush">
			<ul class="nav nav-stacked nav-tabs pull-left dark">
				<li>
					<a href="/album">
						<i class="icon-picture icon-2x"></i><br>
						Album
					</a>
				</li>
				<li>
					<a href="/">
						<i class="icon-edit icon-2x"></i><br>
						Article
					</a>
				</li>
				<li>
					<a href="/pic">
						<i class="icon-camera-retro icon-2x"></i><br>
						Pic
					</a>
				</li>
				<li>
					<a href="/">
						<i class="icon-list-ol icon-2x"></i><br>
						Poll
					</a>
				</li>
				<li>
					<a href="/section">
						<i class="icon-list icon-2x"></i><br>
						Section
					</a>
				</li>
				<li>
					<a href="/">
						<i class="icon-tags icon-2x"></i><br>
						Tags
					</a>
				</li>
				<li>
					<a href="/">
						<i class="icon-user icon-2x"></i><br>
						User
					</a>
				</li>
				<li>
					<a href="/video/">
						<i class="icon-facetime-video icon-2x"></i><br>
						Video
					</a>
				</li>
			</ul>
		</div>
		<div class="span10 flush">
			<div class="container-fluid">
				<?php
					if($this->params['controller'] != "pages"){
						if ($this->params['action'] != 'index') {
							$this->Html->addCrumb(ucfirst($this->params['controller']), '/'.$this->params['controller']."/");
							$this->Html->addCrumb(ucfirst($this->params['action']));
						} else {
							$this->Html->addCrumb(ucfirst($this->params['controller']));
						}
					}

					echo $this->Html->getCrumbList(
						array(
							'class' => "breadcrumb",
							"separator" => "<span class='divider'>/</span>",
							"lastClass" => "active",
						),
						"Home");
				?>
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
	<hr>
	<footer>
		<p>
			<span style="text-align: left; float: left;">&copy; Watanabex Software Company</span>
			<span style="text-align: right; float: right;"><?php echo date("Y"); ?></span>
		</p>
	</footer>
</div>

</body>
</html>
