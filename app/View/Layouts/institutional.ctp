<?php
	$current_user = $this->Session->read('current_user');
?>

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
		echo $this->Html->css('registration');

		echo $this->Html->script('jquery-2.1.1.min');
		echo $this->Html->script('javascript');

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
					echo $this->Html->link('Sobre', '/pages/sobre');
					echo $this->Html->link('Equipe', '/pages/equipe');
					echo $this->Html->link('Ajuda', '/pages/ajuda');

					if(is_null($current_user) || empty($current_user)){
						echo $this->Html->link('Cadastre-se', array('controller' => 'users', 'action' => 'register', 'full_base' => true), array('class' => 'signup_link'));
					} else {
						echo '<span class="current_user_header">';
						if(empty($current_user['User']['imagem_perfil'])){
							echo '<img src="'. $this->Html->url('/', true) .'app/webroot/img/default_perfil.png' .'" />';
						} else {
							echo '<img src="'. $this->Html->url('/', true) .'app/webroot/img/perfil/' . $current_user['User']['imagem_perfil'] .'" />';
						}
						echo 'Olá, ' . $current_user['User']['name'];

						echo $this->Html->link('Sair', '/users/logout');

						echo '</span>';
					}
				?>
			</nav>
		</div>
	</header>

	<?php
		$error_msg = $this->Session->flash();
		if(!is_null($error_msg) && !empty($error_msg)){
			echo '<div class="error_msg">' . $error_msg . '</div>';
		}
	?>

	<?php echo $this->fetch('content'); ?>

	<footer class="footer_home">
		<div class="content">
			<nav>
				<?php
					echo $this->Html->link('Inicial', '/');
					echo $this->Html->link('Sobre', '/pages/sobre');
					echo $this->Html->link('Equipe', '/pages/equipe');
					echo $this->Html->link('Ajuda', '/pages/ajuda');
				?>
			</nav>

			<p>Português - Brasil</p>
		</div>
	</footer>

</body>
</html>