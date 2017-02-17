<?php
session_start();

//ログアウト
if($_SESSION['login'] == 1){
    unset($_SESSION['login']);
    unset($_SESSION['user_id']);
}else{
    echo "ログインしてください";
    print '<a href="new.php">ログイン画面</a>';
    print '<a href="../index.php">トップへ戻る</a>';
    exit();
}

//ログイン画面
echo 'ログアウト成功 => ';
print '<a href="new.php">ログイン画面</a><br>';
print '<a href="../index.php">トップへ戻る</a>';
