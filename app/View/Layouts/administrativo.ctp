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
		echo $this->Html->css('perfil');
		echo $this->Html->css('administrativo');

		echo $this->Html->script('jquery-2.1.1.min');
		echo $this->Html->script('javascript');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<header class="institucional_header perfil_header">
		<div class="content">
			<nav>
				<?php
					echo $this->Html->link('Perfil', '/perfil');

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

	<div class="margin_box content clearfix">
		<div class="perfil_sidebar">
			<div class="perfil_image_wrapper">
				<a href="<?= $this->Html->url(array('controller' => 'Users', 'action' => 'alterar_perfil'), true) ?>" class="alterar_perfil">
					<span>Alterar imagem</span>
					<?php
						if(empty($current_user['User']['imagem_perfil'])){
							echo '<img src="'. $this->Html->url('/', true) .'app/webroot/img/default_perfil.png' .'" />';
						} else {
							echo '<img src="'. $this->Html->url('/', true) .'app/webroot/img/perfil/' . $current_user['User']['imagem_perfil'] .'" />';
						}
					?>
				</a>
				<p class="user_name"><?= $current_user['User']['name']; ?></p>
			</div>

			<nav class="admin_menu">
				<?php
					echo $this->Html->link('Personalidades', array('controller' => 'Personalities', 'action' => 'index'));
					echo $this->Html->link('Questionário', array('controller' => 'Surveys', 'action' => 'index_admin'));
				?>
			</nav>
		</div>

		<div class="content_perfil">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>

	<footer class="footer_home footer_perfil">
		<div class="content">
			<p>Português - Brasil</p>
		</div>
	</footer>

</body>
</html>