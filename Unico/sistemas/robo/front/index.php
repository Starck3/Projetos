<?php
require_once('head.php'); //CSS e configurações HTML e session start
require_once('header.php'); //logo e login e banco de dados
require_once('menu.php'); //menu lateral da pagina
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Home</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=<?= $_GET['pg'] ?>">Home</a></li>
      </ol>
    </nav>
  </div><!-- End Navegação -->

  <?php
  require_once('../../../inc/mensagens.php'); //Alertas
  ?>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Horários Robô</h5>
            <!-- Table Variants -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="capitalize">Dia</th>
                  <th scope="col" class="capitalize">Hora</th>
                  <th scope="col" class="capitalize">Segunda</th>
                  <th scope="col" class="capitalize">Terça</th>
                  <th scope="col" class="capitalize">Quarta</th>
                  <th scope="col" class="capitalize">Quinta</th>
                  <th scope="col" class="capitalize">Sexta</th>
                  <th scope="col" class="capitalize">Sabado</th>
                  <th scope="col" class="capitalize">Domingo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">01</th>
                  <th scope="row">00:00</th>
                  <td>Segunda</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                </tr>

                <tr class="table-primary">
                  <th scope="row">02</th>
                  <td>Terça</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                </tr>
                <tr class="table-dark">
                  <th scope="row">03</th>
                  <td>Quarta</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                </tr>
              </tbody>
            </table>
            <!-- End Table Variants -->
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php
require_once('footer.php'); //Javascript e configurações afins
?>