<?php

$ajuste = str_replace("-","", $_POST['cpf']);
$queryDemitidos .= " WHERE cpf = ".str_replace(".", "", $ajuste)."";
$resultado = $conn->query($queryDemitidos);

while ($rowResultado = $resultado->fetch_assoc()) {

    if ($rowResultado['ativo'] == 'S') {
        $ativo = "SIM";
        $color = "green";
    } else {
        $ativo = "NÃO";
        $color = "red";
    }

    $dados .= 
    '
        <tr>
            <td>' .$rowResultado['id']. '</td>
            <td>' .$rowResultado['nome']. '</td>
            <td>' .$rowResultado['cpf']. '</td>
            <td style="color: '.$color.';">' .$ativo. '</td>
            <td>' .$rowResultado['sistema']. '</td>                      
            <td>';
                if ($rowResultado['ativo'] == 'N') {
                $dados .='
                <a href="desativar_usuario.php?pg='.$_GET['pg'].'&tela='.$_GET['tela'].'&saida=1&cpf='.$rowResultado['cpf'].'&sistema='.$rowResultado['sistema'].'&acao=1&api=true" title="Ativar" class="btn btn-success btn-sm">
                    <i class="bi bi-check-square"></i>
                </a>';
                } else {
                $dados .='  
                <a href="desativar_usuario.php?pg='.$_GET['pg'].'&tela='.$_GET['tela'].'&saida=1&cpf='.$rowResultado['cpf'].'&sistema='.$rowResultado['sistema'].'&acao=2&api=true" title="Desativar" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash"></i>
                </a>';
                }
            $dados .= '</td>
        </tr>';
}

?>