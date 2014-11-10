<section class="home_video_container">
	<div class="video_wrapper">
		<video autoplay loop muted>
			<source src="app/webroot/videos/home.mp4" type="video/mp4">
		</video>
	</div>

	<div class="login_box">
		<h1>Entrar</h1>
		<?php
			echo $this->Form->create(array('url' => $this->Html->url(array('controller' => 'Users','action' => 'login'), true)));

			echo $this->Form->input('username', array('label' => 'Username'));
			echo $this->Form->input('senha', array('label' => 'Senha', 'type' => 'password'));

			echo $this->Form->end('OK');
		?>
	</div>
</section>