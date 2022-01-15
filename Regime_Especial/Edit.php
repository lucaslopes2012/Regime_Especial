<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Projeto - Regime Especial</title>
    <?php
        require 'BDconfig.php';
    ?>
  </head>
  <header>
    <h1>ALTERAÇÃO DE REGISTRO DE USUÁRIOS</h1>
  </header>
  <body>
    <?php

        $Usuario = [];
        $ID = filter_input(INPUT_GET, 'id');

        if ($ID){

            $sql = $pdo->prepare("Select * From registro where ID = :ID");
            $sql->bindvalue(":ID", $ID);
            $sql->execute();

            if($sql->rowCount() > 0 ){
                
                $Usuario = $sql->fetch(PDO::FETCH_ASSOC);
                
            }else{
                
                header("location: home.php");
                exit;

            }

        }else{

            header("location: home.php");

        }

    ?>
    <Form method="post" action="edit_action.php">
        <input type="hidden" name="codigo" value="<?=$Usuario['ID'];?>"/>
        <Label>
            Nome: <input type="text" name="nome" value="<?=$Usuario['Nome'];?>"/>
        </Label>
        <Label>
            RG: <input type="text" name="rg" value="<?=$Usuario['RG'];?>"/>
        </Label>
        <Label>
            CPF: <input type="text" name="cpf" value="<?=$Usuario['CPF'];?>"/>
        </Label>
        <Label>
            Data de Nascimento: <input type="date" name="data_nasc" value="<?=$Usuario['Data_Nasc'];?>"/>
        </Label>
        <Label>
            Celular: <input type="text" name="celular" value="<?=$Usuario['Celular'];?>"/>
        </Label>
        <Label>
            Endereço: <input type="text" name="endereco" value="<?=$Usuario['Endereco'];?>"/>
        </Label>
        <Label>
            Usuário: <input type="text" name="usuario" value="<?=$Usuario['Usuario'];?>"/>
        </Label>
        <Label>
            Senha: <input type="text" name="senha" value="<?=$Usuario['Senha'];?>"/>
        </Label>
        <input type="submit" value="Alterar"/>
    </Form>
  </body>
</html>