<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Objeto $objeto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Objeto'), ['action' => 'edit', $objeto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Objeto'), ['action' => 'delete', $objeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $objeto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Objetos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Objeto'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="objetos view large-9 medium-8 columns content">
    <h3><?= h($objeto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($objeto->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cor') ?></th>
            <td><?= h($objeto->cor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($objeto->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LocalSituacao') ?></th>
            <td><?= h($objeto->localSituacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recompensa') ?></th>
            <td><?= h($objeto->recompensa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($objeto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Situacao') ?></th>
            <td><?= $this->Number->format($objeto->situacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ValRecompensa') ?></th>
            <td><?= $this->Number->format($objeto->valRecompensa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DtSituacao') ?></th>
            <td><?= h($objeto->dtSituacao) ?></td>
        </tr>
    </table>
</div>
