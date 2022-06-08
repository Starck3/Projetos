<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina
require_once('../config/query.php'); //Dados do banco MYSQL
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Acesso rápido módulos</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=<?= $_GET['pg'] ?>">Home</a></li>
        <li class="breadcrumb-item">Acesso rápido</li>
      </ol>
    </nav>
  </div><!-- End Navegação -->

  <?php
  require_once('../../../inc/mensagens.php'); //Alertas
  ?>

  <!--################# COLE section AQUI #################-->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Acessos rápidos
              <a href="acessos_alterar.php?pg=<?=$_GET['pg']?>&tela=<?=$_GET['tela']?>&acao=1" class="btn btn-success button-rigth-card" title="Novo acesso"><i class="bi bi-plus"></i></a>
            </h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Endereço</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>
              <tbody>
                <?php
                //chamando acessos
                $resultado = $conn->query($queryAcessos);

                while ($acessos = $resultado->fetch_assoc()) {
                  echo '
                    <tr>
                      <th scope="row">' . $acessos['id'] . '</th>
                      <td>' . $acessos['nome'] . '</td>
                      <td>' . $acessos['endereco'] . '</td>
                      <td> 
                        <a href="acessos_alterar.php?pg='.$_GET['pg'].'&tela='.$_GET['tela'].'&id='.$acessos['id'].'&acao=2" title="Editar" class="btn btn-primary btn-sm">
                          <i class="bi bi-pencil"></i>
                        </a> 
                        <a href="acessos_alterar.php?pg='.$_GET['pg'].'&tela='.$_GET['tela'].'&id='.$acessos['id'].'&acao=3" title="Excluir" class="btn btn-danger btn-sm">
                          <i class="bi bi-trash"></i>
                        </a>
                      </td>
                    </tr>';
                }
                ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <!--################# section TERMINA AQUI #################-->

</main><!-- End #main -->

<?php
require_once('footer.php'); //Javascript e configurações afins
?>