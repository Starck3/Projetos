<?php

require_once('../config/query.php');

$arquivo = $_FILES['arquivo']['type'];

if ($arquivo === 'text/plain'){

  $data = date('dmY') ;

  $folderName = rtrim($data, '2022');

  $fileName = $folderName . $_FILES['arquivo']['name'];


  $uploaddir = '/var/www/html/unico/sistemas/sisrev/documentos/CAR/'.$data.'';
  // $uploadfile = $uploaddir . basename($data);
  if (is_dir($uploaddir)) {
    echo 'deu certo';
  }else{
    $resultado = mkdir($uploaddir,0777,true);
    if($resultado){
      echo 'deu tudo certo';
    }else{
      echo 'nao deu certo';
    }
  }
}else{
  echo 'nao é um arquivo compativel';}
  