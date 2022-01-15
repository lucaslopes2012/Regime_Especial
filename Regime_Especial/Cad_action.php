<?php

    require 'BDconfig.php';

    $Nome = filter_input (INPUT_POST, 'nome');
    $RG = filter_input (INPUT_POST, 'rg');
    $CPF = filter_input (INPUT_POST, 'cpf');
    $Data_Nascimento = filter_input (INPUT_POST, 'data_nasc');
    $Celular = filter_input (INPUT_POST, 'celular');
    $Endereco = filter_input (INPUT_POST, 'endereco');
    $Senha = filter_input (INPUT_POST, 'senha');
    $Usuario = filter_input (INPUT_POST, 'usuario');

    if($Nome && $RG && $CPF && $Data_Nascimento && $Celular && $Endereco && $Senha && $Usuario){

        $sql = $pdo->prepare("SELECT * FROM Registro WHERE Usuario = :Usuario");
        $sql->bindValue(':Usuario', $Usuario);
        $sql->execute();
        
        if($sql->rowCount() === 0){
            
            $sql = $pdo->prepare("INSERT INTO Registro (Nome, RG, CPF, Data_Nasc, Celular, Endereco, 
            Usuario, Senha) VALUES (:Nome, :RG, :CPF, :Data_Nascimento, :Celular, :Endereco, :Usuario, 
            :Senha)");
        
            $sql->bindValue(':Nome', $Nome);
            $sql->bindValue(':RG', $RG);
            $sql->bindValue(':CPF', $CPF);
            $sql->bindValue(':Data_Nascimento', $Data_Nascimento);
            $sql->bindValue(':Celular', $Celular);
            $sql->bindValue(':Endereco', $Endereco);
            $sql->bindValue(':Usuario', $Usuario);
            $sql->bindValue(':Senha', $Senha);
            $sql->execute();
        
            header("location: Home.php");
            exit;

        }else{

            header("location: cad.php");
            exit;

        }

    }else{

        header("location: cad.php");
        exit;

    }

?>









