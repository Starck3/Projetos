<?php
     $serverName = "10.129.1.253\\SQLSERVOPA"; //serverName\instanceName

     $connectionInfo = array("Database"=>"Vetorh", "UID"=>"Selbetti", "PWD"=>"Selbetti2021#");

     $conn = sqlsrv_connect($serverName, $connectionInfo);

     if(!$conn) {
          echo "Não foi possível estabelecer a conexão com o banco ".$serverName.".<br />";
          die( print_r(sqlsrv_errors(), true));
          exit;
     }

?>