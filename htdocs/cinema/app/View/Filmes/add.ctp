<?php
// Exibe o título da página
echo $this->Html->tag('h1', 'Novo Filme');

// Criação do formulário
echo $this->Form->create('Filme');

// Campos do formulário
echo $this->Form->input('Filme.nome', array('required'=>false));
echo $this->Form->input('Filme.idioma');
echo $this->Form->input('Filme.duracao',array('label' => array('text' => 'Duração')));
echo $this->Form->input('Filme.ano', array('type' => 'text','maxlength' => 4));

// Finaliza o formulário
echo $this->Form->end('Salvar');
?>