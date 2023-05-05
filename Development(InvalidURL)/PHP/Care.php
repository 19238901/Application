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
        <h>お手入れ後、記入してください。</br>
        お手入れ記録を無許可で保存しないでください。</br>
        備考・留意点がある場合、お手入れ記録の備考チェック欄を「継続」に変更してください。</br>
        備考・留意点が解決したら、備考チェック欄を「完了」に変更してください。</h>
        <ul>
            <li><a href="Care.php">お手入れ記録入力(遷移不可)</a></li>
            <li><a href="Care.php">お手入れ記録閲覧(遷移不可)</a></li>
        </ul>
        <li><a href="Main.php">Home</a></li>
    </body>
</html>