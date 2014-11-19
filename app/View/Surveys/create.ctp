<div class="padding_box">
	<h1 class="perfil_dark_title">Nova questão</h1>

	<?php

		echo $this->Form->create(array('action' => 'create', 'class' => 'minha_conta_form admin_form'));

		echo $this->Form->input('personality_id', array('label' => 'Personalidade: '));

		echo $this->Form->input('question', array('label' => 'Questão: '));
		
		echo $this->Form->end('Salvar');

	?>
</div>