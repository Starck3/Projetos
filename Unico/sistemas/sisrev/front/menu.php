<?php 
require_once('../inc/paginacao.php');//pg 
require_once('../inc/administrador.php'); //regra de perfis
?>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">        
        <li class="nav-item">
            <a class="nav-link <?= $_GET['pg'] == 1 ?: "collapsed" ?>" href="index.php?pg=<?= $_GET['pg'] ?>">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <hr>
        <li class="nav-heading">Módulos</li>
        <li class="nav-item" style="display: <?= $_SESSION['administrador'] == 1 ? 'block' : 'none' ?>">
            <a class="nav-link <?= $_GET['pg'] == 2 ?: "collapsed" ?>" data-bs-target="#info-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cpu"></i><span>Informática</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="info-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="desativar_usuario.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>" <?= $_GET['tela'] == 1 ? "class='active'" : "" ?>>
                        <i class="bi bi-circle"></i><span>Desativar Usuários</span>
                    </a>
                    <a href="empresas.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>" <?= $_GET['tela'] == 2 ? "class='active'" : "" ?>>
                        <i class="bi bi-circle"></i><span>Empresas</span>
                    </a>
                    <a href="politicamente_exposto.php?pg=<?= $_GET['pg'] ?>&tela=<?= $_GET['tela'] ?>" <?= $_GET['tela'] == 3 ? "class='active'" : "" ?>>
                        <i class="bi bi-circle"></i><span>Politicamente exposto</span>
                    </a>
                </li>
            </ul>
        </li>
        <hr>
        <li class="nav-heading">Paginas</li>
        <li class="nav-item" style="display: <?= $_SESSION['administrador'] == 1 ? 'block' : 'none' ?>">
            <a class="nav-link <?= $_GET['pg'] == 6 ?: "collapsed" ?>" data-bs-target="#config-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>Configurações</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="config-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="localizar_modulos.php?pg=<?= $_GET['pg'] ?>&tela=4" <?= $_GET['tela'] == 4 ? "class='active'" : "" ?>>
                        <i class="bi bi-circle"></i><span>Acesso Rápido Módulos</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link  <?= $_GET['pg'] == 5 ?: "collapsed" ?>" href="ajuda.php?pg=<?= $_GET['pg'] ?>">
                <i class="bi bi-question-circle"></i>
                <span>Ajuda?</span>
            </a>
        </li>
        <hr>
        <li class="nav-item">
            <a class="nav-link collapsed" href="../../../index.php">
                <i class="bi bi-arrow-bar-left"></i>
                <span>Voltar</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar-->