<?php
require_once 'conexao.php';
require_once 'cabecalho.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO livros (titulo, autor, genero, ano_publicacao, preco, sinopse) 
                          VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['titulo'],
        $_POST['autor'],
        $_POST['genero'],
        $_POST['ano'],
        $_POST['preco'],
        $_POST['sinopse']
    ]);
    header("Location: listar.php");
}
?>

<h2>Cadastrar Novo Livro</h2>
<form method="POST">
    <label>Título:</label>
    <input type="text" name="titulo" required>

    <label>Autor:</label>
    <input type="text" name="autor" required>

    <label>Gênero:</label>
    <input type="text" name="genero" required>

    <label>Ano:</label>
    <input type="number" name="ano" required>

    <label>Preço:</label>
    <input type="number" step="0.01" name="preco" required>

    <label>Sinopse:</label>
    <textarea name="sinopse" required></textarea>

    <button type="submit">Salvar</button>
</form>

<?php include 'rodape.php'; ?>