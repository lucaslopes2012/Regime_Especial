<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Projeto - Regime Especial</title>
    <link rel="stylesheet" href="Css/Design.css">
  </head>
  <header>
    <h1>Login</h1>
  </header>
  <body>
    <? 
      
      require('Inc/BD_Config.php');
      require_once DBAPI;

      $pdo = OpenBD(); 
    
    ?>
    <div>
        <Form method="post">
            <Label>
                Usuário: <input type="text" name="usuario"/>
            </Label>
            <Label>
                Senha: <input type="text" name="senha"/>
            </Label>
            <input type="submit" value="Entrar"/>
        </Form>
    </Div>
    <Div>
      <?php
      
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          

          $Usuario = filter_input(INPUT_POST, 'usuario');
          $Senha = filter_input(INPUT_POST, 'senha');
  
          if ($Usuario && $Senha){
  
            $sql = $pdo->prepare("SELECT * From Registro WHERE Usuario = :Usuario and Senha = :Senha;");
            $sql->bindValue(':Usuario', $Usuario);
            $sql->bindValue(':Senha', $Senha);
            $sql->execute();
  
            if($sql->rowCount() > 0){
  
              echo "<br/><label>Login efetuado com sucesso!</label>";
              header("refresh: 5; url=" BASEURL "Pages/home.php");
  
            }else{
  
              echo "<br/><label>Login inválido!!<br/> Usuário: [".$Usuario."] e Senha: [".$Senha."] 
              não encontrados, por favor informe os dados corretamente. </label>";
  
            }
          }else{
  
            Echo "<br/><label>Login inválido!!<br/> Por favor preencha os campos corretamente.</label>";
  
          }
        }
      ?>
    </Div>
    <Div>
      <br/>
      <a href="">[ Registrar ]</a>
      <a href="">[ Recuperar Senha ]</a>
    </Div>
  </body>
</html>