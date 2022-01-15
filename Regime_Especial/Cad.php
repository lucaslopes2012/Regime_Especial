<?php
    require_once 'Projeto_Config.php';

    include(HEADER_TEMPLATE);
?>
    <Form method="post" action="cad_action.php">
        <Label>
            Nome: <input type="text" name="nome"/>
        </Label>
        <Label>
            RG: <input type="text" name="rg"/>
        </Label>
        <Label>
            CPF: <input type="text" name="cpf"/>
        </Label>
        <Label>
            Data de Nascimento: <input type="date" name="data_nasc"/><br/>
        </Label>
        <Label>
            Celular: <input type="text" name="celular"/>
        </Label>
        <Label>
            Endereço: <input type="text" name="endereco"/><br/>
        </Label>
        <Label>
            Usuário: <input type="text" name="usuario"/>
        </Label>
        <Label>
            Senha: <input type="text" name="senha"/><br/>
        </Label>
        <input type="submit" value="Salvar"/>
    </Form>

<?php
    include(FOOTER_TEMPLATE);
?>