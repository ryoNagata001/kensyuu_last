<?php
session_start();
if($_POST['token'] != session_id()){
    echo '正規の手続きを踏んでください';
    exit;
}
$thread_id = $_POST['thread_id'];

try{
    require_once('../pdo.php');
    echo "接続可能";
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}

$stmt = $db->prepare("delete from comments where thread_id = :id");
$stmt->execute([
    ':id'=>$thread_id
]);
$sql = "delete from threads where id = ?";
$stmt = $db->prepare($sql);
$stmt->execute(array("$thread_id"));

//db接続を切る
$db = null;

echo 'スレッドを削除しました。<br>';
echo '<a href="show_all.php">スレッド一覧に戻る</a>';
