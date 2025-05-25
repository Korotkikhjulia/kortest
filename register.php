<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $user = trim($_POST['user']);
    $phone = trim($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username OR user = :user");
    $stmt->execute(['username' => $username, 'user' => $user]);

    if ($stmt->fetch()) {
        header("Location: index.php?error=1");
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO users (username, user, phone, password) VALUES (:username, :user, :phone, :password)");
    $stmt->execute([
        'username' => $username,
        'user' => $user,
        'phone' => $phone,
        'password' => $password
    ]);

    $_SESSION['username'] = $username;

    header("Location: index.php?success=1");
    exit;
}
