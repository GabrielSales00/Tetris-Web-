<?php
session_start();

if (!isset($_SESSION['nome_usuario'])) {
    http_response_code(401); // Código para indicar não autorizado
    exit();
}
?>