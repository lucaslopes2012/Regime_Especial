<?php

    $db_name = "BD";
    $db_host = "localhost:3306";
    $db_user = "root";
    $db_password = "";

    abstract class BDConfig{

        protected function OpenBD(){
            
            try{
                
                $BD = new Pdo("mysql:dbname=".$db_name.";host=".$db_host,$db_user,$db_password);   
                return $BD;    
        
            } catch(PDOException $Erro){
                
                return $Erro->getMessage();
        
            }
        }
    }

?>
