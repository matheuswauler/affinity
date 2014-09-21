<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Registro de usuário | Affinity
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('default');
		echo $this->Html->css('registration');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header id="header">
			<div class="steps">
				<div class="first">
					Cadastro
				</div>
				<div class="second">
					Informações adicionais
				</div>
				<div class="third">
					Questionário
				</div>
			</div>
		</header>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

		<footer id="footer">
			
		</footer>
	</div>
</body>
</html>