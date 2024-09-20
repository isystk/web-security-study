<?php

$pdo = null;
try {
    // データベース接続情報
    $host = "mysql";
    $user = "user";
    $pass = "password";
    $dbname = "web_security_study";

    // データベース接続
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; // DSN (Data Source Name)
    $options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // エラーモードを例外に設定
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // フェッチモードを連想配列に設定
    PDO::ATTR_EMULATE_PREPARES   => false,                 // 実際のプリペアドステートメントを使用
    ];

    // PDOインスタンスを作成して接続
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "エラー: " . $e->getMessage();
    exit;
}
