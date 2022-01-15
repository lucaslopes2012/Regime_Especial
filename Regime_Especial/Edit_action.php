<?php

    require 'BDconfig.php';

    $ID = filter_input(INPUT_POST, 'codigo');
    $Nome = filter_input(INPUT_POST, 'nome');
    $RG = filter_input(INPUT_POST, 'rg');
    $CPF = filter_input(INPUT_POST, 'cpf');
    $Data_Nascimento = filter_input(INPUT_POST, 'data_nasc');
    $Celular = filter_input(INPUT_POST, 'celular');
    $Endereco = filter_input(INPUT_POST, 'endereco');
    $Senha = filter_input(INPUT_POST, 'senha');
    $Usuario = filter_input(INPUT_POST, 'usuario');

    if ($ID && $Nome && $RG && $CPF && $Data_Nascimento && $Celular && $Endereco && $Senha && $Usuario){
        $sql = $pdo->prepare("UPDATE Registro SET Nome = :Nome, RG = :RG, CPF = :CPF,
        Data_Nasc = :Data_Nascimento, Celular = :Celular, Endereco = :Endereco, Usuario = :Usuario,
        Senha = :Senha Where ID = :ID");
    
        $sql->bindValue(':ID', $ID);
        $sql->bindValue(':Nome', $Nome);
        $sql->bindValue(':RG', $RG);
        $sql->bindValue(':CPF', $CPF);
        $sql->bindValue(':Data_Nascimento', $Data_Nascimento);
        $sql->bindValue(':Celular', $Celular);
        $sql->bindValue(':Endereco', $Endereco);
        $sql->bindValue(':Usuario', $Usuario);
        $sql->bindValue(':Senha', $Senha);
        $sql->execute();

        header("location: home.php");
        exit;

    }else{
        header("location: index.php");
        exit;
    }

?>