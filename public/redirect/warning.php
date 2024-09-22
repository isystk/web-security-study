<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>注意喚起 - 安全でないリダイレクト先</title>
</head>
<body>
<p><a href="javascript:history.back()">戻る</a></p>
<h1>ご注意ください</h1>
<p>指定されたリダイレクト先は、信頼できない外部サイトの可能性があります。</p>
<p>続行する前に、URLの安全性を確認してください。</p>
<p>指定されたリダイレクト先: <strong><?php echo htmlspecialchars($_POST['url'], ENT_QUOTES, 'UTF-8'); ?></strong></p>
<p><a href="<?php echo $_POST['url']; ?>">危険を承知の上で表示する</a></p>
</body>
</html>
