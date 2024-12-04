<?php 
// Verifica se a variável 'filme' está definida antes de usá-la
if (isset($filme) && !empty($filme)) {
    // Cria um título para a página
    echo $this->Html->tag('h1', 'Visualizar Filme');

    // Exibe as informações do filme
    echo $this->Html->tag('h2', 'Nome');
    echo $this->Html->para('', $filme['Filme']['nome']);  // Exibe o nome do filme

    echo $this->Html->tag('h2', 'Duração');
    echo $this->Html->para('', $filme['Filme']['duracao']);  // Exibe a duração do filme

    echo $this->Html->tag('h2', 'Idioma');
    echo $this->Html->para('', $filme['Filme']['idioma']);  // Exibe o idioma do filme

    echo $this->Html->tag('h2', 'Ano');
    echo $this->Html->para('', $filme['Filme']['ano']);  // Exibe o ano do filme

    // Cria o link "Voltar"
    $voltarlink = $this->Html->link('Voltar', '/filmes');
    echo $voltarlink;
} else {
    // Caso o filme não exista, exibe uma mensagem de erro
    echo $this->Html->tag('h2', 'Filme não encontrado.');

    // Cria o link "Voltar" no caso de erro
    $voltarlink = $this->Html->link('Voltar', '/filmes');
    echo $voltarlink;
}
?>
