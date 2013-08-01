<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->css(array('bootstrap.css', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css', 'admin.css', 'bootstrap-responsive.css')); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<?php echo $this->Html->script(array('bootstrap.min.js', 'admin.js')); ?>

<?php echo $this->App->js(); ?>

<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
</head>
<body>

	<div class="navbar navbar-inverse navbar-static-top">

		<a class="navbar-brand" href="/admin/">SHOP ADMIN</a>

		<div class="nav-collapse collapse">
			<ul class="nav navbar-nav">
				<li><?php echo $this->Html->link('Manufacturers', array('controller' => 'manufacturers', 'action' => 'index', 'admin' => true)); ?></li>
				<li><?php echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'index', 'admin' => true)); ?></li>
				<li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'index', 'admin' => true)); ?></li>
				<li><?php echo $this->Html->link('Orders', array('controller' => 'orders', 'action' => 'index', 'admin' => true)); ?></li>
				<li><?php echo $this->Html->link('Orders Items', array('controller' => 'order_items', 'action' => 'index', 'admin' => true)); ?></li>
				<li><?php echo $this->Html->link('Shopping Carts', array('controller' => 'carts', 'action' => 'index', 'admin' => true)); ?></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Utils<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link('Products CSV Export', array('controller' => 'products', 'action' => 'csv', 'admin' => true)); ?></li>
					</ul>
				</li>

			</ul>

			<ul class="nav navbar-nav pull-right">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin</a>
					<ul class="dropdown-menu">
						<li><a href="http://www.google.com/analytics/" target="_blank"><Analytics</a></li>
						<li class="divider"></li>
						<li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?></li>
					</ul>
				</li>

			</ul>

		</div>

	</div>

	<div class="content">

	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('sql_dump'); ?>

	<br />
	<br />

	<footer>
		<p>&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></p>
	</footer>

	</div>

</body>
</html>

