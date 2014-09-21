<section class="home_video_container">
	<div class="video_wrapper">
		<video autoplay loop muted>
			<source src="app/webroot/videos/home.mp4" type="video/mp4">
		</video>
	</div>

	<header>
		<div class="content">
			<nav>
				<?php
					echo $this->Html->link('Inicial', '');
					echo $this->Html->link('Sobre', '');
					echo $this->Html->link('Equipe', '');
					echo $this->Html->link('Ajuda', '');
					echo $this->Html->link('Sign Up', array('controller' => 'users', 'action' => 'register', 'full_base' => true), array('class' => 'signup_link'));
				?>
			</nav>
		</div>
	</header>

	<div class="login_box">
		<h1>Entrar</h1>
		<form action="" method="post">
			<p>
				<label for="email">E-mail</label>
				<input type="email" name="email" id="email" />
			</p>

			<p>
				<label for="senha">Senha</label>
				<input type="password" name="senha" id="senha" />
			</p>
			<input type="submit" value="OK" />
		</form>
	</div>


</section>
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