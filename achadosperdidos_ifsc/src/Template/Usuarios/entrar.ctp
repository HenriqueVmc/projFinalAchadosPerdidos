<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $objeto
 */
echo $this->Html->css(['bootstrap/css/bootstrap']);
echo $this->Html->script(['bootstrap/bootstrap.bundle.min', 'jquery/jquery.min']);
?>

<div class="container mt-4">
    <div class="row mt-4 mb-4">
        <div class="col-md-4"></div>
        <div class="col-md-4 ml-4">
          <form action="/projFinalAchadosPerdidos/achadosperdidos_ifsc/usuarios/entrar" method="POST" class="form-horizontal" id="frmLogin" name="frmLogin">
              <fieldset>
                  <legend><?= __('Informe seu Login e Senha:') ?></legend>
                  <?php                
                      echo $this->Form->control('Login', array('id'=>'login', 'name' => 'login', 'class'=> 'form-control'));
                      echo $this->Form->control('Senha', array('id'=>'senha', 'name' => 'senha', 'type' => 'password'));                    
                  ?>
              </fieldset>
              <!-- VERIFICAÇÃO COM SESSION -->
              <button type="submit" class='btn btn-dark btn-block'>Entrar</button>
          </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
