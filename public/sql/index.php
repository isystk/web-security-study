<?php

global $pdo;
include '../database.php';

// セッションを開始
session_start();

$message = null;
if (isset($_POST['message']) && trim($_POST['message']) !== '') {
    $message = trim($_POST['message']);
}
$andWhere = '';
if (isset($message)) {
    $andWhere = 'and message ="' . $message . '"';
}

// 登録されているメッセージを取得
$sql = $pdo->query("SELECT id, message, created_at FROM messages where is_private = 0 $andWhere ORDER BY created_at DESC");
$messages = $sql->fetchAll();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>SQLインジェクションデモ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        pre {
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ddd;
            white-space: pre-line;
        }
    </style>
</head>
<body>
<p><a href="/">戻る</a></p>
<h1>SQLインジェクションの脆弱性があるサイト</h1>
<div>
    説明
    <pre>
        このサイトは、SQLインジェクションの脆弱性がある為、<br/>悪意のあるユーザーによって、以下のような攻撃が可能です。
        <br/>
        ・意図しない条件で検索ができてしまう
        <code><?php echo htmlspecialchars('" or "a" = "a'); ?></code>
    </pre>
</div>
<form action="index.php" method="POST">
    <label for="message">検索するメッセージを入力してください:</label><br>
    <input type="text" id="message" name="message" value="<?php echo $message; ?>"><br><br>

    <button type="submit">送信</button>

    <h2>メッセージ一覧</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>メッセージ</th>
            <th>作成日時</th>
        </tr>
        <?php
        // メッセージ一覧を表示
        if (0 < count($messages)) {
            foreach ($messages as $message) {
                echo "<tr>";
                echo "<td>" . $message['id'] . "</td>";
                echo "<td>" . htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . $message['created_at'] . "</td>";
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
