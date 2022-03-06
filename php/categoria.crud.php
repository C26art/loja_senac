<?php
require_once('./conexao.php');

### manipulação dos dados de categoria na base ###

# persistencia da categoria
function fnAddCategoria($nomeCategoria)
{
    $link = getConnection();

    $query = "insert into categoria(nm_categoria) values ('{$nomeCategoria}');";

    $result = mysqli_query($link, $query);
    mysqli_close($link);

    if ($result) {
        return true;
    }
    return false;
}

# lista de categorias
function fnListCategorias()
{
    $link = getConnection();
    $query = "select * from categoria";

    $result = mysqli_query($link, $query);

    $categorias = array();
    while ($categoria = mysqli_fetch_assoc($result)) {
        array_push($categorias, $categoria);
    }

    mysqli_close($link);
    return $categoria;
}

# localizar uma categoria
function fnFindCategoria($codigo)
{
    $link = getConnection();
    $query = "select * from categoria where cod_categoria = {$codigo}";

    $result = mysqli_query($link, $query);

    mysqli_close($link);
    return mysqli_fetch_assoc($result);
}

# atualizar uma categoria
function fnUpdateCategoria($nomeCategoria, $codCategoria)
{
    $link = getConnection();
    $query = "update categoria set nm_categoria = '{$nomeCategoria}' where cod_categoria = {$codCategoria};";

    $result = mysqli_query($link, $query);
      
    mysqli_close($link);

    if ($result) {
        return true;
    }

    return false;
}

# deleta uma categoria
function fnDeleteCategoria($codigo)
{
    $link = getConnection();
    $query = "delete from categoria where cod_categoria = {$codigo};";

    $result = mysqli_query($link, $query);
    mysqli_close($link);

     if ($result) {
        return true;
    }

    return false;
}