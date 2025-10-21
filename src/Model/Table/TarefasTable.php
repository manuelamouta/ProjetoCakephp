<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TarefasTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('tarefas');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('titulo', 'O título é obrigatório')
            ->maxLength('titulo', 100, 'Máximo de 100 caracteres');
        return $validator;
    }
}
    