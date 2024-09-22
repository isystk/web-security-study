<?php
// 許可されたドメインのリスト
$allowed_domains = ['localhost'];

// リダイレクト先URLを取得
$redirect_url = $_POST['url'] ?? '';

// URLをパース
$parsed_url = parse_url($redirect_url);

// ドメインが許可されたものかチェック
if (in_array($parsed_url['host'], $allowed_domains, true)) {
    // 安全な場合はリダイレクト
    header("Location: $redirect_url");
    exit();
} else {
    // 注意喚起のページを表示
    include 'warning.php';
}
?>
