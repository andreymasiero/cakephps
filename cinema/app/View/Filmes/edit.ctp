<?php
// Exibe o título da página
echo $this->Html->tag('h1', 'Alterar Filme');

// Criação do formulário
echo $this->Form->create('Filme');

// Campos do formulário
echo $this->Form->hidden('Filme.id');
echo $this->Form->input('Filme.nome');
echo $this->Form->input('Filme.idioma');
echo $this->Form->input('Filme.duracao');
echo $this->Form->input('Filme.ano');

// Finaliza o formulário
echo $this->Form->end('Salvar');
?>