<?php

include("../../infra/conexao.php");

$id = $_GET["id"];

$sql = "DELETE FROM animais WHERE id = $id";

if ($conexao->query($sql)) {

    header("Location: listaranimais.php");

    exit();

} else {

    echo "Erro ao excluir o animal.";

}

?>