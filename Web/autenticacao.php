<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeUsuario = $_POST['name'];
    $senha = $_POST['pass_word'];

    $sql = "SELECT * FROM usuarios WHERE apelido = '$nomeUsuario' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['apelido'] = $nomeUsuario;
        header("Location: Game.html");
        exit();
    } else {
        echo "Seu usuário ou senha não foi identificado no nosso sistema";
        header("Location: LoginPage.html");
        exit();
    }
}

$conn->close();
?>