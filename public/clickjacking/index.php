<?php

// セッションを開始
session_start();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>クリックジャッキングデモ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        iframe {
            position: absolute;
            top: 150px;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        #evil-link {
            position: absolute;
            top: 246px;
            left: 40px;
            z-index: 1;
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
    <h1>クリックジャッキングの脆弱性があるサイト</h1>

    <a id="evil-link" href="./evil.html">ログインはこちら</a>
    <!-- 透明なiframeで被害者サイトを表示 -->
    <iframe src="./victim.html"></iframe>
</body>
</html>
