<?php
session_start();
if($_POST['token'] != session_id()){
    echo "正規のルートから編集を行ってください";
    exit;
}
$comment_id = $_POST['comment_id'];
try{
    require_once('../pdo.php');
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}

$stmt = $db->prepare("delete from comments where id = :id");
$stmt->execute([
    ':id'=>$comment_id
]);
echo "コメントを削除しました";
echo '<a href="../threads/show_all.php">スレッド一覧へ戻る</a>';
