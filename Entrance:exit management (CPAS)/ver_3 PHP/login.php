<?php
require 'password.php';   // password_verfy()はphp 5.5.0以降の関数のため、バージョンが古くて使えない場合に使用
// セッション開始
session_start();

$_SESSION['status'] = '';
$_SESSION['function'] = '';
$_SESSION['room'] = '';
$_SESSION['seat'] = '';
$_SESSION["id"] = '';
$_SESSION["name"] = '';
$_SESSION["labo"] = '';
$_SESSION['status'] = '';
$_SESSION['attribute'] = '';
$_SESSION['function'] = '';
$_SESSION['s_seat'] = '';
$_SESSION["s_id"] = '';
$_SESSION["s_name"] = '';
$_SESSION["s_labo"] = '';

if(isset($_POST["login"])){
  // 1. ユーザIDの入力チェック
  if (empty($_POST["id"])){
    $errorMessage = 'ユーザーIDが未入力です。';
  } else if (empty($_POST["pass"])) {
    $errorMessage = 'パスワードが未入力です。';
  }
  if (!empty($_POST["id"]) && !empty($_POST["pass"])) {
    // 入力したユーザIDを格納
    $id = htmlspecialchars($_POST["id"], ENT_QUOTES, 'UTF-8');
    
    // 2. ユーザIDとパスワードが入力されていたら認証する
    $dsn = 'mysql:host=localhost;dbname=html';
    
    $username = 'root';
    $password = '';
    
    // 3. エラー処理
    try {
      $pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      
      $sql = 'select * from user';
      $sth = $pdo->prepare($sql);
      $sth->execute(array($id));
      
      $pass = htmlspecialchars($_POST["pass"], ENT_QUOTES, 'UTF-8');
      
      foreach ($sth as $row) {
        // 入力したIDのユーザー名を取得
        
        if($id == $row['id']){
          if($pass == $row['pass']){
            $name = $row['name'];  // ユーザー名
            $labo = $row['labo'];
            $id = $row['id'];
            $attribute = $row['attribute'];
            $_SESSION["name"] = $name;
            $_SESSION["labo"] = $labo;
            $_SESSION["id"] = $id;
            $_SESSION["attribute"] = $attribute;
            $sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
            $sth = $pdo->prepare($sql);
            $params = array(':id' => $id, ':name' => $name, ':labo' => $labo, ':attribute' => $attribute, ':status' => 'LOG IN', ':room' => '-', ':seat' => '-', ':date' => date("Y/m/d H:i:s"));
            
            $sth->execute($params);
            header("Location: main.php?id=id");  // メイン画面へ遷移
            exit();  // 処理終了
          }
        } else {
          // 認証失敗
          $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
        }
      }
    }catch (PDOException $e) {
        $errorMessage = 'データベースエラー';
        //$errorMessage = $sql;
        // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
        // echo $e->getMessage();
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title>Progate</title>
  </head>
  <body>
    <header>
        <img src="./image/cps.png" class="cps">
    </header>
    <main>
        <section class="detail">
            <h2 class="text1">Login Authentication</h2>
            <form action="" method="post" id="login" name="login">
                <div>
                    <label class="text" for="id">ID<br></label>
          <input class="f_input" id="id" type="text" name="id" value="">
                </div>
                <div>
                    <label class="text" for="pass">Password<br></label>
                    <input class="f_input" id="pass" type="text" name="pass" value="">
                </div>
                <p>
                    <input type="submit" class="out" id="login" name="login" value="LOGIN">
                    <input type="button" class="out" onclick="location.href='guest.php'" value="GUEST" >
                    <input type="button" class="out" onclick="location.href='signup.php'" value="SIGN UP" >
                </p>
            </form>
        </section>
    </main>

    <footer>
        <h1>広告募集！！</h1>
        <h4>システム開発費は ” <span>aibo</span> ” でお願いします。</h4>
    </footer>
  </body>
</html>
