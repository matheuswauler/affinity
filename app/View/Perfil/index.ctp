<article class="personalidade">
	<h1><span>Personalidade predominante:</span> <strong><?= $personalidade['Personalitie']['name'] ?></strong></h1>

	<a href="#" id="show_personality">+ Ver descrição completa</a>

	<div class="personalidade_texto hidden_text">
		<?= $personalidade['Personalitie']['description'] ?>
	</div>
</article>

<section class="show_people_personality">
	<h1>Conheça mais pessoas com a mesma personalidade que a sua!</h1>

	<ul class="people_list">
		<?php foreach ($pessoas as $key => $value) { ?>
			<li class="clearfix">
				<?php
					if(empty($value['User']['imagem_perfil'])){
						echo '<img src="'. $this->Html->url('/', true) .'app/webroot/img/default_perfil.png' .'" />';
					} else {
						echo '<img src="'. $this->Html->url('/', true) .'app/webroot/img/perfil/' . $value['User']['imagem_perfil'] .'" />';
					}
				?>

				<div class="person_info_container">
					<span class="name"><?= $value['User']['name'] ?></span>
					<span class="email"><a href="mailto:<?= $value['User']['email'] ?>"><?= $value['User']['email'] ?></a></span>
					
					<nav class="redes">
						<?php
							if(!empty($value['User']['facebook'])){
								echo $this->Html->link('Facebook', $value['User']['facebook'], array('target' => '_blank', 'class' => 'facebook'));
							}
							if(!empty($value['User']['twitter'])){
								echo $this->Html->link('Twitter', $value['User']['twitter'], array('target' => '_blank', 'class' => 'twitter'));
							}
							if(!empty($value['User']['web_site'])){
								echo $this->Html->link('Web Site', $value['User']['web_site'], array('target' => '_blank', 'class' => 'web_site'));
							}
						?>
					</nav>
				</div>
			</li>
		<?php } ?>
	</ul>
</section>