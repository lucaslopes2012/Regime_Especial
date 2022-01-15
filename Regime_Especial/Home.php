<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Projeto - Regime Especial</title>
  </head>
  <header>
    <h1>USUÁRIOS REGISTRADOS</h1>
    <?php

      require 'BDconfig.php';

      $lista = [];
      $sql = $pdo->query("SELECT * FROM Registro");
      if ($sql->rowCount() > 0){
        $lista = $sql->fetchAll(pdo::FETCH_ASSOC);
      }
    ?>
  </header>
  <body>
    <div>
      <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>RG</th>
            <th>CPF</th>
            <th>Data Nasc.</th>
            <th>Celular</th>
            <th>Endereço</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>
        <?php foreach($lista as $usuario): ?>
            <tr>
              <td><?=$usuario['ID'];?></td>
              <td><?=$usuario['Nome'];?></td>
              <td><?=$usuario['RG'];?></td>
              <td><?=$usuario['CPF'];?></td>
              <td><?=$usuario['Data_Nasc'];?></td>
              <td><?=$usuario['Celular'];?></td>
              <td><?=$usuario['Endereco'];?></td>
              <td><?=$usuario['Usuario'];?></td>
              <td>
                  <a href="edit.php?id=<?=$usuario['ID'];?>">[ Editar ]</a>
                  <a href="del.php?id=<?=$usuario['ID'];?>">[ Excluir ]</a>     
              </td>
            </tr>
        <?php endforeach; ?>
      </table>
    </Div>
    <Div>
      <br/><a href="cad.php">[ Incluir Usuário ]</a>
    </Div>
  </body>
</html>