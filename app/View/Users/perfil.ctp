<div class="imagem_fundo">
	<div class="content">
		<h1>Perfil</h1>
	</div>
</div>

<div class="content">
	<ol class="steps clearfix">
		<li><abbr>1</abbr> Cadastro</li>
		<li class="active"><abbr>2</abbr> Perfil</li>
		<li><abbr>3</abbr> Questionário</li>
	</ol>

	<p class="page_descr">
		Adicione uma imagem para o seu perfil.
	</p>

	<?php

		echo $this->Form->create(array('action' => 'perfil', 'class' => 'upload_form'));

		echo $this->Form->file('imagem_perfil');

		echo $this->Form->end('Upload');

	?>
</div>