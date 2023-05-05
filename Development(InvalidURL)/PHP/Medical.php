<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: Logout.php");
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>お手入れ</title>
    </head>
    <body>
        <h1>お手入れ</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
         <!-- ユーザー名をechoで表示 -->
        <h2>
            投薬後、記入してください。
            お手入れ記録を無許可で保存しないでください。
        </h2>
        <ul>
            <li><a href="Medical.php">投薬記録入力(遷移不可)</a></li>
            <li><a href="Medical.php">投薬記録閲覧(遷移不可)</a></li>
        </ul>
        <li><a href="Main.php">Home</a></li>
    </body>
</html>