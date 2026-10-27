<?php

$email = $_POST['email'];
$password = $_POST['password'];

require 'database.php';

$stmt = $conn->prepare("SELECT users.*, roles.name AS role
                        FROM users
                        LEFT JOIN roles ON users.role_id = roles.role_id
                        WHERE users.email = :email");
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (is_array($user)) {
    if (password_verify($password, $user['wachtwoord'])) {
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['naam'] = $user['naam'];
        $_SESSION['role'] = $user['role'];

        header("Location: index.php");
        exit;
    } else {
        echo "Wachtwoord is fout";
    }
} else {
    echo "Email is bij ons onbekend";
}
