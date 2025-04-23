<?php
$host = '127.0.0.1';
$db   = 'biblioteca_fatecads';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $user, $pass, $opcoes);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>