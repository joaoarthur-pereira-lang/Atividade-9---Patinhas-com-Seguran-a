<?php

include("../../infra/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO clientes (nome, email, senha)
            VALUES ('$nome', '$email', '$senha')";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>
                alert('Cliente cadastrado com sucesso!');
                window.location.href='cadastrarclientes.php';
              </script>";
    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }
}

?>