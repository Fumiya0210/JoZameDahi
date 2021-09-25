<?php 
require_once('config.php'); 
require_once('functions.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    setToken();
} else {
    checkToken();

    $name = $_POST['name'];
    $email = $_POST['email']; 
    $memo = $_POST['memo'];

    $error = array();

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'メールアドレスの形式が正しくありません';
    }
    if ($email == '') { 
        $error['email'] = 'メールアドレスを入力してください。'; 
    }
    if ($memo == '') { 
        $error['memo'] = '内容を入力してください。';
     }

    if (empty($error)){

        $dbh = connectDb();

        $sql ="insert into entries 
        (name, email, memo, created, modified)
        values
        (:name, :email, :memo, now(), now())";
        $stmt = $dbh->prepare($sql)
        $params = array( 
            ":name" => $name, 
            ":email" => $email, 
            ":memo" => $memo
        );
        $stmt->execute($params);

        header('Location: '.SITE_URL.'thanks.html');
        exit;
    }
?>

