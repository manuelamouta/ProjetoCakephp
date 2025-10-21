<h1>Nova Tarefa</h1>

<?= $this->Form->create($tarefa) ?>
    <?= $this->Form->control('titulo', ['label' => 'Título']) ?>
    <?= $this->Form->control('descricao', ['type' => 'textarea', 'label' => 'Descrição']) ?>
    <?= $this->Form->control('status', [
        'type' => 'select',
        'options' => ['pendente' => 'Pendente', 'concluida' => 'Concluída']
    ]) ?>
    <?= $this->Form->button('Salvar') ?>
<?= $this->Form->end() ?>
        