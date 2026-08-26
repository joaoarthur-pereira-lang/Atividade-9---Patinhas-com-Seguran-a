<?php

include("../../infra/conexao.php");

$id = $_GET["id"];

$sql = "DELETE FROM clientes WHERE id = $id";

if ($conexao->query($sql)) {

    header("Location: listarclientes.php");

    exit();

} else {

    echo "Não foi possível excluir o cliente.";

}

?>