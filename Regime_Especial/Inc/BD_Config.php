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

        $Sql = $BD->prepare("SELECT * FROM " . $Tabela . " WHERE ID = :ID");
        $Sql->bindvalue(":ID", $ID);
        $Sql->execute();

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


?>
