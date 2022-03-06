<?php
require_once('./conexao.php');

### manipulação dos dados de produto na base ###

# persistencia da produto
function fnAddCliente($nomeCliente, $logradouro, $numero, $bairro, $cep, $codCidade)
{
    $link = getConnection();

    $query = "insert into cliente(nome_cli) values ('{$nomeCliente}');";
    $query .= "insert into endereco(nm_lgr, nr_lgr, nm_bairro, nr_cep, cod_cli, cod_cidade) ";
    $query .= "values ('{$logradouro}', {$numero}, '{$bairro}', {$cep}, last_insert_id(), {$codCidade});";

    // echo $query;
    // exit;
    $result = mysqli_multi_query($link, $query);
    mysqli_close($link);

    if ($result) {
        return true;
    }
    return false;
}

function fnListClientes()
{
    $link = getConnection();
    $query = "select * from consulta_cliente";

    $result = mysqli_query($link, $query);

    $clientes = array();
    while ($cliente = mysqli_fetch_assoc($result)) {
        array_push($clientes, $cliente);
    }

    mysqli_close($link);
    return $clientes;
}

function fnFindCliente($codigo)
{
    $link = getConnection();
    $query = "select * from consulta_cliente where codigo = {$codigo}";

    $result = mysqli_query($link, $query);

    mysqli_close($link);
    return mysqli_fetch_assoc($result);
}

function fnUpdateCliente($nome, $logradouro, $numero, $bairro, $cep, $codCidade, $codCliente)
{
    $link = getConnection();
    $query = "update cliente set nome_cli = '{$nome}' where cod_cli = {$codCliente};";

    $query .= "update endereco set " .
        "nm_lgr = '{$logradouro}', " .
        "nr_lgr = '{$numero}', " .
        "nm_bairro = '{$bairro}', " .
        "nr_cep = '{$cep}', " .
        "cod_cidade = {$codCidade} " .
        "where cod_cli = {$codCliente}";

    $result = mysqli_multi_query($link, $query);
      
    mysqli_close($link);

    if ($result) {
        return true;
    }

    return false;
}


function fnDeleteCliente($codigo)
{
    $link = getConnection();
    $query = "delete from endereco where cod_cli = {$codigo};";
    $query .= "delete from cliente where cod_cli = {$codigo};";

    $result = mysqli_multi_query($link, $query);
    mysqli_close($link);

     if ($result) {
        return true;
    }

    return false;
}