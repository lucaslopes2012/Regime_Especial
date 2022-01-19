<?php 

  require_once('Funcionalidades.php'); 
  Login();
  include(HEADER_TEMPLATE); 

?>

<h2>LOGIN</h2>

<Form method="POST" action="index.php">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo1">Usuário:</label>
      <input type="text" class="form-control" name="registro['Usuario']" required>
    </div>
  </div>
  <div class="row">  
    <div class="form-group col-md-3">
      <label for="campo2">Senha:</label>
      <input type="password" class="form-control" name="registro['Senha']" required>
    </div>
  </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Entrar</button>
      <a href="#" class="btn btn-default">Registrar-se</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>