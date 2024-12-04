<?php
App::uses('AppController', 'Controller');

class FilmesController extends AppController {

    public function index() {
        // Seleção dos campos para busca
        $fields = array('Filme.id', 'Filme.nome', 'Filme.ano', 'Filme.duracao', 'Filme.idioma');
        
        // Ordenação dos filmes por ano em ordem crescente
        $order = array('Filme.ano' => 'asc');
        
        // Condições (exemplo descomentado de filtro por ano)
        // $conditions = array(
        //     'Filme.ano BETWEEN ? AND ?' => array(1980, 2000)
        // ); 

        // Realizando a consulta para buscar filmes
        $filmes = $this->Filme->find('all', array(
            'fields' => $fields,   // Campos selecionados (id, nome, ano, duração, idioma)
            'order' => $order,     // Ordenação pelo ano
            // 'conditions' => $conditions // (Descomente se quiser aplicar filtro)
        ));
        
        // Enviando a variável $filmes para a view
        $this->set('filmes', $filmes);
    }

    public function add() { 
        if (!empty($this->request->data)) {
            $this->Filme->create();
            if ($this->Filme->save($this->request->data)) {
                $this->Session->setFlash('Filme adicionado com sucesso!');
                // Redireciona para a página de listagem após o sucesso
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Não foi possível adicionar o filme. Por favor, tente novamente.');
            }
        }
    }

    public function edit($id = null) {  
        // Lógica para editar o filme
        if (!$id) {
            throw new NotFoundException('Filme inválido');
        }

        // Encontrando o filme para editar
        $filme = $this->Filme->findById($id);
        if (!$filme) {
            throw new NotFoundException('Filme não encontrado');
        }

        // Processar os dados do filme quando o formulário for submetido
        if ($this->request->is(array('post', 'put'))) {
            $this->Filme->id = $id;
            if ($this->Filme->save($this->request->data)) {
                $this->Session->setFlash('Filme atualizado com sucesso!');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Não foi possível atualizar o filme. Tente novamente.');
            }
        }

        // Se não for uma requisição POST ou PUT, preenche os dados no formulário
        if (!$this->request->data) {
            $this->request->data = $filme;
        }
    }

    public function view($id = null) {
        // Verifica se o ID foi passado
        if (!$id) {
            throw new NotFoundException('Filme inválido');
        }
    
        // Seleção dos campos para exibir
        $fields = array('Filme.id', 'Filme.nome', 'Filme.ano', 'Filme.duracao', 'Filme.idioma');
        
        // Condições para buscar o filme específico
        $conditions = array('Filme.id' => $id);
        
        // Buscando os dados do filme
        $filme = $this->Filme->find('first', array(
            'fields' => $fields,
            'conditions' => $conditions
        ));
    
        // Verifica se o filme foi encontrado
        if (!$filme) {
            throw new NotFoundException('Filme não encontrado');
        }
    
        // Passa o filme para a view
        $this->set('filme', $filme); // Passa o filme para a view
    }
    public function delete($id) {
        $this->Filme->delete($id);
        $this->Session->setFlash('Filme deletado com sucesso!');
        $this->redirect('/filmes');
}
}
