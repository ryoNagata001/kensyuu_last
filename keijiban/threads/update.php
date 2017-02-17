<?php
session_start();
$token = $_POST['token'];
if($_POST['token'] != session_id()){
    echo "編集する権限がありません";
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>update</title>
<meta name="description">
</head>
<body>
<?php
$thread_id = $_GET['thread_id'];
$thread_name = $_GET['thread_name'];
//dbに接続
?>
<p>スレッド名編集</p>
<form action="update.thread.php" method="post">
<textarea name="thread_name" rows="1" cols="40"><?php echo $thread_name;?></textarea>
<input type="hidden" name="thread_id" value="<?php echo $thread_id ;?>">
<input type="hidden" name="token" value="<?php echo $token;?>">
<p><input type="submit" value="変更"></p>
</form>

<br>
<p>スレッド削除</p>
<form action="delete.php" method="post">
<input type="hidden" name="thread_id" value="<?php echo $thread_id;?>">
<input type="hidden" name="token" value="<?php echo $token;?>">
<p><input type="submit" value="削除"></p>
</form>

</body>
</html>

