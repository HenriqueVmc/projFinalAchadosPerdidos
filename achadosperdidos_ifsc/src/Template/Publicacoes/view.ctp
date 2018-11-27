<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicaco $publicaco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Publicaco'), ['action' => 'edit', $publicaco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Publicaco'), ['action' => 'delete', $publicaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publicaco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Publicacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publicaco'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="publicacoes view large-9 medium-8 columns content">
    <h3><?= h($publicaco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($publicaco->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagem') ?></th>
            <td><?= h($publicaco->imagem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($publicaco->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UsuarioId') ?></th>
            <td><?= $this->Number->format($publicaco->usuarioId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ObjetoId') ?></th>
            <td><?= $this->Number->format($publicaco->objetoId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DtPublicacao') ?></th>
            <td><?= h($publicaco->dtPublicacao) ?></td>
        </tr>
    </table>
</div>
