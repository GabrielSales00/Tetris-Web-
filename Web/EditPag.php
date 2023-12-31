<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['id'] === NULL) {
    header("Location: LoginPage.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit</title>
    <script src="Permissions.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='TetrisProjStyleSheet.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">

</head>
<body>

    <video id="background-video" autoplay loop muted >
        <source src="./Media/Cloud_Background.mp4" type="video/mp4">
    </video>

    <div class="LogInBox">
        <p>Editar dados pessoais</p>

        <label for="name_co">Nome Completo:</label><br>
        <input type="text" id="name_co" name="name_co"><br><br>
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" disabled=""><br><br>
        <label for="dt_nasc">Data de Nascimento:</label><br>
        <input type="date" id="dt_nasc" name="dt_nasc" disabled=""><br><br>
        <label for="tel">Telefone:</label><br>
        <input type="number" id="tel" name="tel" placeholder="Número com DDD"><br><br>
        <label for="email">E-Mail:</label><br>
        <input type="text" id="email" name="email"><br><br>
        <label for="name">Nome:</label><br>
        <input type="text" id="name" name="name" disabled=""><br><br>
        <label for="pass_word">Nova senha:</label><br>
        <input type="password" id="pass_word" name="pass_word" placeholder="No mínimo 6 caracteres"><br><br>

        <form style="display: inline"><button type="submit" class="LogIn_button" id="log_in" name="log_in" formaction="Game.html">Voltar para o jogo</button></form> &ensp;
        <form style="display: inline"><button type="submit" class="LogIn_button" id="log_but" name="log_but"  formaction="EditPag.html">Salvar alterações</button></form>
    </div>

    <audio src="./Media/YabujinFLASHCASANOVA.mp3" preload="auto" autoplay loop></audio>

    <nav class="NavBox">
        <a id="ranking" href="RankingPage.php">Ranking &nbsp;&nbsp;</a>
        <a id="exit" href="limpa_sessao.php">Sair &nbsp;&nbsp;</a>
    </nav>



    
</body>
</html>