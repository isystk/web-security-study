<?php

global $pdo;
include '../database.php';

// セッションを開始
session_start();

// ユーザー入力
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力チェック
    if (empty($username) || empty($password)) {
        die('ユーザー名またはパスワードが空です。');
    }

    // ユーザーをデータベースから取得
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // ユーザーが存在し、パスワードが正しいか確認
    if (!$user || !password_verify($password, $user['password'])) {
        echo 'ログインに失敗しました。';
        return;
    }
    // セッション開始
    session_regenerate_id(true); // セッションIDを再生成

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    // セッションハイジャック対策
    $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

    header('Location: mypage.php');
    exit();
}
?>
