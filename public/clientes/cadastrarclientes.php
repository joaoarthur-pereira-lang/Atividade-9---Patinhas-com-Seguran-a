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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>

<body>

<div class="container">

    <h1>🐶 Cadastrar Cliente</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="../../index/index.php">Voltar</a>

</div>

</body>
</html>