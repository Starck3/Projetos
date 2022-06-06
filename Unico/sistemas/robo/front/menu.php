<?php
require_once('../inc/paginacao.php'); //pg 
?>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?= $_GET['pg'] == 1 ?: "collapsed" ?>" href="index.php?pg=<?= $_GET['pg'] ?>">
                <i class="bx bxs-home"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <hr>
        <li class="nav-item">
            <a class="nav-link collapsed" href="../../../index.php">
                <i class="bi bi-arrow-bar-left"></i>
                <span>Voltar</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar-->