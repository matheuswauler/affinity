<div class="padding_box">
	<h1 class="perfil_dark_title">Nova personalidades</h1>

	<?php

		echo $this->Form->create(array('action' => 'create', 'class' => 'minha_conta_form admin_form'));

		echo $this->Form->input('name', array('label' => 'Nome: '));
		
		echo $this->Form->end('Salvar');

	?>
</div>