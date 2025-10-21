<h1>Lista de Tarefas</h1>

<?= $this->Html->link('Nova Tarefa', ['action' => 'add'], ['class' => 'button']) ?>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($tarefas as $tarefa): ?>
        <tr>
            <td><?= $tarefa->id ?></td>
            <td><?= h($tarefa->titulo) ?></td>
            <td><?= h($tarefa->status) ?></td>
            <td>
                <?= $this->Html->link('Editar', ['action' => 'edit', $tarefa->id]) ?> |
                <?= $this->Form->postLink('Excluir', ['action' => 'delete', $tarefa->id], ['confirm' => 'Deseja excluir esta tarefa?']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
