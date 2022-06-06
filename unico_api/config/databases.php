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
		$user = "nbs";
		$pass = "new";
		$dbstr = "(DESCRIPTION =

		(ADDRESS = (PROTOCOL = TCP)(HOST = 10.100.1.209)(PORT = 1522))

		(CONNECT_DATA =

		(SERVER = DEDICATED)

		(SERVICE_NAME = NBS)

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

?>
