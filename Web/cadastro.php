<?php
// Conexão com o banco de dados (usando as credenciais padrão do phpMyAdmin)
$servername = "localhost";
$username = "root"; // Usuário padrão do phpMyAdmin
$password = ""; // Senha padrão do phpMyAdmin
$dbname = "usuarios"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se os campos foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nomeCompleto = $_POST['name_co'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dt_nasc'];
    $telefone = $_POST['tel'];
    $email = $_POST['email'];
    $nomeUsuario = $_POST['name'];
    $senha = $_POST['pass_word'];

    // Prepara e executa a query para inserir os dados na tabela
    $sql = "INSERT INTO usuarios (nome_completo, cpf, nascimento, telefone, email, apelido, senha) 
            VALUES ('$nomeCompleto', '$cpf', '$dataNascimento', '$telefone', '$email', '$nomeUsuario', '$senha')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registro criado com sucesso!";
    } else {
        echo "Erro ao criar registro: " . $conn->error;
    }
}

// Fecha a conexão
$conn->close();
?>
