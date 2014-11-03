<?php

	echo $this->Form->create(array('action' => 'register'));
	echo $this->Form->input('name', array('label' => '', 'placeholder' => 'Nome'));
	echo $this->Form->input('email', array('label' => '', 'placeholder' => 'E-mail'));
	echo $this->Form->input('birthday', array('label' => 'Data de Nascimento'));
	echo $this->Form->input('sex', array('label' => 'Sexo', 'options' => array('M' => 'Masculino', 'F' => 'Feminino')));
	echo $this->Form->input('facebook', array('label' => '', 'placeholder' => 'Link do Facebook'));
	echo $this->Form->input('twitter', array('label' => '', 'placeholder' => 'Link do Twitter'));
	echo $this->Form->input('web_site', array('label' => '', 'placeholder' => 'Site'));
	echo $this->Form->input('username', array('label' => '', 'placeholder' => 'Nome de Usuário'));
	echo $this->Form->input('password', array('value'=>'', 'label' => '', 'placeholder' => 'Senha'));
	echo $this->Form->input('password_confirm', array('value'=>'', 'type'=>'password', 'label' => '', 'placeholder' => 'Confirmar Senha'));
	echo $this->Form->end('Registrar');

?>