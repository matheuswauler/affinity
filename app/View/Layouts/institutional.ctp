<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Teste
	</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('default');
		echo $this->Html->css('home');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<header class="institucional_header">
		<div class="content">
			<nav>
				<?php
					echo $this->Html->link('Inicial', '/');
					echo $this->Html->link('Sobre', '');
					echo $this->Html->link('Equipe', '');
					echo $this->Html->link('Ajuda', '');
					echo $this->Html->link('Sign Up', array('controller' => 'users', 'action' => 'register', 'full_base' => true), array('class' => 'signup_link'));
				?>
			</nav>
		</div>
	</header>

	<?php echo $this->Session->flash(); ?>

	<?php echo $this->fetch('content'); ?>

	<footer class="footer_home">
		<div class="content">
			<nav>
				<?php
					echo $this->Html->link('Inicial', '');
					echo $this->Html->link('Sobre', '');
					echo $this->Html->link('Equipe', '');
					echo $this->Html->link('Ajuda', '');
					echo $this->Html->link('Sign Up', array('controller' => 'users', 'action' => 'register', 'full_base' => true));
				?>
			</nav>

			<p>Portugues - Brasil</p>
		</div>
	</footer>

</body>
</html>