<?php
require_once('./cidade.crud.php');
require_once('./cliente.crud.php');

if ($_GET['codigo'] != NULL) {
    $cliente = fnFindCliente($_GET['codigo']);
} else {
    header('location: error.php?status=access-deny');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Loja Senac - Formulário de Cadastro de Clientes</title>
</head>

<body>
    <?php include_once("./navbar.php"); ?>
    <div class="col-6 offset-3">
        <fieldset>
            <legend>Cadastro de Cliente</legend>
            <form class="form" action="./cliente.edit.php" method="post">
                <div class="form-group mb-3">
                    <label for="cliente_id" class="form-label">Nome do cliente</label>
                    <input value="<?= $cliente['nome'] ?>" class="form-control" type="text" name="txtNomeCliente" id="cliente_id" placeholder="Informe o nome do cliente" required>
                </div>
                <div class="form-group mb-3">
                    <label for="logradouro_id" class="form-label">Logradouro</label>
                    <input value="<?= $cliente['logradouro'] ?>" class="form-control" type="text" name="txtLogradouro" id="logradouro_id" placeholder="Informe o logradouro" required>
                </div>
                <div class="form-group mb-3">
                    <label for="numero_id" class="form-label">Número</label>
                    <input value="<?= $cliente['numero'] ?>" class="form-control" type="number" name="txtNumero" id="numero_id" placeholder="Informe p número da residência" required>
                </div>
                <div class="form-group mb-3">
                    <label for="bairro_id" class="form-label">Bairro</label>
                    <input value="<?= $cliente['bairro'] ?>" class="form-control" type="text" name="txtBairro" id="bairro_id" placeholder="Informe o bairro" required>
                </div>
                <div class="form-group mb-3">
                    <label for="cep_id" class="form-label">CEP</label>
                    <input value="<?= $cliente['cep'] ?>" class="form-control" type="number" name="txtCep" id="cep_id" placeholder="Informe o cep" required>
                </div>
                <div class="form-group mb-3">
                    <label for="cidade_id" class="form-label">Cidade</label>
                    <select class="form-select" aria-label="Selecione uma cidade" name="txtCodeCidade" id="cidade_id" required>
                        <option disabled>Selecione uma cidade</option>
                        <?php foreach (fnListaCidade() as $cidade) : ?>
                            <option value="<?= $cidade['cod_cidade'] ?>" <?= ($cliente['cidade'] == $cidade['nome_cidade']) ? 'selected' : '' ?>>
                                <?= "{$cidade['nome_cidade']} - {$cidade['sigla_uf']}" ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button value="<?= $cliente['codigo'] ?>" name="txtCodeCliente" class="btn btn-dark" type="submit">Atualizar</button>
            </form>
        </fieldset>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php include "./toast.php" ?>
</body>

</html>