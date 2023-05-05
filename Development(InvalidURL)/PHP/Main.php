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
        <title>HOME</title>
    </head>
    <body>
        <h1>HOME</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p><u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん、お疲れ様です。</p>  <!-- ユーザー名をechoで表示 -->
        <ul>
            <li><a href="Main.php">日報(遷移不可)</a></li>
            <li><a href="Shift.php">シフト</a></li>
            <li><a href="Care.php">お手入れ</a></li>
            <li><a href="Medical.php">投薬</a></li>
            <li><a href="Logout.php">ログアウト</a></li>
        </ul>
    </body>
</html>