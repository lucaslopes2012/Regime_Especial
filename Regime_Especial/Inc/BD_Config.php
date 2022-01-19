<?php
    // abstract class BDConfig{

    //     protected function OpenBD(){
            
    //         try{
                
    //             $PDO = new Pdo("mysql:dbname=". DB_NAME .";host=". DB_HOST,DB_USER,DB_PASSWORD);   
    //             return $PDO;    
        
    //         } catch(PDOException $Erro){
                
    //             return $Erro->getMessage();
        
    //         }
    //     }
    // }

/**
 *  Realiza a Conexão com o Banco de Dados
 */
function OpenBD(){
    
    try{ 
        
        $PDO = new Pdo("mysql:dbname=". DB_NAME .";host=". DB_HOST,DB_USER,DB_PASSWORD);   
        return $PDO;    

    } catch(PDOException $Erro){

        return $Erro->getMessage();

    }
    
}

/**
 *  Pesquisa Credencia do Usuário no sistema.
 */
function Autenticacao($Tabela = null, $Registro = null){
  
	$BD = OpenBD();

  try {

    $Where = "Usuario = '" . $Registro["'Usuario'"] . "' and Senha = '" . $Registro["'Senha'"];
    $Sql = $BD->query("SELECT * FROM " . $Tabela . " WHERE " . $Where ."';");

    if ($Sql->rowCount() > 0){

      $_SESSION['message'] = 'Login efetuado com sucesso!';
      $_SESSION['type'] = 'success';    

      return true;

    }

	} catch (Exception $e) {

	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';

  }

  //return "SIM";

}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find($Tabela = null, $ID = null ) {
  
	$BD = OpenBD();
	$Registros = null;

	try {
	  if ($ID) {

      $Sql = $BD->query("SELECT * FROM " . $Tabela . " WHERE ID = " .$ID .";");
      if($Sql->rowCount() > 0 ){
          
        $Registros = $Sql->fetch(PDO::FETCH_ASSOC);
          
      }

	  } else {
	    
        $Sql = $BD->query("SELECT * FROM " . $Tabela);
        if ($Sql->rowCount() > 0){
            $Registros = $Sql->fetchAll(pdo::FETCH_ASSOC);
        }

	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	return $Registros;
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function find_all($Tabela ) {

    return find($Tabela);

}

/**
*  Insere um registro no BD
*/
function Save($Tabela = null, $Registro = null) {

    $BD = OpenBD();
  
    $columns = null;
    $values = null;
    
    $Sql = $BD->query("SELECT * FROM " . $Tabela . " WHERE Usuario = '" . $Registro["'Usuario'"] . "';"); 
     
    if($Sql->rowCount() === 0){

      foreach ($Registro as $key => $value) {
        $columns .= trim($key, "'") . ",";
        $values .= "'$value',";
      }
      // remove a ultima virgula
      $columns = rtrim($columns, ',');
      $values = rtrim($values, ',');
    
      try {
  
        $Sql = $BD->query("INSERT INTO " . $Tabela . "($columns)" . " VALUES " . "($values);");
  
        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';
      
      } catch (Exception $e) { 
      
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
      } 

    }else{

      $_SESSION['message'] = 'Usuário de Login já cadastrado no sistema!.';
      $_SESSION['type'] = 'danger';

    }
    
  }

/**
 *  Atualiza um registro em uma tabela, por ID
 */
function Update($Tabela = null, $ID = 0, $Registro = null) {

  $BD = OpenBD();

  $items = null;

  foreach ($Registro as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }

  // remove a ultima virgula
  $items = rtrim($items, ',');

  try {
    
    $Sql = $BD->query("UPDATE " . $Tabela . " SET $items" . " WHERE ID = " . $ID . ";");
    
    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';

  } catch (Exception $e) { 

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function Remove($Tabela = null, $ID = null ) {

  $BD = OpenBD();
	
  try {
    if ($ID) {

      $Sql = $BD->query("DELETE FROM " . $Tabela . " WHERE ID = " . $ID . ";");

      if ($Sql) {   	

        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';

      }

    }
  } catch (Exception $e) { 

    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';

  }

}


?>
