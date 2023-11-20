<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT u.apelido, p.pontuacao FROM pontuacoes p JOIN usuarios u ON p.id_usuario = u.id ORDER BY p.pontuacao DESC LIMIT 5";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Global - Tetris</title>
    <link rel="stylesheet" href="TetrisProjStyleSheet.css">
</head>
<body>
    <video id="background-video" autoplay loop muted >
        <source src="./Media/Cloud_Background.mp4" type="video/mp4">
    </video>

    <h1 id="ranking-titulo">Ranking Global - Tetris</h1>
    <div id="ranking-container">
        <div id="shape"><br></div>
        <table id="ranking-table">
            <tr>
                <th>Posição</th>
                <th>Nome</th>
                <th>Pontuação</th>
            </tr>
            <?php
            $posicao = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='conteudo'>" . $posicao . "</td>";
                echo "<td class='conteudo'>" . $row['apelido'] . "</td>";
                echo "<td class='conteudo'>" . $row['pontuacao'] . "</td>";
                echo "</tr>";
                $posicao++;
            }
            ?>
        </table>
    </div>
    <br>
    <nav class="NavBox">
        <a id="login" href="LoginPage.html">Login &nbsp;&nbsp;</a>
        <a id="cadastrar" href="CadPag.html">Cadastrar &nbsp;&nbsp;</a>
        <a id="exit" href="limpa_sessao.php">Sair &nbsp;&nbsp;</a>
    </nav>
</body>
</html>