<?php

$url = "http://10.100.1.215/smartshare/inc/smartApi.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$resultado = json_decode(curl_exec($ch));

foreach ($resultado->empresaSmart as $empSmart) {

    switch ($empSmart->SISTEMA) {
        case "A":
            $sistema = "APOLLO";
            break;
        case "N":
            $sistema = "BANCO NBS";
            break;
        case "H":
            $sistema = "BANCO HARLEY";
            break;
        case " ":
            $sistema = "EMPRESA QUE NÃO USA SISTEMA ERP";
            break;
        case "0":
            $sistema = "EMPRESA QUE NÃO USA SISTEMA ERP";
            break;
    }

$consorcio = ($empSmart->CONSORCIO == 'S') ? 'SIM' : 'NÃO';

$situacao = ($empSmart->SITUACAO == 'A') ? 'ATIVO' : 'DESATIVADO';

$valueApollo = ($rowemp['EMPRESA_APOLLO'] == 0) ? '' : $rowemp['EMPRESA_APOLLO'];

$valueRevApollo = ($rowemp['REVENDA_APOLLO'] == 0) ? '' : $rowemp['REVENDA_APOLLO'];

$valueEmpNbs = ($rowemp['EMPRESA_NBS'] == 0) ? '' : $rowemp['EMPRESA_NBS'];

if($rowemp->ID != null){

}else{

}

    $tabela .= '
                <tr>
                    <td>'.$empSmart->ID.'</td>
                    <td>'.$empSmart->EMPRESA.'</td>
                    <td>'.$empSmart->UF.'</td>
                    <td>'.$sistema.'</td>
                    <td>'.$consorcio.'</td>
                    <td>'.$situacao.'</td>
                    <td><a href="editEmp.php?pg=2&tela=3&ID='.$empSmart->ID.'" title="Editar" class="btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                        
                        <a href="#" title="Desativar" class="btn-danger btn-sm"><i class="bi bi-trash"></i></a>

                        <a href="#" title="Exibir mais informações" class="btn-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                    </td>
                </tr>';
}
