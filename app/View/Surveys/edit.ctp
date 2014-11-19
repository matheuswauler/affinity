<div class="padding_box">
	<h1 class="perfil_dark_title">Editar questão</h1>

	<?php

		echo $this->Form->create(array('action' => 'edit/' . $item['Personalitie']['id'], 'class' => 'minha_conta_form admin_form'));

		echo $this->Form->input('name', array('label' => 'Nome: ', 'value' => $item['Personalitie']['name']));
		
		echo $this->Form->end('Salvar');

	?>
</div>