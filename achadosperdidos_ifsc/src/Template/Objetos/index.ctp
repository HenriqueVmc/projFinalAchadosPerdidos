<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Objeto[]|\Cake\Collection\CollectionInterface $objetos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Novo Objeto'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="objetos index large-9 medium-8 columns content">
    <h3><?= __('Objetos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>                
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cor') ?></th>                
                <th scope="col"><?= $this->Paginator->sort('situacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Data Achado/Perdido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Local Achado/Perdido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recompensa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Valor da Recompensa') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaObjetos as $objeto): ?>
            <tr>
                <td><?= h($objeto->nome) ?></td>
                <td><?= h($objeto->cor) ?></td>
                <td><?= $this->Number->format($objeto->situacao) ?></td>
                <td><?= h($objeto->dtSituacao) ?></td>
                <td><?= h($objeto->localSituacao) ?></td>
                <td><?= h($objeto->recompensa) ?></td>
                <td><?= $this->Number->format($objeto->valRecompensa) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Detalhes'), ['action' => 'view', $objeto->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $objeto->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $objeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objeto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
