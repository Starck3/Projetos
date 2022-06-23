<?php

    require_once('../inc/querysApi.php');
    
    !$execDrop = $conn->query($drop) ? : '' ;//drop da tabela existente no unico
    
    !$execCreate = $conn->query($createUsuariosApi) ? : ''; //criação da tabela no unico
    
    require_once('../inc/apiApollo.php');
    require_once('../inc/apiNbs.php');

    $conn->close();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
</head>
<body>
    <div id="sucess">Importação Feita com Sucesso!</div>    
</body>
</html>
