<?php

	// CRIANDO CONEXÃO DO APOLLO
	//10.100.1.209:1523 é de produção
	//10.100.1.205:1525 é de testes
	$user = "gruposervopa";
	$pass = "ninguemsabe";
	$dbstr = "(DESCRIPTION =

				(ADDRESS = (PROTOCOL = TCP)(HOST = 10.100.1.205)(PORT = 1525))

				(CONNECT_DATA =

				(SERVER = DEDICATED)

				(SERVICE_NAME = APOLLO_TESTE)

			)
	)";

	$connApollo = oci_connect($user, $pass, $dbstr);

	// Check connection
	if (!$connApollo) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	} else {
		/* echo 'Conexão Apollo realizada com Sucesso!<br>'; */
	}	
			
	// CRIANDO CONEXÃO DO NBS
	//10.100.1.209:1522 é de produção
	//10.100.1.205:1524 é de testes
	$user = "nbs";
	$pass = "new";
	$dbstr = "(DESCRIPTION =

				(ADDRESS = (PROTOCOL = TCP)(HOST = 10.100.1.205)(PORT = 1524))

				(CONNECT_DATA =

				(SERVER = DEDICATED)

				(SERVICE_NAME = NBS_TESTE)

			)
	)";

	$connNbs = oci_connect($user, $pass, $dbstr);

	// Check connection
	if(!$connNbs){
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	} else {
		/* echo 'Conexão Nbs realizada com Sucesso!'; */
	}
	
	//SERVIDOR UNICO
	$ipservidorUnico = "10.100.1.66";	
	$portaUnico = "3306";
	$userUnico = "unico";
	$passUnico = "#CAvpnGSVP20";
	$dbnameUnico = "unico";

	// ########### UNICO ###########
	$connUNICO = new mysqli($ipservidorUnico, $userUnico, $passUnico, $dbnameUnico, $portaUnico);
	if ($connUNICO->connect_error) {
		die("ERRO CONEXÂO SERVIDOR UNICO: " . $connUNICO->connect_error);
	}

?>