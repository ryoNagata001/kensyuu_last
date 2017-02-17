<?php
session_start();
?>
<!DOCTYPE>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>create</title>
<meta name="description">
</head>
<body>
<p>スレッドを作る</p>

<form action="create.php" method="post">
<p>title:<input type="text" name="thread_title"></p>
<input type="submit" value="作成">
</form>

</body>
</html>
