<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicaco[]|\Cake\Collection\CollectionInterface $publicacoes
 */    
    echo $this->Html->css(['bootstrap/css/bootstrap']);
    echo $this->Html->script(['bootstrap/bootstrap.bundle.min', 'jquery/jquery.min']);
?>
<!-- Bootstrap core CSS -->

<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nova Publicacão'), ['action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="publicacoes index columns content">
    
    
      <!-- Page Content -->
    <div class="container">

        <!-- TOP -->
        <div class="row">                      
            <!-- Sidebar Widgets Column -->
            <div class="col-md-3">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Pesquisar</h5>
                    <div class="card-body">
                        <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                        </div>
                    </div>
                </div>
            
            </div>    
            
            <div class="col-md-9 mt-2">
                <h2 class='text-center mt-4 mb-4'> Perdeu ou Encrontrou algo no IFSC? Publique Aqui!</h2>
                <a href='/projFinalAchadosPerdidos/achadosperdidos_ifsc/Objetos/add' class='btn btn-success btn-block'>Publicar novo Objeto</a>    
                <!-- Search Widget             
                <div class="card my-4">
                    <h5 class="card-header" id="header">Publicar</h5>
                    
                    <div class="panel-body">
                        <div class="card-body" id="panel">
                            <div class='row'>
                                <div class='col-md-6'>
                                <a href='/Objetos/add' class='btn btn-success btn-block'>Publicar Objeto</a>                                                                       
                                </div>                                                            
                            </div>                                                      
                        </div>
                    </div>
                </div>-->              
            </div>
        
        </div>
        <!-- /.row -->
        <hr>
        <!-- CENTER -->  
        <div class="row">              
            <!-- Categories Widget -->
            <div  class="col-md-3">
                <div class="card my-4">
                    <h5 class="card-header">Categorias</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Eletrônicos</a>
                                </li>
                                <li>
                                    <a href="#">Material Escolar</a>
                                </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Roupas</a>
                                </li>

                                <li>
                                    <a href="#">Guarda-Chuva</a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Entries Column -->
            <div class="col-md-9">

                <!-- Blog Post -->
                <div class="row">
                    <?php foreach ($listaPublicacoes as $publicaco): ?>
                        
                        <div class="col-md-6">
                            <div class="card mb-4 mt-4">
                                <a href="#">
                                    <img class="card-img-top" src="<?= h($publicaco->imagem) ?>" alt="Card image cap" height="100px">                            
                                </a>
                                <div class="card-body">                        
                                    <h4 class="card-title"><?= h($publicaco->titulo) ?></h4>                                                
                                    <p><?= h($publicaco->descricao) ?></p>
                                </div>                    
                            
                                <div class="card-footer text-muted">
                                    Publicado em: <?= h($publicaco->dtPublicacao) ?>,
                                    por: <a href="#"><?= h($publicaco->usuario->nome) ?></a>
                                    <p class="float-right"><?php echo ($publicaco->objeto->situacao == 1) ? "Achado" : "Perdido" ?></p>
                                </div>
                            </div>
                        </div>                        
                    <?php endforeach; ?>
                </div>
                <!-- Pagination
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>               
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>

<script>

$(document).ready(function() {

    $("#panel").slideUp();
        
    $("#header").click(function() {        
        if($("#panel").hasClass('panelHover')){

            $("#panel").removeClass();
            $("#panel").slideUp();
        }else{
            $("#panel").slideDown();
            $("#panel").addClass('panelHover');            
        }
    });    

});
</script>