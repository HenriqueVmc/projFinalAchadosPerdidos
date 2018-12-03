<?php
    echo $this->Html->css(['bootstrap/css/bootstrap']);
    echo $this->Html->script(['bootstrap/bootstrap.bundle.min', 'jquery/jquery.min']);
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>        
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="mb-4">
        <nav class="navbar navbar-expand-lg  navbar-dark bg-dark fixed-top mb-3">
            <a class="navbar-brand" href="#">Achados e Perdidos do IFSC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/projFinalAchadosPerdidos/achadosperdidos_ifsc/publicacoes">Publicações</a>
                </li>

                </ul>
                <div class="form-inline my-2 my-lg-0">               
                    <a href="/projFinalAchadosPerdidos/achadosperdidos_ifsc/usuarios/entrar" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </nav>

        <!-- <nav class="top-bar expanded fixed-top" data-topbar role="navigation">
            <ul class="left">
                <li class="name">
                    <h1 class="text-center"><a href="">Publicações</a></h1>
                    <ul class="">
                        <li class="name">
                            <h1 class="text-center"><a href="">Objetos</a></h1>
                        </li>
                    </ul>
                </li>

                
            </ul>
            <div class="top-bar-section">
                <ul class="right">
                    <li><a target="_blank" href="https://book.cakephp.org/3.0/">Entrar</a></li>                
                </ul>
            </div>
        </nav> -->
    </div>
    <?= $this->Flash->render() ?>
    <div class="container mt-4">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
