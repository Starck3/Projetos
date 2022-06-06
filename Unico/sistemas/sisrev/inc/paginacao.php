<?php

/* ==== TELAS ====*/
$tela = basename($_SERVER['PHP_SELF']);

/* ==== REGRAS ====*/
//index.php
if($tela == "index.php"){if($_GET['pg'] != '1'){echo '<script>window.location.href = "index.php?pg=1";</script>';}}
//informatica.php
if($tela == "informatica.php"){if($_GET['pg'] != '2'){echo '<script>window.location.href = "informatica.php?pg=2";</script>';}}
//desativar_usuario.php
if($tela == "desativar_usuario.php"){if($_GET['tela'] != '1' OR $_GET['pg'] != '2'){echo '<script>window.location.href = "desativar_usuario.php?pg=2&tela=1";</script>';}}
//empresas.php
if($tela == "empresas.php"){if($_GET['tela'] != '2' OR $_GET['pg'] != '2'){echo '<script>window.location.href = "empresas.php?pg=2&tela=2";</script>';}}
//editEmp.php
if($tela == "editEmp.php"){if($_GET['tela'] != '3' OR $_GET['pg'] != '2'){echo '<script>window.location.href = "editEmp.php?pg=2&tela=3";</script>';}}
//politicamente_exposto.php
if($tela == "politicamente_exposto.php"){if($_GET['tela'] != '3' OR $_GET['pg'] != '2'){echo '<script>window.location.href = "politicamente_exposto.php?pg=2&tela=3";</script>';}}
//configuracao.php
if($tela == "configuracao.php"){if($_GET['pg'] != '4'){echo '<script>window.location.href = "configuracao.php?pg=4";</script>';}}
//ajuda.php
if($tela == "ajuda.php"){if($_GET['pg'] != '5'){echo '<script>window.location.href = "ajuda.php?pg=5";</script>';}}

