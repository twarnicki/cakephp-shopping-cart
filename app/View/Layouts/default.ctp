<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo $this->Html->css(array('bootstrap.css', 'css.css')); ?>
<lin1k rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<?php echo $this->Html->script(array('bootstrap.js', 'respond.min.js', 'j/s.js')); ?>
<?php echo $this->App->js(); ?>
<?php echo $this->fetch('meta'); ?>
<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo Configure::read('Settings.ANALYTICS'); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php if($this->Session->check('Shop')) : ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#cartbutton').show();
});
</script>
<?php endif; ?>

</head>
<body>

	<div class="wrap">

		<div class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo $this->Html->url('/'); ?>">CSC</a>
				<div class="nav-collapse collapse">
					<ul class="nav navbar-nav">
						<li><?php echo $this->Html->link('Home', array('controller' => 'products', 'action' => 'view')); ?></li>
						<li><?php echo $this->Html->link('Manufacturers', array('controller' => 'manufacturers', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index')); ?></li>
						<li><?php echo $this->Html->link('Search', array('controller' => 'products', 'action' => 'search')); ?></li>
					</ul>

					<ul class="navbar-form form-inline pull-right">

						<?php echo $this->Form->create('Product', array('type' => 'GET', 'url' => array('controller' => 'products', 'action' => 'search'))); ?>

						<?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'input-small', 'autocomplete' => 'off')); ?>
						<?php echo $this->Form->button('Search', array('div' => false, 'class' => 'btn btn-small btn-primary')); ?>
						&nbsp;
						<span id="cartbutton" style="display:none;">
						<?php echo $this->Html->link('Shopping Cart', array('controller' => 'shop', 'action' => 'cart'), array('class' => 'btn btn-small btn-success')); ?>
						</span>

						<?php echo $this->Form->end(); ?>

					</ul>

				</div>
			</div>
		</div>

		<div class="container content">

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>

			<br />

			<div id="msg"></div>

			<br />

		</div>
	</div>

	<div class="container">

		<div id="footer">
			<?php echo $this->Html->link($this->Html->image('cake.power.gif', array('alt' => 'CakePHP', 'border' => 0)), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)); ?>
			<br />
			<?php echo $this->Html->link('CakePHP Shopping Cart - github.com/andraskende/cakephp-shopping-cart', 'https://github.com/andraskende/cakephp-shopping-cart'); ?>
			<br />
			&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?>
			<br />
			<br />
			<?php echo $this->element('sql_dump'); ?>
			<br />
			<br />
		</div>

	</div>


</body>
</html>
