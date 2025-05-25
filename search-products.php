<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db.php';

header('Content-Type: application/json');

$query = $_GET['q'] ?? '';

if (strlen($query) < 2) {
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare("SELECT id, name, subtitle FROM products WHERE name LIKE ? OR subtitle LIKE ? LIMIT 10");
$stmt->execute(['%' . $query . '%', '%' . $query . '%']);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);