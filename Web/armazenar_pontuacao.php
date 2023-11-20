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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $pontuacao = isset($data['pontuacao']) ? $data['pontuacao'] : null;
    $id_usuario = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    $sql = "INSERT INTO pontuacoes (id_usuario, pontuacao) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_usuario, $pontuacao);

    if ($stmt->execute()) {
        echo "Pontuação inserida com sucesso!";
    } else {
        echo "Erro ao inserir pontuação: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>