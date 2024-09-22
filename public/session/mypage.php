<?php
session_start();

// ログインしているか確認
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// セッションハイジャック対策（IPアドレスとUser-Agentのチェック）
//if ($_SESSION['ip_address'] !== $_SERVER['REMOTE_ADDR'] || $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
//    session_unset();
//    session_destroy();
//    die('セッションが不正です。再度ログインしてください。');
//}

echo "ようこそ、" . htmlspecialchars($_SESSION['username']) . "さん！";
?>

<a href="logout.php">ログアウト</a>
