<?php
    require_once('../../../config/query.php');//SISTEMA UNICO
    require_once('../config/query.php');//SISTEMA NOTAS
    
    if($_SESSION['id_usuario'] == NULL){
        header('Location: ../front/login.php?pg='.$_GET['pg'].'&msn=9');//sessão nao iniciada!
    }
?>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php?pg=1" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Notas<img src="../../../img/fd_logo.png" alt="" srcset=""></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['nome_usuario'] ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $_SESSION['nome_usuario'] ?></h6>
                            <span><?= $_SESSION['administrador'] == 1 ? "Administrador" : "Usuários Padrão" ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:" data-bs-toggle="modal" data-bs-target="#ModalPerfil">
                                <i class="bi bi-person"></i>
                                <span>Meu perfil</span>
                            </a>
                        </li>
                        
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="ajuda.php?pg=3">
                                <i class="bi bi-question-circle"></i>
                                <span>Ajuda ?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../../../inc/unset.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sair</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->
    <div class="modal fade" id="ModalPerfil" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Meu perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Profile Edit Form -->
                    <form action="../../../inc/editar_perfil.php?id_usuario=<?= $_SESSION['id_usuario'] ?>&id_sistema=1" method="post">
                        <h5 class="card-title">Principal</h5>
                        <div class="row mb-3">
                            <label for="nomeUsuario" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="nomeUsuario" type="text" class="form-control" id="nomeUsuario" value="<?= $_SESSION['nome_usuario'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control" id="email" value="<?= $_SESSION['email'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cpf" class="col-md-4 col-lg-3 col-form-label">CPF</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="cpf" type="text" class="form-control" id="cpf" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" onblur="ValidarCPF(this)" value="<?= $_SESSION['cpf'] ?>" required="">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Empresa</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="empresa">
                                    <option value="<?= $_SESSION['id_empresa'] ?>" selected><?= $_SESSION['empresa'] ?></option>
                                    <option>--------</option>
                                    <?php
                                    $resultEmpresa = $conn->query($queryEmpresa);

                                    while ($empresa = $resultEmpresa->fetch_assoc()) {
                                        echo '<option value="' . $empresa['id'] . '">' . $empresa['nome'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Departamento</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="departamento">
                                    <option value="<?= $_SESSION['id_depto'] ?>" selected><?= $_SESSION['departamento'] ?></option>
                                    <option>--------</option>
                                    <?php
                                    $resultDepartamento = $conn->query($queryDepartamento);

                                    while ($departamento = $resultDepartamento->fetch_assoc()) {
                                        echo '<option value="' . $departamento['id_depto'] . '">' . $departamento['nome'] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <h5 class="card-title">Login</h5>
                        <div class="row mb-3">
                            <label for="usuario" class="col-md-4 col-lg-3 col-form-label">Usuário</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="usuario" type="text" class="form-control" id="usuario" value="<?= $_SESSION['usuario'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="senha" class="col-md-4 col-lg-3 col-form-label">Senha</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="senha" type="password" class="form-control" id="senha" value="">
                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form><!-- End Profile Edit Form -->

                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->

    <!-- ======= Sidebar ======= -->