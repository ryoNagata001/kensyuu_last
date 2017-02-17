<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ユーザ登録</title>
</head>
<body>
<?php
//register/new.phpから受け取る
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

//データベースに接続
try{
    require_once('../pdo.php');
}catch(PDOException $e){
    var_dump($e->getMessage());
    echo "データベースに接続できませんでした.";
    exit;
}
//チェック
$stmt = $db->prepare("select email from users where email = :email");
$stmt->execute([
    ':email'=>$email
]);
$check = $stmt->fetch(PDO::FETCH_ASSOC);
if($check["email"]){
    echo "そのメールアドレスはすでに登録されています";
    echo '<a href="new.php">新規登録画面へ</a>';
    exit();
}
$stmt = $db->prepare("insert into users (name, email, password) values (:name, :email, :password)");
$stmt->execute([
    ':name'=>$username,
    ':email'=>$email,
    ':password'=>$password
]);
//接続切る
$db = null;


print '<a href="../login/new.php">ログイン画面</a>';

?>
</body>
</html>

