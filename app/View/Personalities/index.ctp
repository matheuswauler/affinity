<div class="padding_box">
	<h1 class="perfil_dark_title">Personalidades</h1>

	<?= $this->Html->link('Novo', array('controller' => 'Personalities', 'action' => 'create'), array('class' => 'create_link')); ?>
	
	<table class="listagem_itens">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th width="200">Opções</th>
			</tr>
		</thead>

		<tbody>
			<? foreach ($dados as $key => $dado) { ?>
				<tr>
					<td align="center"><?= $dado['Personality']['id'] ?></td>
					<td><?= $dado['Personality']['name'] ?></td>
					<td align="center">
						<?= $this->Html->link('Alterar', array('controller' => 'Personalities', 'action' => 'edit', $dado['Personality']['id']), array('class' => 'edit_link')); ?>
						<?= $this->Html->link('Excluir', array('controller' => 'Personalities', 'action' => 'delete', $dado['Personality']['id']), array('class' => 'delete_link', 'confirm' => 'Tem certeza de que deseja deletar o item: ' . $dado['Personality']['name'] . '?')); ?>
					</td>
				</tr>
			<? } ?>
		</tbody>
	</table>
</div>