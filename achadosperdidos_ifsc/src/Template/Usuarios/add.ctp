<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Lista de Usuários'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usuarios form large-9 medium-8 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Adicionar Usuário') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('login');
            echo $this->Form->label('Senha');
            echo $this->Form->password('senha');
            echo $this->Form->control('telefone');
            echo $this->Form->control('celular');
            echo $this->Form->control('email');
            echo $this->Form->control('endereco');
            echo $this->Form->label('Perfil');
            echo '<select style="width: 100%; float: left;" name="perfilId">';		
                echo "<option  value=''>Selecione</option>";			
                foreach($listaPerfis as $perfil){ 
                    echo "<option  value='{$perfil->id}'>{$perfil->nome}</option>";
                }						
		    echo '</select>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
