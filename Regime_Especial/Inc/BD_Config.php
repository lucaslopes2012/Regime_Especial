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
 *	Atualizacao/Edicao de Cliente
 */
function Edit() {

  /**$now = date_create('now', new DateTimeZone('America/Sao_Paulo')); */

  if (isset($_GET['ID'])) {

    $ID = $_GET['ID'];
    var_dump(isset($_POST['registro']));

    if (isset($_POST['registro'])) {

      echo "Não passo if";

      $Registro = $_POST['registro'];
      /*$customer['modified'] = $now->format("Y-m-d H:i:s"); */

      Update('Registro', $ID, $Registro);
      header('location: view.php');
    } else {

      global $Registro;
      $Registro = find('Registro', $ID);
    } 

  } else {

    header('location: home.php');

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

    $Sql = $BD->query("UPDATE " . $Tabela . " SET $items" . " WHERE ID = " . $Registro["'Usuario'"] . ";");

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

      $Sql = $BD->prepare("DELETE FROM " . $Tabela . " WHERE ID = " . $ID . ";");
      $result = $database->query($sql);

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
