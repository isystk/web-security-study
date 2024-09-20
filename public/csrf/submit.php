<?php

global $pdo;
include '../database.php';

// セッションを開始
session_start();

// POSTデータとCSRFトークンの検証
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "不正なリクエストです。";
    return;
}

//if (!isset($_POST['_token'], $_SESSION['_token']) || $_POST['_token'] !== $_SESSION['_token']) {
//    // CSRFトークンが一致しない場合
//    echo "CSRFトークンが無効です。フォーム送信が拒否されました。";
//    return;
//}
// CSRFトークンが一致した場合

if (!isset($_POST['message'])) {
    echo "メッセージが入力されていません。";
    return;
}
$message = $_POST['message'];

// メッセージをデータベースに登録
$sql = $pdo->prepare("INSERT INTO messages (message) VALUES (:message)");
$sql->execute(['message' => $message]);

// ヘッダーでリダイレクトを実行
$redirectUrl = './index.php';
header("Location: $redirectUrl");

// スクリプトの実行を終了
exit();
