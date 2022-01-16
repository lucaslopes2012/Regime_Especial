<?php
    Require_once('Funcionalidades.php');
    Include(HEADER_TEMPLATE); 
    Index();
?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>USUÁRIOS</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Incluir Novo Usuário</a>
	    	<a class="btn btn-default" href="Home.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Código</th>
      <th>Nome</th>  <!--width="30%"-->
      <th>RG</th>
      <th>CPF</th>
      <th>Data Nasc.</th>
      <th>Celular</th>
      <!--<th>Endereço</th>-->
      <th>Usuário</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($Registros) : 
      foreach ($Registros as $Registro) : ?>
        <tr>
          <td align="center"><?=$Registro['ID'];?></td>
          <td><?=$Registro['Nome'];?></td>
          <td><?=$Registro['RG'];?></td>
          <td><?=$Registro['CPF'];?></td>
          <td><?=$Registro['Data_Nasc'];?></td>
          <td><?=$Registro['Celular'];?></td>
          <!--<td><? /* =$Registro['Endereco']; */?></td>-->
          <td><?=$Registro['Usuario'];?></td>
          <td class="actions text-right">
            <a href="view.php?ID=<?=$Registro['ID'];?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
            <a href="edit.php?ID=<?=$Registro['ID'];?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
            <a href="#<?=$Registro['ID'];?>"class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $Registro['ID'];?>">
              <i class="fa fa-trash"></i> Excluir
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="6">Nenhum registro encontrado.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php
  include('Modal.php');
  include(FOOTER_TEMPLATE); 
?>