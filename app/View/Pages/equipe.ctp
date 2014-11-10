<div class="imagem_fundo">
	<div class="content">
		<h1>Equipe</h1>
	</div>
</div>

<div class="content">
	<article class="content_text">
		<h1><?= $pages[1]['Page']['title']; ?></h1>

		<?= $pages[1]['Page']['description']; ?>

		<ul class="equipe clearfix">
			<?php 
				foreach ($adm_users as $key => $adm) {
					echo '<li>';
					if(empty($adm['User']['imagem_perfil'])){
						echo '<img src="'. $this->Html->url('/', true) .'app/webroot/img/default_perfil.png' .'" />';
					} else {
						echo '<img src="'. $this->Html->url('/', true) .'app/webroot/img/perfil/' . $adm['User']['imagem_perfil'] .'" />';
					}
					echo '<h2>'. $adm['User']['name'] .'</h2>';
					echo '</li>';
				}
			?>
		</ul>
	</article>
</div>