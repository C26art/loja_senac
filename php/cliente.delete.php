<?php

require_once('./cliente.crud.php');

if ($_GET['codigo'] == NULL) {
    header('location: error.php?status=access-deny'); # redirecionar para a página error.php
    die(); # matar o carregamento da página
}

$result = fnDeleteCliente($_GET['codigo']);

if ($result) {
    header("location: cliente.list.php?status=success");
    die();
}

header("location: cliente.list.php?status=fail");
die();
