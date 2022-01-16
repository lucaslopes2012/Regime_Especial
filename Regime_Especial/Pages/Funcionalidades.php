<?php

require_once('../Projeto_Config.php');
require_once(DBAPI);

$Registros = null;
$Registro = null;

/**
 *  Listagem de Registros
 */
function Index(){
    
	global $Registros;
	$Registros = find_all('Registro');

}

/**
 *  Cadastro de Registros
 */
function Add() {

	if (!empty($_POST['registro'])) {
	  /* $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
	  	 $Registro = $_POST['registro'];
	     $Registro['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
	  */
	  $Registro = $_POST['registro'];
	  	  
	  Save('Registro', $Registro);
	  header('location: Home.php');

	}
  }

  /**
 *  Visualização de perfil de Registros
 */
function View($ID = null) {
	global $Registro;
	$Registro = find('Registro', $ID);
}

/**
 *  Exclusão de um Cliente
 */
function Delete($ID = null) {

	global $Registro;
	$Registro = Remove('Registro', $ID);
  
	header('location: Home.php');

  }
