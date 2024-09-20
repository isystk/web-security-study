<?php

global $pdo;
include '../database.php';

// セッションを開始
session_start();

// CSRFトークンを生成
if (empty($_SESSION['_token'])) {
    $_SESSION['_token'] = bin2hex(random_bytes(32));
}

// 削除処理
if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    // 削除クエリを実行
    $stmt = $pdo->prepare("DELETE FROM messages WHERE id = :delete_id");
    $stmt->execute(['delete_id' => $delete_id]);
    echo "メッセージが削除されました。";
}

// 登録されているメッセージを取得
$sql = $pdo->query("SELECT id, message, created_at FROM messages ORDER BY created_at DESC");
$messages = $sql->fetchAll();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>CSRFデモフォーム</title>
</head>
<body>
<h1>CSRFの脆弱性があるフォーム</h1>
<form action="submit.php" method="POST">
    <label for="message">メッセージを入力してください:</label><br>
    <input type="text" id="message" name="message"><br><br>

    <!-- CSRFトークンをフォームに埋め込む -->
    <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
    <button type="submit">送信</button>

    <h2>メッセージ一覧</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>メッセージ</th>
            <th>作成日時</th>
            <th>削除</th>
        </tr>
        <?php
        // メッセージ一覧を表示
        if (0 < count($messages)) {
            foreach ($messages as $message) {
                echo "<tr>";
                echo "<td>" . $message['id'] . "</td>";
                echo "<td>" . htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . $message['created_at'] . "</td>";
                // 削除リンク（CSRF保護が必要な場合はトークンも追加）
                echo "<td><a href='index.php?delete_id=" . $message['id'] . "' onclick=\"return confirm('本当に削除しますか？');\">削除</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>登録されたメッセージはありません。</td></tr>";
        }
        ?>
    </table>
</form>
</body>
</html>
