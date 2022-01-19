<?php 
  require_once('Funcionalidades.php'); 

  if (isset($_GET['ID'])){

    delete($_GET['ID']);

  } else {
    
    die("ERRO: Código de registro não encontrado!");
    
  }
?>