<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Objeto $objeto
 */
echo $this->Html->css(['bootstrap/css/bootstrap']);
echo $this->Html->script(['bootstrap/bootstrap.bundle.min', 'jquery/jquery.min']);
?>

<div class="container mt-4">
    <div class="row mt-4 mb-4">
        <div class="col-md-3"></div>
        <div class="col-md-7">
            <?= $this->Form->create($objeto) ?>
            <fieldset>
                <legend><?= __('Antes de tudo, descreva as características do Objeto:') ?></legend>
                <?php
                    echo $this->Form->control('Nome', array('id'=>'nome', 'name' => 'nome', 'class'=> 'form-control'));
                    echo $this->Form->control('Cor', array('id'=>'nome', 'name' => 'cor', 'class'=> 'form-control', 'type' => 'color'));
                    
                    echo $this->Form->label('Situação');
                    echo '<select class="form-control mb-3" name="situacao" id="situacao">';		
                        echo "<option  value='0'>Selecione</option>";			                         
                        echo "<option  value='1'>Achado</option>";                        
                        echo "<option  value='2'>Perdido</option>";                        
                    echo '</select>'; 

                    echo $this->Form->label('Data (Encontrado/Perdido)');                    
                    echo '<input type="date" class="form-control" id="dtSituacao" name="dtSituacao"/>';
                    
                    echo $this->Form->control('Local (Encontrado/Perdido)', array('id'=>'localSituacao', 'name' => 'localSituacao'));
                    echo $this->Form->control('Recompensa', array('id'=>'reconpensa', 'name' => 'recompensa', 'class'=> 'form-control'));
                    echo $this->Form->control('Valor da Recompensa', array('id'=>'valReconpensa', 'name' => 'valRecompensa', 'type'=>'number', 'class'=> 'form-control'));
                ?>
            </fieldset>
            <?= $this->Form->button(__('Continuar'), array('class' => 'btn btn-dark btn-block mb-4')) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-md-2 mb-4"></div>
    </div>
</div>
