<?php
App::uses('AppModel', 'Model');

class Filme extends AppModel {
    public $validate = array(
        'nome' => array(
            'rule' => 'notBlank',
            'message' => 'O nome do filme é obrigatório.'
        ),
        'duracao' => array(
            'rule' => 'notBlank',
            'message' => 'A duração do filme é obrigatória.'
        )
    );
}
?>
