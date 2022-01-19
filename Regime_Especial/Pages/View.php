<?php 
	require_once('Funcionalidades.php'); 
	view($_GET['ID']);
    include(HEADER_TEMPLATE);
    echo "<h2> USUÁRIO Nº: ". $Registro['ID'] . "</h2><hr>"; 
    if (!empty($_SESSION['message'])) : ?>
	    <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
    <?php endif; 
?>

<dl class="dl-horizontal">
	<dt>Nome Completo:</dt>
	<dd><?php echo $Registro['Nome']; ?></dd>
    
    <dt>Data de Nasc.:</dt>
	<dd><?php echo $Registro['Data_Nasc']; ?></dd>

    <dt>Celular:</dt>
	<dd><?php echo $Registro['Celular']; ?></dd>

    <dt>CPF:</dt>
	<dd><?php echo $Registro['CPF']; ?></dd>

    <dt>RG:</dt>
	<dd><?php echo $Registro['RG']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Endereço:</dt>
	<dd><?php echo $Registro['Endereco']; ?></dd>

	<dt>Bairro:</dt>
	<dd><?php echo $Registro['Bairro']; ?></dd>

    <dt>Cidade:</dt>
    <dd><?php echo $Registro['Cidade']; ?></dd>

	<dt>CEP:</dt>
	<dd><?php echo $Registro['CEP']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Login:</dt>
	<dd><?php echo $Registro['Usuario']; ?></dd>

	<dt>Senha:</dt>
	<dd><?php echo $Registro['Senha']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="Edit.php?id=<?=$Registro['ID'];?>" class="btn btn-primary">Editar</a>
	  <a href="Home.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>