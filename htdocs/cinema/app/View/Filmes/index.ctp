<?php

// Array para armazenar os dados dos filmes
$detalhe = array();

// Loop para percorrer os filmes e extrair as informações
foreach ($filmes as $filme) {
    // Link para editar o filme, incluindo o ID do filme na URL
    $editlink = $this->Html->link('Alterar', array('action' => 'edit', $filme['Filme']['id']));

    // Link de exclusão com confirmação
    $deletelink = $this->Html->link('Excluir', 
        array('controller' => 'filmes', 'action' => 'delete', $filme['Filme']['id']), 
        array('confirm' => 'Tem certeza que deseja excluir este filme?')
    );

    // Link para visualizar o filme, usando o nome do filme como texto do link
    $viewLink = $this->Html->link($filme['Filme']['nome'], array('action' => 'view', $filme['Filme']['id']));

    // Adicionando as informações do filme (Nome, Ano, Links) ao array $detalhe
    $detalhe[] = array(
        $viewLink,            // Link para visualizar o filme (nome do filme clicável)
        $filme['Filme']['ano'],  // Ano do filme
        $editlink . ' ' . $deletelink  // Links de edição e exclusão concatenados
    );
}

// Link para a página de adicionar novo filme
$novoButton = $this->Html->link('Novo', array('action' => 'add'));

// Exibindo o título da página
echo $this->Html->tag('h1', 'Filmes');

// Títulos das colunas da tabela (não inclui mais a coluna 'ID')
$titulos = array('Nome', 'Ano', 'Ações');

// Gerando os cabeçalhos da tabela
$header = $this->Html->tableHeaders($titulos);

// Gerando as células da tabela com os dados dos filmes
$body = $this->Html->tableCells($detalhe);

// Cria a tag <table> com os cabeçalhos e os dados dos filmes
echo $this->Html->tag('table', $header . $body);

// Link para adicionar um novo filme
echo $novoButton;

?>

