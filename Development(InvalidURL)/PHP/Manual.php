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
        <p><u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さんがログインしています。</p>  <!-- ユーザー名をechoで表示 -->
        <ul>
            <li><a href="DayReport.php">日報</a></li>
            <li><a href="Logout.php">シフト</a></li>
            <li><a href="Logout.php">お手入れ</a></li>
            <li><a href="Logout.php">投薬</a></li>
            <li><a href="Logout.php">連絡</a></li>
            <li><a href="Logout.php">ログアウト</a></li>
        </ul>
    </body>
</html>