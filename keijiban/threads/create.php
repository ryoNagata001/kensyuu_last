<?php
session_start();

$thread_title = $_POST['thread_title'];

try {
    require_once('../pdo.php');
}catch (PDOException $e){
    var_dump($e->getMessage());
    exit;
}


try{
    if($_SESSION['login'] != 1){
        throw new Exception("ログインしてください");
    }
        $stmt = $db->prepare("insert into threads (name, user_id) values (:title, :user_id)");
        $stmt->execute([
            ':title'=>$thread_title,
            ':user_id'=>$_SESSION['user_id']
        ]);
    echo 'スレッド作成しました';
        echo '<a href="show_all.php">スレッド一覧へ</a>';
}catch(Exception $e){
    echo $e->getMessage();
    echo '<a href="../login/new.php">ログイン画面へ</a>';
}


