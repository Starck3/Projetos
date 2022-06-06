<?php

    $url = "http://10.100.1.215/unico_api/sisrev/api_nbs.php";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    $resultado = json_decode(curl_exec($ch));

    /* var_dump($resultado); */

    foreach ($resultado->usuariosNbs as $usuarioNbs) {

        $insert = "INSERT INTO cad_usuario_api (nome, cpf, ativo, sistema)
                    VALUES ('".$usuarioNbs->nome."', 
                            '".$usuarioNbs->cpf."', 
                            '".$usuarioNbs->demitido."', 
                            '".$usuarioNbs->sistema."');
        "; 
        !$execInsert = $conn->query($insert) ?: ''; //preenchimento da tabela no unico
    }

?>