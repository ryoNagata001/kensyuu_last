<?php
session_start();
if($_POST['token'] != session_id()){
    echo '正規のルートでアクセスしてください';
    exit;
}
$new_thread_name = $_POST['thread_name'];
$thread_id = $_POST['thread_id'];

    //dbに接続
try{
    require_once('../pdo.php');
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}
$stmt = $db->prepare("update threads set name = :name where id = :id");
$stmt->execute([
    ':name'=>$new_thread_name,
    ':id'=>$thread_id
]);

echo 'スレッド名を変更しました<br>';
echo '<a href="show_all.php">スレッド一覧に戻る</a>';
