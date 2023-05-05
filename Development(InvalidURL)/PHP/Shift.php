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
        <title>シフト</title>
    </head>
    <body>
        <h1>シフト</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
         <!-- ユーザー名をechoで表示 -->
        <h2>毎月20日/25日までに翌月分のシフトを提出してください。</h2>
        <ul>
            <li><a href="Shift.php">社員用(遷移不可)</a></li>
            <li><a href="Shift.php">バイト用(遷移不可)</a></li>
        </ul>
        <li><a href="Main.php">Home</a></li>
    </body>
</html>