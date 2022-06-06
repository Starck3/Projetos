<?php
session_start();
require_once('../config/query.php');

//var_dump($_FILES['arquivo']);

if ($_FILES['arquivo']["type"] === "text/csv") {

  //SUBINDO O ARQUIVO NO SERVIDOR

  $nome = date('dmYhi') . $_FILES['arquivo']['name'];

  $uploaddir = '/var/www/html/unico/sistemas/sisrev/documentos/PE/';
  $uploadfile = $uploaddir . basename($nome);


  if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {

    //SALVANDO LOG
    $queryLOG = "INSERT INTO sisrev_arquivo_PE (caminho, nome_arquivo , data, id_usuario) VALUES ('" . $uploadfile . "','" . $_FILES['arquivo']['name'] . "', '" . date('Y-m-d H:i:s') . "', '" . $_SESSION['id_usuario'] . "')";

    if (!$resultadoLOG = $conn->query($queryLOG)) {
      header('location: ../front/politicamente_exposto.php?pg=' . $_GET['pg'] . '&tela=' . $_GET['tela'] . '&msn=10&erro=1');
    } else {

      // 1 - Deletando a tabela com os dados antigos

      // 2 - Criando a tabela para receber os dados novos

      // 3 - Inserindos os dados novos
    }
  } else {
    header('location: ../front/politicamente_exposto.php?pg=' . $_GET['pg'] . '&tela=' . $_GET['tela'] . '&msn=10&erro=2');
  }
} else {
  header('location: ../front/politicamente_exposto.php?pg=' . $_GET['pg'] . '&tela=' . $_GET['tela'] . '&msn=10&erro=3');
}
