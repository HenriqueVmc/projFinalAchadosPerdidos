<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicaco[]|\Cake\Collection\CollectionInterface $publicacoes
 */    
    echo $this->Html->css(['bootstrap/css/bootstrap']);
    echo $this->Html->script(['bootstrap/bootstrap.bundle.min', 'jquery/jquery.min']);
?>
<!-- Bootstrap core CSS -->

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nova Publicacão'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="publicacoes index large-9 medium-8 columns content">
    <h2><?= __('Publicações') ?></h2>

      <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post -->
                <?php foreach ($listaPublicacoes as $publicaco): ?>

                    <div class="card mb-4 mt-4">
                        <a href="#">
                            <img class="card-img-top" src="<?= h($publicaco->imagem) ?>" alt="Card image cap" height="100px">                            
                        </a>
                        <div class="card-body">                        
                            <h4 class="card-title"><?= h($publicaco->titulo) ?></h4>                                                
                            <p><?= h($publicaco->objeto->descricao) ?></p>
                        </div>                    
                    
                        <div class="card-footer text-muted">
                            Publicado em: <?= h($publicaco->dtPublicacao) ?>,
                            por: <a href="#"><?= h($publicaco->usuario->nome) ?></a>
                            <p class="float-right"><?php echo ($publicaco->objeto->situacao) ? "Achado" : "Perdido" ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>


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

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

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

                <!-- Categories Widget -->
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
            <!-- /.row -->
        </div>
        <!-- /.container -->
</div>

