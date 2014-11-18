<div class="padding_box">
	<h1 class="perfil_dark_title">Editar personalidades</h1>

	<?php

		echo $this->Form->create(array('action' => 'edit/' . $item['Personality']['id'], 'class' => 'minha_conta_form admin_form'));

		echo $this->Form->input('name', array('label' => 'Nome: ', 'value' => $item['Personality']['name']));
		
		echo $this->Form->end('Salvar');

	?>
</div>