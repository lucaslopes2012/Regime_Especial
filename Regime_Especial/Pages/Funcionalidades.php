<?php

require_once('../Projeto_Config.php');
require_once(DBAPI);

$Registros = null;
$Registro = null;

/**
 *  Listagem de Clientes
 */
function index(){
    
	global $Registros;
	$Registros = find_all('Registro');

}
