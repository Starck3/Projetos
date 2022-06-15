<?php

/* ==== TELAS ====*/
$tela = basename($_SERVER['PHP_SELF']);

/* ==== REGRAS ====*/
//index.php
if($tela == "index.php"){if($_GET['pg'] != '1'){echo '<script>window.location.href = "index.php?pg=1";</script>';}}
//pesquisa.php
if($tela == "pesquisa.php"){if($_GET['tela'] != '1' OR $_GET['pg'] != '1'){echo '<script>window.location.href = "pesquisa.php?pg=1&tela=1";</script>';}}
//informatica.php
if($tela == "informatica.php"){if($_GET['pg'] != '2'){echo '<script>window.location.href = "informatica.php?pg=2";</script>';}}
//empresas.php
if($tela == "empresas.php"){if($_GET['tela'] != '2' OR $_GET['pg'] != '2'){echo '<script>window.location.href = "empresas.php?pg=2&tela=2";</script>';}}
//editEmp.php
if($tela == "editEmp.php"){if($_GET['tela'] != '3' OR $_GET['pg'] != '2'){echo '<script>window.location.href = "editEmp.php?pg=7&tela=4";</script>';}}
//desativar_usuario.php
if($tela == "desativar_usuario.php"){if($_GET['tela'] != '1' OR $_GET['pg'] != '2'){echo '<script>window.location.href = "desativar_usuario.php?pg=2&tela=1";</script>';}}
//politicamente_exposto.php
if($tela == "politicamente_exposto.php"){if($_GET['tela'] != '3' OR $_GET['pg'] != '2'){echo '<script>window.location.href = "politicamente_exposto.php?pg=2&tela=3";</script>';}}
//Administracao.php
if($tela == "administracao.php"){if($_GET['pg'] != '3'){echo '<script>window.location.href = "administracao.php?pg=3";</script>';}}
//processosFabrica.php
if($tela == "processos.php"){if($_GET['tela'] != '1' OR $_GET['pg'] != '3'){echo '<script>window.location.href = "processos.php?pg=3&tela=1";</script>';}}
//processos
if($tela == "processosFabrica.php"){if($_GET['tela'] != '2' OR $_GET['pg'] != '3'){echo '<script>window.location.href = "processosFabrica.php?pg=3&tela=2";</script>';}}
//configuracao.php
if($tela == "configuracao.php"){if($_GET['pg'] != '4'){echo '<script>window.location.href = "configuracao.php?pg=4";</script>';}}
//ajuda.php
if($tela == "ajuda.php"){if($_GET['pg'] != '5'){echo '<script>window.location.href = "ajuda.php?pg=5";</script>';}}
//telas_funcoes.php
if($tela == "telas_funcoes.php"){if($_GET['pg'] != '4' OR $_GET['tela'] != '1'){echo'<script>window.location.href = "telas_funcoes.php?pg=4&tela=1";</script>';}}
//Atribuir Funções
if($tela == "cadastro_funcao.php"){if($_GET['pg'] != '4' OR $_GET['tela'] != '5'){echo'<script>window.location.href = "cadastro_funcao.php?pg=4&tela=2";</script>';}}
//Config Usuários
if($tela == "usuarios.php"){if($_GET['pg'] != '4' OR $_GET['tela'] != '3'){echo '<script>window.location.href = "usuarios.php?pg=4&tela=3";</script>';}}
?>

