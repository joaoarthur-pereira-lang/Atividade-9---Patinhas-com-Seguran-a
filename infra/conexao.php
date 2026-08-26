<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "pet_shop_do_jango";

$conexao = new mysqli($host, $user, $password, $database);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
};

$conexao->set_charset("utf8mb4");
?>