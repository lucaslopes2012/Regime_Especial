<?php

    require 'BDconfig.php';

    $ID = filter_input(INPUT_GET, 'id');

    if ($ID){
        $sql = $pdo->prepare("DELETE From Registro where ID = :ID");
        $sql->bindvalue(":ID", $ID);
        $sql->execute();

        header("location: home.php");
        Echo "Registro excluido com sucesso!";
        exit;

    }else{

        header("location: home.php");

    }
?>
