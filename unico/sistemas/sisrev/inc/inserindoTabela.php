<?php
                require_once('../config/query.php');
                require_once('../../../config/databases.php');

                
                $conSucesso = $conn->query($queryTabela);
                $row = $conSucesso->fetch_assoc();
                
                

                while($row = $conSucesso->fetch_assoc()){

                 
                  $consorcio = ($row["CONSORCIO"] == 'S') ? 'SIM' : 'NÃO';

                  $situacao = ($row["SITUACAO"] == 'A') ? 'ATIVO' : 'DESATIVADO';

                  
                  switch ($row["SISTEMA"]) {
                    case "A":
                        $sistemaMysql = "APOLLO";
                        break;
                    case "N":
                        $sistemaMysql = "BANCO NBS";
                        break;
                    case "H":
                        $sistemaMysql = "BANCO HARLEY";
                        break;
                    case " ":
                        $sistemaMysql = "EMPRESA QUE NÃO USA SISTEMA ERP";
                        break;
                    case "0":
                        $sistemaMysql = "EMPRESA QUE NÃO USA SISTEMA ERP";
                        break;
                }

                  echo '<tr>
                  <td>'.$row["ID_EMPRESA"].'</td>
                  <td>'.$row["NOME_EMPRESA"].'</td>
                  <td>'.$row["UF_GESTAO"].'</td>
                  <td>'.$sistemaMysql.'</td>
                  <td>'.$consorcio.'</td>
                  <td>'.$situacao.'</td>
                  <td><a href="editEmp.php?pg='.$_GET["pg"].'&tela=3&ID='.$row["ID_EMPRESA"].'" title="Editar" class="btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                            
                            <a href="#" title="Desativar" class="btn-danger btn-sm"><i class="bi bi-trash"></i></a>

                            <a href="#" data-bs-toggle="modal" data-bs-target="#idempresa'.$row["ID_EMPRESA"].'" title="Exibir mais informações" class="btn-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                        </td>
              </tr>';
            
           echo '
                      <div class="modal fade" id="idempresa'.$row["ID_EMPRESA"].'" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">'.$row["NOME_EMPRESA"].'</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <button type="button" class="btn btn-light mb-2">
                              EMPRESA BNS <span class="badge bg-secondary text-light">'.$row["EMPRESA_NBS"].'</span>
                              </button>
                              <button type="button" class="btn btn-light mb-2">
                              EMPRESA APOLLO <span class="badge bg-secondary text-light">'.$row["EMPRESA_APOLLO"].'</span>
                              </button>
                              <button type="button" class="btn btn-light mb-2">
                              REVENDA APOLLO <span class="badge bg-secondary text-light">'.$row["REVENDA_APOLLO"].'</span>
                              </button>
                              <button type="button" class="btn btn-light mb-2">
                              ORGANOGRAMA <span class="badge bg-secondary text-light">'.$row["ORGANOGRAMA_SENIOR"].'</span>
                              </button>
                              <button type="button" class="btn btn-light mb-2">
                              EMPRESA SENIOR <span class="badge bg-secondary text-light">'.$row["EMPRESA_SENIOR"].'</span>
                              </button>
                              <button type="button" class="btn btn-light mb-2">
                              FILIAL SENIOR <span class="badge bg-secondary text-light">'.$row["FILIAL_SENIOR"].'</span>
                              </button>
                              <button type="button" class="btn btn-light mb-2">
                              APROVADOR CAIXA <span class="badge bg-secondary text-light">'.$row["APROVADOR_CAIXA"].'</span>
                              </button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                          </div>
                        </div>
                      </div>     
                  
               
              
          ';
        
         
        
      }
           ?>