<?php
session_start();

$email = $_GET['email'];
$password = $_GET['password'];

try{
    require_once("../pdo.php");
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}

$stmt = $db->prepare("select * from users where email = :email and password = :password");
$stmt->execute([
    ':email'=>$email,
    ':password'=>$password
]);

$rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($rec[0]["id"]);
$db = null;

if($rec == false){
    echo "正しい値を入力してください";
    echo '<a href="new.php">ログイン画面へ戻る</a>';
}else{
    $_SESSION['login'] = 1;
    $_SESSION['user_id'] = $rec[0]["id"];
    header('Location: ../index.php');
}
