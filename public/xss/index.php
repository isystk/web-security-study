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
</head>
<body>
    <h1>XSSの脆弱性があるフォーム</h1>
    <form action="index.php" method="POST">
        <label for="message">メッセージを入力してください:</label><br>
        <input type="text" id="message" name="message"><br><br>
        <button type="submit">送信</button>
    </form>

    <?php
    if (isset($message)) {
        echo "<h2>投稿されたメッセージ</h2>";
        echo "<p>" . $message . "</p>";
    }
    ?>
</body>
</html>
