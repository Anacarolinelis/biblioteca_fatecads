<?php
require_once 'conexao.php';
require_once 'cabecalho.php';

$livros = $pdo->query("SELECT * FROM livros")->fetchAll();
?>

<h2>Lista de Livros</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($livros as $livro): ?>
    <tr>
        <td><?= $livro['id'] ?></td>
        <td><?= htmlspecialchars($livro['titulo']) ?></td>
        <td><?= htmlspecialchars($livro['autor']) ?></td>
        <td>
            <a href="editar.php?id=<?= $livro['id'] ?>">Editar</a> |
            <a href="excluir.php?id=<?= $livro['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'rodape.php'; ?>