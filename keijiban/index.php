<!DOCTYPE html>
<?php session_start();
?>
<html lang='ja'>
<head>
<meta charset='utf-8'>
<title>index</title>
</head>
<body>
<h1>掲示板</h1>
<?php
if($_SESSION['login'] != 1){?>
<a href='register/new.php'>新規登録</a>
<br>
<a href='login/new.php'>ログイン</a>
<br>
<?php
}
?>
<a href='threads/show_all.php'>スレッド一覧</a>
<br>
<?php
if($_SESSION['login'] == 1){?>
<a href='threads/new.php'>スレッド作成</a>
<br>
<a href='login/delete.php'>ログアウト</a>
<?php
}
?>
</body>
</html>
