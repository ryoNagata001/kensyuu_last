<?php

define('DB_DATABASE', 'keijiban');
define('DB_USERNAME', 'nagata');
define('DB_PASSWORD', '@Nry00869');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);

try{
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
    echo "スクリプトを終了します.";
    exit;
}
