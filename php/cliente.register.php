<?php

require_once('./cliente.crud.php');

if (
    $_POST['txtCliente'] == NULL ||
    $_POST['txtLogradouro'] == NULL ||
    $_POST['txtNumero'] == NULL ||
    $_POST['txtBairro'] == NULL ||
    $_POST['txtCep'] == NULL ||
    $_POST['txtCodeCidade'] == NULL
) {
    header('location: error.php?status=access-deny'); # redirecionar para a página error.php
    die(); # matar o carregamento da página
}

$result = fnAddCliente(
    $_POST['txtCliente'],
    $_POST['txtLogradouro'],
    $_POST['txtNumero'],
    $_POST['txtBairro'],
    $_POST['txtCep'],
    $_POST['txtCodeCidade']
);

if ($result) {
    header("location: cliente.form.php?codigo={$_POST['txtCodeCliente']}&status=success");
    die();
}

header("location: cliente.form.php?codigo={$_POST['txtCodeCliente']}&status=fail");
die();
