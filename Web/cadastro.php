<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeCompleto = $_POST['name_co'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dt_nasc'];
    $telefone = $_POST['tel'];
    $email = $_POST['email'];
    $nomeUsuario = $_POST['name'];
    $senha = $_POST['pass_word'];

    $sql = "INSERT INTO usuarios (nome_completo, cpf, nascimento, telefone, email, apelido, senha) 
            VALUES ('$nomeCompleto', '$cpf', '$dataNascimento', '$telefone', '$email', '$nomeUsuario', '$senha')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: LoginPage.html");
        exit();
    } else {
        echo "Erro ao criar registro: " . $conn->error;
    }
}

$conn->close();
?>
