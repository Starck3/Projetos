<?php
require_once('../../config/query.php');

if ($_GET['confirma'] == 1) {
    //DESMARCAR TODOS PARA N APOLLO
    $update = "UPDATE FAT_CLIENTE SET PESSOA_POLITICAMENTE_EXPOSTA = 'N'";
    $updatePE = oci_parse($connApollo, $update);
    oci_execute($updatePE, OCI_COMMIT_ON_SUCCESS);

    oci_free_statement($connApollo);

    //DESMARCAR TODOS PARA 0 NBS
    //DESMARCAR TODOS PARA 0 NBS_RIBEIRAO
}

//BUSCAR CPF
$queryBuscarCPF = "SELECT id, CPF_PEP FROM sisrev_politicamente_exposto WHERE atualizado = 0";
$resultBuscaCPF = $connUNICO->query($queryBuscarCPF);

while ($buscaCPF = $resultBuscaCPF->fetch_assoc()) {
    

    if(empty($buscaCPF['apollo'])){//UPDATE APOLLO
        $queryencontre = "SELECT CLIENTE FROM FAT_CLIENTE WHERE CGCCPF = '" . $buscaCPF['CPF_PEP'] . "'";
        $resultado = oci_parse($connApollo, $queryencontre);
        oci_execute($resultado, OCI_COMMIT_ON_SUCCESS);
    
        if ($cliente = oci_fetch_array($resultado, OCI_ASSOC + OCI_RETURN_NULLS)) {
    
            $updateApolloPE = "UPDATE FAT_CLIENTE SET PESSOA_POLITICAMENTE_EXPOSTA = 'S' WHERE CLIENTE = '" . $cliente['CLIENTE'] . "'";
            $apolloPE = oci_parse($connApollo, $updateApolloPE);
            oci_execute($apolloPE, OCI_NO_AUTO_COMMIT);
            echo $updateApolloPE."<br>";
    
            // S = ENCONTREI
            $insertLogS = "UPDATE sisrev_politicamente_exposto SET apollo = 'S' WHERE `id`='".$buscaCPF['id']."'";
            $resultadoLogS = $connUNICO->query($insertLogS);
    
        } else {
            // N = NÂO ENCONTREI
            $insertLogS = "UPDATE sisrev_politicamente_exposto SET apollo = 'N' WHERE `id`='".$buscaCPF['id']."'";
            $resultadoLogS = $connUNICO->query($insertLogS);
        }
    
        oci_free_statement($connApollo);
    }

    /* 
    if(){//UPDATE NBS }

    if(){//UPDATE NBS RIBEIRAO 
    */

    $insertLog = "UPDATE sisrev_politicamente_exposto SET atualizado = '1' WHERE `id`='".$buscaCPF['id']."'";
    $resultadoLog = $connUNICO->query($insertLog);
}

oci_close($connApollo);
$connUNICO->close();

header('location: http://10.100.1.214/unico/sistemas/sisrev/front/politicamente_exposto.php?pg='.$_GET['pg'].'&tela='.$_GET['tela'].'$msn=11');