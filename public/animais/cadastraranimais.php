<?php

include("../../infra/conexao.php");

$sql_clientes = "SELECT * FROM clientes";

$resultado_clientes = $conexao->query($sql_clientes);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome_animal = $_POST["nome_animal"];
    $especie = $_POST["especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];
    $cliente_id = $_POST["cliente_id"];

    $sql = "INSERT INTO animais
            (nome_animal, especie, raca, idade, cliente_id)

            VALUES
            ('$nome_animal', '$especie', '$raca', '$idade', '$cliente_id')";

    if ($conexao->query($sql) === TRUE) {

        echo "<script>
                alert('Animal cadastrado com sucesso!');
                window.location.href='listaranimais.php';
              </script>";

    } else {

        echo "Erro: " . $conexao->error;

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Cadastrar Animal</title>

    <link rel="stylesheet" href="../../style/style.css">

</head>

<body>

<div class="container">

    <h1>🐾 Cadastrar Animal</h1>

    <form method="POST">

        <label>Nome do animal:</label>

        <input
            type="text"
            name="nome_animal"
            required
        >

        <label>Espécie:</label>

        <input
            type="text"
            name="especie"
            placeholder="Ex: Cachorro ou Gato"
            required
        >

        <label>Raça:</label>

        <input
            type="text"
            name="raca"
        >

        <label>Idade:</label>

        <input
            type="number"
            name="idade"
            min="0"
            required
        >

        <label>Responsável:</label>

        <select name="cliente_id" required>

            <option value="">
                Selecione o responsável
            </option>

            <?php

            while ($cliente = $resultado_clientes->fetch_assoc()) {

            ?>

                <option value="<?php echo $cliente["id"]; ?>">

                    <?php echo $cliente["nome"]; ?>

                </option>

            <?php

            }

            ?>

        </select>

        <button type="submit">
            Cadastrar Animal
        </button>

    </form>

    <br>

    <a href="../../index/index.php">Voltar</a>

</div>

</body>

</html>