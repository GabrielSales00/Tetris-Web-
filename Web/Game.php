<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['id'] === NULL) {
    header("Location: LoginPage.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mirror Tetris</title>
    <script src = "main.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='TetrisProjStyleSheet.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    
</head>
<body>
    <video id="background-video" autoplay loop muted >
        <source src="./Media/Cloud_Background.mp4" type="video/mp4">
    </video>
    <div class="container">
        <div class="left-div">
            <p>Tempo da partida: </p>
            <p>Nº linhas eliminadas: </p>
            <p>Nível: </p>
        </div>
        <div class="center-div">
            <div class = "title">
                <p> Welcome to Mirror Tetris </p>
            </div>
            <div class = "display">
                <div class="tetris-box">
                    <iframe src="index.html" width="1000" height="1000"></iframe>
                </div>
            </div>
        </div>
        
        <div class="right-div">
            <table class="table" >
                <caption>Ranking Partidas Passadas</caption>
                <thead>
                    <tr>
                        <th>Nome do Jogador</th>
                        <th>Pontuação Obtida</th>
                        <th>Nível Atigindo</th>
                        <th>Tempo de Duração</th>
                    </tr>
                </thead>
                <tbody id="joao">
                    <tr>
                        <td>Jogador 1</td>
                        <td>100</td>
                        <td>5</td>
                        <td>30 minutos</td>
                    </tr>
                    <tr>
                        <td>Jogador 2</td>
                        <td>150</td>
                        <td>7</td>
                        <td>45 minutos</td>
                    </tr>
                    <tr>
                        <td>Jogador 3</td>
                        <td>80</td>
                        <td>4</td>
                        <td>25 minutos</td>
                    </tr>
                    <tr>
                        <td>Jogador 4</td>
                        <td>120</td>
                        <td>6</td>
                        <td>35 minutos</td>
                    </tr>
                    <tr>
                        <td>Jogador 5</td>
                        <td>200</td>
                        <td>9</td>
                        <td>60 minutos</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <nav class="NavBox">
        <a id="ranking" href="RankingPage.php">Ranking &nbsp;&nbsp;</a>
        <a id="info" href="EditPag.html">Editar Informações &nbsp;&nbsp;</a>
        <a id="exit" href="limpa_sessao.php">Sair &nbsp;&nbsp;</a>
    </nav>

</body>
</html>
