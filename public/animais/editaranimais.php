<?php

include("../../infra/conexao.php");

$sql = "SELECT

            animais.id,
            animais.nome_animal,
            animais.especie,
            animais.raca,
            animais.idade,
            clientes.nome AS responsavel

        FROM animais

        INNER JOIN clientes

        ON animais.cliente_id = clientes.id";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Lista de Animais</title>

    <link rel="stylesheet" href="../../style/style.css">

</head>

<body>

<div class="container">

    <h1>🐾 Animais Cadastrados</h1>

    <a class="botao" href="cadastraranimais.php">
        Cadastrar novo animal
    </a>

    <br><br>

    <table>

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th>Idade</th>
            <th>Responsável</th>
            <th>Ações</th>

        </tr>

        <?php

        if ($resultado->num_rows > 0) {

            while ($animal = $resultado->fetch_assoc()) {

        ?>

            <tr>

                <td>
                    <?php echo $animal["id"]; ?>
                </td>

                <td>
                    <?php echo $animal["nome_animal"]; ?>
                </td>

                <td>
                    <?php echo $animal["especie"]; ?>
                </td>

                <td>
                    <?php echo $animal["raca"]; ?>
                </td>

                <td>
                    <?php echo $animal["idade"]; ?> anos
                </td>

                <td>
                    <?php echo $animal["responsavel"]; ?>
                </td>

                <td>

                    <a href="editaranimais.php?id=<?php echo $animal["id"]; ?>">
                        Editar
                    </a>

                    |

                    <a
                        href="excluiranimais.php?id=<?php echo $animal["id"]; ?>"
                        onclick="return confirm('Deseja excluir este animal?')"
                    >
                        Excluir
                    </a>

                </td>

            </tr>

        <?php

            }

        } else {

        ?>

            <tr>

                <td colspan="7">
                    Nenhum animal cadastrado.
                </td>

            </tr>

        <?php

        }

        ?>

    </table>

    <br>

    <a href="../../index/index.php">
    </a>

</div>
</body>
</html>