<?php

include("../../infra/conexao.php");

$sql = "SELECT * FROM clientes";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Clientes</title>

    <link rel="stylesheet" href="../../style/style.css">

</head>

<body>

<div class="container">

    <h1>👤 Clientes</h1>

    <a class="botao" href="cadastrarclientes.php">
        Cadastrar Cliente
    </a>

    <br><br>

    <table>

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>

        </tr>

        <?php

        while ($cliente = $resultado->fetch_assoc()) {

        ?>

        <tr>

            <td>
                <?php echo $cliente["id"]; ?>
            </td>

            <td>
                <?php echo $cliente["nome"]; ?>
            </td>

            <td>
                <?php echo $cliente["email"]; ?>
            </td>

            <td>

                <a href="detalhescliente.php?id=<?php echo $cliente["id"]; ?>">
                    Detalhes
                </a>

                |

                <a href="editarclientes.php?id=<?php echo $cliente["id"]; ?>">
                    Editar
                </a>

                |

                <a
                    href="excluirclientes.php?id=<?php echo $cliente["id"]; ?>"
                    onclick="return confirm('Deseja excluir este cliente?')"
                >
                    Excluir
                </a>

            </td>

        </tr>

        <?php

        }

        ?>

    </table>

</div>

</body>

</html>