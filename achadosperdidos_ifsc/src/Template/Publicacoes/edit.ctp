<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicaco $publicaco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $publicaco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $publicaco->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Publicacoes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="publicacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($publicaco) ?>
    <fieldset>
        <legend><?= __('Edit Publicaco') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('imagem');
            echo $this->Form->control('dtPublicacao');
            echo $this->Form->control('usuarioId');
            echo $this->Form->control('objetoId');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
