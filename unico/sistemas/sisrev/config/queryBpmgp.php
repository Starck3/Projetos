<?php 


$queryTabela = "SELECT * FROM `empresas_bpmgp` where ID_EMPRESA NOT IN(302,208,261) ORDER BY id ASC;";

$consorcio = ($row["CONSORCIO"] == 'S') ? 'SIM' : 'NÃO';

$situacao = ($row["SITUACAO"] == 'A') ? 'ATIVO' : 'DESATIVADO';

$valueApollo = ($row["EMPRESA_APOLLO"] == 0) ? '' : $row["EMPRESA_APOLLO"];

$valueRevApollo = ($row["REVENDA_APOLO"] == 0) ? '' : $row["REVENDA_APOLO"];

$valueEmpNbs = ($row["EMPRESA_NBS"] == 0) ? '' : $row["EMPRESA_NBS"];

$editarTabela = "SELECT * FROM `sisrev_empresas_bpmgp` ";

?>