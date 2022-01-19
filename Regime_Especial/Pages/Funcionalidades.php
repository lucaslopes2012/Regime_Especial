<?php

require_once('../Projeto_Config.php');
require_once(DBAPI);

$Registros = null;
$Registro = null;

/*
 *Realiza autenticação de Usuário no Sistema.
 */
function Login(){

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
		$Registro = $_POST['registro'];
		$Token = Autenticacao('Registro', $Registro);

		if($Token === true){

			$_SESSION['message'] = 'Login efetuado com sucesso!';
      		$_SESSION['type'] = 'success';
			header("refresh: 5; url=Dashboard.php");

		}else
		{

			$_SESSION['message'] = 'Usuário e Senha inválidos! por favor informe os dados corretamente.';
			$_SESSION['type'] = 'danger';

		}
		

	}		

}

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
 *Atualizacao/Edicao de Cliente
 */
function Edit() {

	if (isset($_GET['ID'])) {
  
	  $ID = $_GET['ID'];
	  
  
	  if (isset($_POST['registro'])) {  
		
		$Registro = $_POST['registro'];
		/*$customer['modified'] = $now->format("Y-m-d H:i:s"); */
		
		Update('Registro', $ID, $Registro);
		header('location: home.php');
  
	} else {
  
		global $Registro;
		$Registro = find('Registro', $ID);
	  } 
  
	} else {
  
	  header('location: home.php?=' . $A);
  
	}
}

/*

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