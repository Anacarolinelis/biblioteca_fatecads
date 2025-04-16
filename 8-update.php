<?php
require_once 'conexao.php';
require_once 'cabecalho.php';

// 1. Verifica se existe um ID na URL
if (!isset($_GET['id'])) {
    header("Location: listar.php");
    exit;
}

$id = $_GET['id'];

// 2. Busca os dados atuais do livro
$stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
$stmt->execute([$id]);
$livro = $stmt->fetch();

// Se o livro não existir, redireciona
if (!$livro) {
    header("Location: listar.php");
    exit;
}

// 3. Processa o formulário de atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'genero' => $_POST['genero'],
        'ano_publicacao' => $_POST['ano_publicacao'],
        'preco' => $_POST['preco'],
        'sinopse' => $_POST['sinopse'],
        'id' => $id
    ];

    // 4. Executa o UPDATE no banco
    $stmt = $pdo->prepare("UPDATE livros SET 
                          titulo = :titulo,
                          autor = :autor,
                          genero = :genero,
                          ano_publicacao = :ano_publicacao,
                          preco = :preco,
                          sinopse = :sinopse
                          WHERE id = :id");

    if ($stmt->execute($dados)) {
        header("Location: listar.php?sucesso=1");
        exit;
    }
}
?>

<!-- Formulário de Edição -->
<h2>Editar Livro: <?= htmlspecialchars($livro['titulo']) ?></h2>

<form method="POST">
    <div class="form-group">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required>
    </div>

    <div class="form-group">
        <label>Autor:</label>
        <input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>
    </div>

    <div class="form-group">
        <label>Gênero:</label>
        <input type="text" name="genero" value="<?= htmlspecialchars($livro['genero']) ?>" required>
    </div>

    <div class="form-group">
        <label>Ano de Publicação:</label>
        <input type="number" name="ano_publicacao" value="<?= $livro['ano_publicacao'] ?>" required>
    </div>

    <div class="form-group">
        <label>Preço (R$):</label>
        <input type="number" step="0.01" name="preco" value="<?= $livro['preco'] ?>" required>
    </div>

    <div class="form-group">
        <label>Sinopse:</label>
        <textarea name="sinopse" required><?= htmlspecialchars($livro['sinopse']) ?></textarea>
    </div>

    <button type="submit" class="btn-salvar">Salvar Alterações</button>
    <a href="listar.php" class="btn-cancelar">Cancelar</a>
</form>

<?php require_once 'rodape.php'; ?>