<div class="padding_box">
	<h1 class="perfil_dark_title">Personalidades</h1>

	<?= $this->Html->link('Novo', array('controller' => 'Surveys', 'action' => 'create'), array('class' => 'create_link')); ?>
	
	<table class="listagem_itens">
		<thead>
			<tr>
				<th>Código</th>
				<th>Personalidade</th>
				<th>Questão</th>
				<th width="200">Opções</th>
			</tr>
		</thead>

		<tbody>
			<? foreach ($dados as $key => $dado) { ?>
				<tr>
					<td align="center"><?= $dado['Survey']['id'] ?></td>
					<td><?= $dado['Survey']['personality_id'] ?></td>
					<td><?= $dado['Survey']['question'] ?></td>

					<td align="center">
						<?= $this->Html->link('Alterar', array('controller' => 'Surveys', 'action' => 'edit', $dado['Survey']['id']), array('class' => 'edit_link')); ?>
						<?= $this->Html->link('Excluir', array('controller' => 'Surveys', 'action' => 'delete', $dado['Survey']['id']), array('class' => 'delete_link', 'confirm' => 'Tem certeza de que deseja deletar o item selecionado?')); ?>
					</td>
				</tr>
			<? } ?>
		</tbody>
	</table>
</div>