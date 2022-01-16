<?php 

  require_once('Funcionalidades.php'); 
  Add();
  include(HEADER_TEMPLATE); 

?>

<h2>DADOS DO USUÁRIO</h2>

<Form method="POST" action="Add.php">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-10">
      <label for="name">Nome:</label>
      <input type="text" class="form-control" name="registro['Nome']" required>
    </div>    
    <div class="form-group col-md-2">
      <label for="campo1">Data de Nascimento:</label>
      <input type="date" class="form-control" name="registro['Data_Nasc']">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-2">
      <label for="campo1">RG:</label>
      <input type="text" class="form-control" name="registro['RG']" required>
    </div>

    <div class="form-group col-md-2">
      <label for="campo2">CPF:</label>
      <input type="text" class="form-control" name="registro['CPF']" required>
    </div>
      
    <div class="form-group col-md-2">
      <label for="campo3">Celular</label>
      <input type="text" class="form-control" name="registro['Celular']">
    </div>

    <div class="form-group col-md-6">
      <label for="campo4">Endereço</label>
      <input type="text" class="form-control" name="registro['Endereco']">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-3">
      <label for="campo2">Bairro</label>
      <input type="text" class="form-control" name="registro['Bairro']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo3">Cidade:</label>
      <input type="text" class="form-control" name="registro['Cidade']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="campo4">CEP:</label>
      <input type="text" class="form-control" name="registro['CEP']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="campo1">Usuário:</label>
      <input type="text" class="form-control" name="registro['Usuario']" required>
    </div>  
    <div class="form-group col-md-2">
      <label for="campo3">Senha:</label>
      <input type="password" class="form-control" name="registro['Senha']" required>
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="Home.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>