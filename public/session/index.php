<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // 既にログイン済みの場合
    header('Location: mypage.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>CSRFデモフォーム</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        input[type="text"],
        input[type="password"] {
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
<h1>セッションハイジャックの脆弱性があるフォーム</h1>
<div>
    説明
    <pre>
        このサイトは、セッションハイジャックの脆弱性がある為、<br/>悪意のあるユーザーによって、以下のような攻撃が可能です。
        <br/>
        別種類のブラウザを2つ起動して、それぞれ別ユーザーでログインします。
        user1/password
        user2/password
        user2のセッションIDをクッキーから取得し、user1でそのセッションIDを使ってログイン状態に出来てしまいます。
    </pre>
</div>
<form method="post" action="login.php">
    ユーザー名: <input type="text" name="username" required /><br>
    パスワード: <input type="password" name="password" required /><br>
    <input type="submit" value="ログイン">
</form>
</body>
</html>
