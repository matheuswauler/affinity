<div class="padding_box">
	<h1 class="perfil_dark_title">Editar página</h1>

	<?php

		echo $this->Form->create(array('action' => 'edit/' . $item['Institutional']['id'], 'class' => 'minha_conta_form admin_form'));

		echo $this->Form->input('title', array('label' => 'Título: ', 'value' => $item['Institutional']['title']));

		echo $this->Form->input('description', array('label' => 'Descrição: ', 'value' => $item['Institutional']['description']));
		
		echo $this->Form->end('Salvar');

	?>
</div>