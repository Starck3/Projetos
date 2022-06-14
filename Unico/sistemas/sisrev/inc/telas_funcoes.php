<?php
require_once('../config/query.php');

switch ($_GET['acao']) {
    case '1':
        $insertFuncao = "INSERT INTO sisrev_funcao (descricao, id_modulos)
                        VALUES ('" .$_POST['descricao']. "', '" .$_POST['tela']. "')";

        if (!$insertFuncao = $conn->query($insertFuncao)){
            printf("Erro ao inserir nova Função %s\n", $conn->error);
        }
        
        header('Location: ../front/telas_funcoes.php?pg='.$_GET['pg'].'&tela='.$_GET['tela'].'&msn=8');
        
        break;
    
    default:
        # code...
        break;
}


?>