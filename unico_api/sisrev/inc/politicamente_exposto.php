<?php
require_once('../../config/query.php');

if ($_GET['apollo'] == 1) {    

    echo '<prev>';
    echo 'Importando dados: ';
    //DESMARCAR TODOS PARA N
    /* $update = "UPDATE FAT_CLIENTE SET PESSOA_POLITICAMENTE_EXPOSTA = 'N'";
    $updatePE = oci_parse($connApollo, $update);
    oci_execute($updatePE);

    if (!$updatePE) {
        $e = oci_error($connApollo);
        trigger_error(htmlentities($e['Erro[1]']), E_USER_ERROR);
    }   */

    //BUSCAR CPF
    $queryBuscarCPF = "SELECT CPF_PEP FROM sisrev_politicamente_exposto";
    $resultBuscaCPF = $connUNICO->query($queryBuscarCPF);
    $encontrei = 0;
    $naoEncontrei = 0;

    while ($buscaCPF = $resultBuscaCPF->fetch_assoc()) {

        //buscando no apollo o cpf
        $buscaNoApollo = "SELECT CLIENTE, CGCCPF, PESSOA_POLITICAMENTE_EXPOSTA FROM FAT_CLIENTE  WHERE CGCCPF = '" . $buscaCPF['CPF_PEP'] . "'";
        $resultbuscaNoApollo = oci_parse($connApollo, $buscaNoApollo);
        oci_execute($resultbuscaNoApollo);

        if (($apolloCliente = oci_fetch_assoc($resultbuscaNoApollo)) != false) {
            $update = "UPDATE FAT_CLIENTE SET PESSOA_POLITICAMENTE_EXPOSTA = 'S' WHERE CLIENTE = ".$apolloCliente['CLIENTE'];
            $updatePE = oci_parse($connApollo, $update);
            oci_execute($updatePE);

            if ($updatePE) {
                /* echo $apolloCliente['CLIENTE']."<br>"; */
                $encontrei++;
            }
        }else{
            $naoEncontrei++; 
        }
    }

    echo '</prev>';
    header('location: vai.php?encontrei='.$encontrei.'&naoencontrei='.$naoEncontrei.'');
}

if ($_GET['nbs'] == 1) {
    //fazer no nbs
    echo 'Fazer no nbs';
}
