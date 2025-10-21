<?php
namespace App\Controller;

use App\Controller\AppController;

class TarefasController extends AppController
{
    public function index()
    {
        $tarefas = $this->Tarefas->find()->order(['created' => 'DESC']);
        $this->set(compact('tarefas'));
    }

    public function add()
    {
        $tarefa = $this->Tarefas->newEmptyEntity();

        if ($this->request->is('post')) {
            $tarefa = $this->Tarefas->patchEntity($tarefa, $this->request->getData());
            if ($this->Tarefas->save($tarefa)) {
                $this->Flash->success('Tarefa adicionada com sucesso!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro ao salvar a tarefa.');
        }

        $this->set(compact('tarefa'));
    }

    public function edit($id = null)
    {
        $tarefa = $this->Tarefas->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $this->Tarefas->patchEntity($tarefa, $this->request->getData());
            if ($this->Tarefas->save($tarefa)) {
                $this->Flash->success('Tarefa atualizada com sucesso!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro ao atualizar a tarefa.');
        }

        $this->set(compact('tarefa'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarefa = $this->Tarefas->get($id);

        if ($this->Tarefas->delete($tarefa)) {
            $this->Flash->success('Tarefa removida com sucesso!');
        } else {
            $this->Flash->error('Erro ao remover a tarefa.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
