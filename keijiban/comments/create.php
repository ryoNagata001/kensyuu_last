<?php
session_start();
$content = $_POST['content'];
$user_id = $_SESSION['user_id'];
$thread_id = $_POST['thread_id'];
$created_at = date("Y-m-d H:i:s");
$string = str_replace(PHP_EOL, '', $content);
$string += str_replace(array(" ", "　"), "", $content);
if($string == ""){
    echo "何か入力してください";
    exit;
}
//db接続
try{
    require_once('../pdo.php');
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}
try{
    if($user_id==false){
        throw new Exception("ログインしてください");
    }
$sql ="insert into comments (content,created_at,user_id,thread_id) values (?, ?, ?, ?)";
$stmt = $db->prepare("$sql");
$stmt->execute([
    $content,
    $created_at,
    $user_id,
    $thread_id
]);
}catch(Exception $e){
    echo $e->getMessage();
    exit;
}
$db = null;
//挿入完了
?>
<p>コメントしました</p>
<!--
<form action="../threads/show.php" method="post">
<input type="hidden" name="thread_id" value="<?php echo $thread_id;?>">
<p><input type="submit" value="元のスレッドに戻る"></p>
</form>
--!>

<a href="../threads/show.php?<?php echo "thread_id=".$thread_id;?>">元のスレッドに戻る</a>
