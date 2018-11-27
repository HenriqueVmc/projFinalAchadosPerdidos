<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Objeto $objeto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Objetos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="objetos form large-9 medium-8 columns content">
    <?= $this->Form->create($objeto) ?>
    <fieldset>
        <legend><?= __('Add Objeto') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('cor');
            echo $this->Form->control('descricao');
            echo $this->Form->control('situacao');
            echo $this->Form->control('dtSituacao');
            echo $this->Form->control('localSituacao');
            echo $this->Form->control('recompensa');
            echo $this->Form->control('valRecompensa');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
