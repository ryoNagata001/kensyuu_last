<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>スレッド一覧</title>
<meta name="discription">
</head>
<body>
<p>スレッド一覧</p>
<?php
//dbと接続
try{
    require_once('../pdo.php');
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}
//fetch_all
$stmt = $db->prepare("select * from threads");
$stmt->execute();

$threads = $stmt->fetchAll(PDO::FETCH_ASSOC);
//dbと切断
$db = null;
?>
<?php
//1,編集ボタン作る,postメソッドでthread_idをhiddenにしてthreads/update.phpni送る
foreach( $threads as $thread):
    $thread_title = $thread["name"];
?>
<!--
<form action="show.php" method="post">
<input type="hidden" name="thread_id" value="<?php// echo $thread['id'];?>">
<p><input type="submit" value="<?php// echo $thread_title;?>"></p>
</form>
--!>
<a href="show.php?<?php echo "thread_id=".$thread['id'];?>"><?php echo $thread_title;?>
</a>
<?php
    if($thread['user_id'] == $_SESSION['user_id']){
?>
<form action="update.php?thread_id=<?php echo $thread['id'];?>" method="post">
<input type="hidden" name="token" value="<?php echo session_id();?>">
<input type="submit" value="edit">
</form>
<br>
<?php
    }else{
        echo "<br>";
    }
endforeach;
?>
<a href="../index.php">トップページに戻る</a>
<?php
//2,中身を見られるボタンをshow_thread.phpに作る(postメソッドでthread_idを送る
