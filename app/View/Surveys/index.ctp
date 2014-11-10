<div class="imagem_fundo">
	<div class="content">
		<h1>Questionário</h1>
	</div>
</div>

<div class="content">
	<ol class="steps clearfix">
		<li class="active"><abbr>1</abbr> Cadastro</li>
		<li class="active"><abbr>2</abbr> Perfil</li>
		<li class="active"><abbr>3</abbr> Questionário</li>
	</ol>

	<p class="page_descr">
		Responda as questões abaixo para se enquadrar em um perfil.
	</p>

	<?php

		echo $this->Form->create(array('action' => 'register', 'class' => 'registration_form'));

		echo $this->Form->input('sex', array('label' => '', 'options' => array('Não', 'Sim'), 'div' => 'input right'));
		
		echo $this->Form->end('Registrar');

	?>
</div>