<div class="padding_box">
	<h1 class="perfil_dark_title">Institucional</h1>
	
	<table class="listagem_itens">
		<thead>
			<tr>
				<th>Código</th>
				<th>Página</th>
				<th width="200">Opções</th>
			</tr>
		</thead>

		<tbody>
			<? foreach ($dados as $key => $dado) { ?>
				<tr>
					<td align="center"><?= $dado['Institutional']['id'] ?></td>
					<td><?= $dado['Institutional']['title'] ?></td>

					<td align="center">
						<?= $this->Html->link('Alterar', array('controller' => 'Institutionals', 'action' => 'edit', $dado['Institutional']['id']), array('class' => 'edit_link')); ?>
					</td>
				</tr>
			<? } ?>
		</tbody>
	</table>
</div>