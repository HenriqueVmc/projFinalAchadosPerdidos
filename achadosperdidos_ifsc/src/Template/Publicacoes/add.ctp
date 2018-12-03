<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicaco $publicaco
 */
echo $this->Html->css(['bootstrap/css/bootstrap']);
echo $this->Html->script(['bootstrap/bootstrap.bundle.min', 'jquery/jquery.min']);
?>
<div class="container mt-4">
    <div class="row mt-4 mb-4">
        <div class="col-md-3"></div>
        <div class="col-md-7">
            <!-- <div class="row">
                <form id='frmObjeto'>
                <?php 
                    // echo $this->Form->control('nome');
                    // echo $this->Form->control('cor');
                    // echo $this->Form->control('situacao');
                    // echo $this->Form->control('dtSituacao', array('type' => 'date'));
                    // echo $this->Form->control('localSituacao');
                    // echo $this->Form->control('recompensa');
                    // echo $this->Form->control('valRecompensa');
                ?>
                </form>
            </div>     -->
            <?= $this->Form->create($publicaco, array('id' => 'frmPublicacao', 'enctype' => 'multipart/form-data')) ?>
            <fieldset>
                <legend><?= __('Adicionar Publicação') ?></legend>
                <?php
                    echo $this->Form->control('titulo');                        
                    echo $this->Form->control('imagem', array('type' => 'file', 'accept' => "image/png, image/jpeg"));                      
                    echo $this->Form->control('descricao', array('type' => 'textarea'));

                    //echo $this->Form->hidden('usuarioId');
                    // echo $this->Form->label('Usuário');
                    // echo '<select style="width: 100%; float: left;" name="usuarioId">';		
                    //     echo "<option  value=''>Selecione</option>";			
                    //     foreach($listaUsuarios as $usuario){ 
                    //         echo "<option  value='{$usuario->id}'>{$usuario->nome}</option>";
                    //     }						
                    // echo '</select>';
                    
                    $objetoId = $_GET['objetoid'];
                    echo $this->Form->hidden('objetoId', array('value' => $objetoId));
                    // echo $this->Form->label('Objetos');
                    // echo '<select style="width: 100%; float: left;" name="objetoId">';		
                    //     echo "<option  value=''>Selecione</option>";			
                    //     foreach($listaObjetos as $obj){ 
                    //         echo "<option  value='{$obj->id}'>{$obj->nome}</option>";
                    //     }						
                    // echo '</select>';        
                    
                    
                ?>
            </fieldset>    
            <?= $this->Form->button(__('Publicar'), array('id' => 'btnEnviar', 'class' => 'btn btn-dark btn-block mt-4')) ?> 
            <?= $this->Form->end() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<script>

    // $('btnEnviar').click(function(){
        
    //     dados = $('#frmObjeto').serialize();
        
    //     $.ajax({
    //         type: "POST",
    //         url: '/Objetos/add',
    //         data: dados,
    //         success: function (data) {
    //             if (data > 0) {
    //                 //Refresh the calender
    //                 cadadastrarPublicacao(data.id);
    //             }
    //         },
    //         error: function () {

    //         }
    //     });        
    // });

    // function cadadastrarPublicacao(objetoId){
        
    //     dados = $('#frmPublicacao').serialize();
    //     dados['objetoId'] = objetoId;

    //     $.ajax({
    //         type: "POST",
    //         url: '/Publicacoes/add',
    //         data: dados,
    //         success: function (data) {
    //             alert("Deu bom");
    //         },
    //         error: function () {

    //         }
    //     });       
    // }
</script>