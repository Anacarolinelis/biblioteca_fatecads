<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $pdo->prepare("DELETE FROM livros WHERE id = ?")->execute([$_GET['id']]);
}
header("Location: listar.php");