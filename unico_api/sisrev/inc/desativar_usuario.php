<?php
require_once('../../config/query.php');

switch ($_GET['acao']) {
    case '1'://ativar 
        switch ($_GET['sistema']) {
            case 'Apollo':
                /* $updateApolloGer = "UPDATE GER_USUARIO SET ativo = 'S' WHERE cpf = ".$_GET['cpf']."";
                $execUpdateApolloGer = oci_parse($connApollo, $updateApolloGer);
                oci_execute($execUpdateApolloGer);

                if (!$execUpdateApolloGer) {
                    $e = oci_error($connApollo);
                    trigger_error(htmlentities($e['Erro ao fazer o update do usuário!']), E_USER_ERROR);
                }

                $updateApolloFat = "UPDATE FAT_VENDEDOR SET ativo = 'S' WHERE cpf = ".$_GET['cpf']."";
                $execUpdateApolloFat = oci_parse($connApollo, $updateApolloFat);
                oci_execute($execUpdateApolloFat);

                if (!$execUpdateApolloFat) {
                    $e = oci_error($connApollo);
                    trigger_error(htmlentities($e['Erro ao fazer o update do usuário!']), E_USER_ERROR);
                } */

                /* header('Location: http://10.100.1.214/unico/sistemas/sisrev/inc/desativarMysql.php?sistema=' .$_GET['sistema']. '&cpf=' .$_GET['cpf']. '&acao=' .$_GET['acao']. '&pg='.$_GET['pg'].'&tela='.$_GET['tela'].''); */
                echo 'veio aqui Apollo';
                break;
            case 'Nbs':

                break;
        }
        break;
    case '2'://desativar
        switch ($_GET['sistema']) {
            case 'Apollo':
                /* $updateApolloGer = "UPDATE GER_USUARIO SET ativo = 'N' WHERE cpf = ".$_GET['cpf']."";
                $execUpdateApolloGer = oci_parse($connApollo, $updateApolloGer);
                oci_execute($execUpdateApolloGer);

                if (!$execUpdateApolloGer) {
                    $e = oci_error($connApollo);
                    trigger_error(htmlentities($e['Erro ao fazer o update do usuário!']), E_USER_ERROR);
                }

                $updateApolloFat = "UPDATE FAT_VENDEDOR SET ativo = 'N' WHERE cpf = ".$_GET['cpf']."";
                $execUpdateApolloFat = oci_parse($connApollo, $updateApolloFat);
                oci_execute($execUpdateApolloFat);

                if (!$execUpdateApolloFat) {
                    $e = oci_error($connApollo);
                    trigger_error(htmlentities($e['Erro ao fazer o update do usuário!']), E_USER_ERROR);
                } */

                /* header('Location: http://10.100.1.214/unico/sistemas/sisrev/inc/desativarMysql.php?sistema=' .$_GET['sistema']. '&cpf=' .$_GET['cpf']. '&acao=' .$_GET['acao']. '&pg='.$_GET['pg'].'&tela='.$_GET['tela'].''); */
                echo 'veio aqui NBS';
                break;
            case 'Nbs':

                break;
        }
        break;
}

?>
