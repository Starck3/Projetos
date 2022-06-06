<?php

	//CONFIG SERVIDOR
	$ipservidorUnico = "10.100.1.66";	
	$portaUnico = "3306";
	$userUnico = "unico";
	$passUnico = "#CAvpnGSVP20";
	$dbnameUnico = "unico";

	//DATA BASE NOTAS
	$ipservidorNotas = "10.100.1.66";	
	$portaNotas = "3306";
	$userNotas = "dbnotas";
	$passNotas = "#CAvpnGSVP20";
	$dbnameNotas = "dbnotas";

	// ########### UNICO ###########
	$conn = new mysqli($ipservidorUnico, $userUnico, $passUnico, $dbnameUnico, $portaUnico);
	if ($conn->connect_error) {
		die("ERRO CONEXÂO SERVIDOR UNICO: " . $conn->connect_error);
	}

	// ########### DBNOTAS ###########
	$connNOTAS = new mysqli($ipservidorNotas, $userNotas, $passNotas, $dbnameNotas, $portaNotas);
	if ($connNOTAS->connect_error) {
		die("ERRO CONEXÂO SERVIDOR DBNOTAS: " . $connNOTAS->connect_error);
	}
	
?>







