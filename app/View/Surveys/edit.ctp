<div class="padding_box">
	<h1 class="perfil_dark_title">Editar questão</h1>

	<?php

		echo $this->Form->create(array('action' => 'edit/' . $item['Survey']['id'], 'class' => 'minha_conta_form admin_form'));

		echo $this->Form->input('personality_id', array('label' => 'Personalidade: ', 'value' => $item['Survey']['personality_id']));

		echo $this->Form->input('question', array('label' => 'Questão: ', 'value' => $item['Survey']['question']));
		
		echo $this->Form->end('Salvar');

	?>
</div>