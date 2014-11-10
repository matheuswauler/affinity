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

	<?= $this->Form->create(array('action' => 'register', 'class' => 'survey_form')); ?>
		<? foreach ($survey as $key => $s) { ?>
			
			<article class="question_wrapper">
				<header class="clearfix">
					<strong><?= $key+1 ?></strong>
					<div class="question_description">
						<?= $s['Survey']['question'] ?>
					</div>
				</header>
				<?= $this->Form->input('question_' . $s['Survey']['id'], array(
					'type' => 'radio',
					'label' => '',
					'options' => array('Não', 'Sim')
				)); ?>
			</article>
			
		<? } ?>
	<?= $this->Form->end('Registrar'); ?>
</div>