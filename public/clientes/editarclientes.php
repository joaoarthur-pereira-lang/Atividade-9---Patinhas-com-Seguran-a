<?php

include("../../infra/conexao.php");

$id = $_GET["id"];

$sql = "SELECT * FROM clientes WHERE id = $id";

$resultado = $conexao->query($sql);

$cliente = $resultado->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "UPDATE clientes SET

            nome = '$nome',
            email = '$email',
            senha = '$senha'

            WHERE id = $id";

    $conexao->query($sql);

    header("Location: listarclientes.php");

    exit();
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Cliente</title>

    <link rel="stylesheet" href="../../style/style.css">

</head>

<body>

<div class="container">

    <h1>Editar Cliente</h1>

    <form method="POST">

        <label>Nome:</label>

        <input
            type="text"
            name="nome"
            value="<?php echo $cliente["nome"]; ?>"
            required
        >

        <label>Email:</label>

        <input
            type="email"
            name="email"
            value="<?php echo $cliente["email"]; ?>"
            required
        >

        <label>Senha:</label>

        <input
            type="password"
            name="senha"
            value="<?php echo $cliente["senha"]; ?>"
            required
        >

        <button type="submit">
            Salvar
        </button>

    </form>

</div>

</body>

</html>