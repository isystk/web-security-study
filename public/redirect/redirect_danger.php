<?php
// 許可されたドメインのリスト
$allowed_domains = ['localhost'];

// リダイレクト先URLを取得
$redirect_url = $_POST['url'] ?? '';

// URLをパース
$parsed_url = parse_url($redirect_url);

header("Location: $redirect_url");
exit();
?>
