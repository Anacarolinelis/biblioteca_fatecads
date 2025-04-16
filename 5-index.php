<?php
require_once 'conexao.php';
require_once 'cabecalho.php';
?>

<h2>Bem-vindo ao Sistema de Biblioteca</h2>
<p>Total de livros cadastrados: 
    <?= $pdo->query("SELECT COUNT(*) FROM livros")->fetchColumn(); ?>
</p>

<?php require_once 'rodape.php'; ?>