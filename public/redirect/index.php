<?php

// セッションを開始
session_start();

$url = '';
if (isset($_POST['url'])) {
    $url = $_POST['url'];
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>オープンリダイレクトデモ</title>
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
    <h1>オープンリダイレクトの脆弱性があるサイト</h1>
    <div>
        説明
        <pre>
            このサイトは、オープンリダイレクトの脆弱性がある為、<br/>悪意のあるユーザーによって、以下のような攻撃が可能です。
            <br/>
            ・許容される内部URL
            <code><?php echo htmlspecialchars('https://localhost/'); ?></code>
            <br/>
            ・許容されない外部URL
            <code><?php echo htmlspecialchars('https://yahoo.co.jp/'); ?></code>
        </pre>
    </div>
    <form action="./redirect_danger.php" method="POST">
        <label for="url">危険なリダイレクト</label>
        <input type="url" id="url" name="url" value="<?php echo $url; ?>" required><br>
        <button type="submit">リダイレクト</button>
    </form>
    <br>
    <form action="./redirect_safety.php" method="POST">
        <label for="url">安全なリダイレクト</label>
        <input type="url" id="url" name="url" value="<?php echo $url; ?>" required><br>
        <button type="submit">リダイレクト</button>
    </form>
</body>
</html>
