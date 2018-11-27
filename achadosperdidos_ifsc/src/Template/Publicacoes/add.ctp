<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicaco $publicaco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Lista de Publicações'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="publicacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($publicaco) ?>
    <fieldset>
        <legend><?= __('Adicionar Publicação') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->label('Imagem');
            echo $this->Form->file('imagem');
            echo $this->Form->control('dtPublicacao');

            // echo $this->Form->control('usuarioId');
            echo $this->Form->label('Usuário');
            echo '<select style="width: 100%; float: left;" name="usuarioId">';		
                echo "<option  value=''>Selecione</option>";			
                foreach($listaUsuarios as $usuario){ 
                    echo "<option  value='{$usuario->id}'>{$usuario->nome}</option>";
                }						
            echo '</select>';

            //echo $this->Form->control('objetoId');
            echo $this->Form->label('Objetos');
            echo '<select style="width: 100%; float: left;" name="objetoId">';		
                echo "<option  value=''>Selecione</option>";			
                foreach($listaObjetos as $obj){ 
                    echo "<option  value='{$obj->id}'>{$obj->nome}</option>";
                }						
            echo '</select>';            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
