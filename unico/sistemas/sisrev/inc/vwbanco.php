<?php

require_once('../config/query.php');
 
  $filial = null;
  if(isset($_POST['filial'])){
    $filial = $_POST['filial'];
  }
  if($filial !== null){

    for($i=0;$i<count($filial); $i++){
      
      $data = $_POST['data'];
      empty($data)? $data = date('dmY') : '' ;

      $diretorioArquivo = '../documentos/CAR/'.$data.'/'.$filial[$i].'';

        if(file_exists($diretorioArquivo)){
          
          $handle = array(file($diretorioArquivo));

          foreach($handle as $row){

            $ler = $row[0];

            $inicio = substr($ler,0,3);

            if($inicio == 'FHI'){
              
              $ler = $row[1];

              $FPI = substr($ler,0,3);

              $i= 2;
              
              while($i < count($row)){

                $ler = $row[$i];

                $numeroIpi = substr($ler,118,10);
                $layout = substr($ler,187,6);
                $valorIpi = substr($ler,96,10);
                $numeroCaixa = substr($ler,143,9);
                $nomeProduto = substr($ler,65 , 13);
                $nomeProduto = trim($nomeProduto);
                if($nomeProduto === '' OR '/'){
                  $nomeProduto = str_replace('/','',$nomeProduto);
                  $nomeProduto = trim($nomeProduto);
                }
                $dataNota = substr($ler,33 , 8);
                $dataNota = substr_replace($dataNota, '/',2,0);
                $dataNota = substr_replace($dataNota, '/',5,0);
                $dataNota = implode('-', array_reverse(explode('/', $dataNota)));

                $numeroNota = substr($ler,27, 5);
                $FP9 = substr($ler,0,3);
                if($FP9 != 'FP9'){
                  break;
                }
                
                $inserirBancoDados = 'INSERT INTO carga_vw_info(numero_nota,data_nota,produto,caixa,tot_item,val_ipi,layout) VALUES ("'.$numeroNota.'","'.$dataNota.'","'.$nomeProduto.'","'.$numeroCaixa.'","'.$numeroIpi.'","'.$valorIpi.'","'.$layout.'")';
                $resultado = $conn->query($inserirBancoDados);
                if($resultado){
                  header('location: ../front/etiquetaLaser.php');
                }else{
                  echo $inserirBancoDados;
                }
                $i++;
              }
              

            }else{
              echo 'nao deu';
            }

            
              

            }
            

          }

        }
        
  }else{
    echo 'arquivo nao existe'; }
exit;

    

    foreach($handle as $row => $array){
      
     

      $array5 = $array[3];
      $numeroNota = substr($array5,27, 5);

      $array5 = $array[3];
      $dataNota = substr($array5,33 , 8);

      $array5 = $array[3];
      $nomeProduto = substr($array5,65 , 13);
      $nomeProduto = trim($nomeProduto);
      if($nomeProduto === '' OR '/'){
        $nomeProduto = str_replace('/','',$nomeProduto);
        $nomeProduto = trim($nomeProduto);
      }
      
      $array5 = $array[3];
      $numeroCaixa = substr($array5,143,9);
      
      $array5 = $array[3];
      $numeroIpi = substr($array5,118,10);

      $array5 = $array[3];
      $valorIpi = substr($array5,96,10);

      $array5 = $array[3];
      $layout = substr($array5,187,6);
      
      $inserirBancoDados = 'INSERT INTO carga_vw_info(numero_nota,data_nota,produto,caixa,tot_item,val_ipi,layout) VALUES ("'.$numeroNota.'","'.$dataNota.'","'.$nomeProduto.'","'.$numeroCaixa.'","'.$numeroIpi.'","'.$valorIpi.'","'.$layout.'")';
      $resultado = $conn->query($inserirBancoDados);
      if($resultado){
        echo 'deu boa';
      }else{
        echo $inserirBancoDados;
      }
  } 

  // }else{
  //   echo 'arquivo não existe';
  // }

  // foreach($diretorioArquivo as $row => $array){