<?php
session_start();

$_SESSION["labo"] = "-";
$_SESSION['page']=="";
$_SESSION['status'] = '';
$_SESSION['function'] = '';
$_SESSION['room'] = '';
$_SESSION['seat'] = '';
$_SESSION["id"] = '';
$_SESSION["name"] = '';
$_SESSION["labo"] = '';
$_SESSION['status'] = '';
$_SESSION['function'] = '';
$_SESSION['s_seat'] = '';
$_SESSION["s_id"] = '';
$_SESSION["s_name"] = '';
$_SESSION["s_labo"] = '';
$errorMessage ="";

if(isset($_POST["signup"])){
  if (empty($_POST["id"])){
    $errorMessage = 'ユーザーIDが未入力です。';
  } else if (empty($_POST["name"])) {
    $errorMessage = '氏名が未入力です。';
  } else if (empty($_POST["labo"])) {
    $errorMessage = '研究室名が未入力です。';
  } else if (empty($_POST["pass"])) {
    $errorMessage = 'パスワードが未入力です。';
  }
  if(!empty($_POST["id"]) && !empty($_POST["name"])  && !empty($_POST["labo"]) & !empty($_POST["pass"])){
    // 2. ユーザIDとパスワードが入力されていたら認証する
    $dsn = 'mysql:host=localhost;dbname=html';
    
    $username = 'root';
    $password = '';
    
    $id = htmlspecialchars($_POST["id"], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $labo = htmlspecialchars($_POST["labo"], ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($_POST["pass"], ENT_QUOTES, 'UTF-8');
    try {
      $pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      
      $sql = "INSERT INTO user (id, name, labo, attribute, pass) VALUES (:id, :name, :labo, :attribute, :pass)";
      $sth = $pdo->prepare($sql);
      $params = array(':id' => $id, ':name' => $name, ':labo' => $labo, ':attribute' => 'cps', ':pass' => $pass);
      $sth->execute($params);
      
      $sql = "INSERT INTO status_quo (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
      $sth = $pdo->prepare($sql);
      $params = array(':id' => $id, ':name' => $name, ':labo' => $labo, ':attribute' => 'cps', ':status' => '-', ':room' => '-', ':seat' => '-', ':date' => date("Y/m/d H:i:s"));
      $sth->execute($params);
      
      $sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
      $sth = $pdo->prepare($sql);
      $params = array(':id' => $id, ':name' => $name, ':labo' => $labo, ':attribute' => 'cps', ':status' => 'SING UP', ':room' => '-', ':seat' => '-', ':date' => date("Y/m/d H:i:s"));
      
      $sth->execute($params);
      $_SESSION['id']=$id;
      $_SESSION['name']=$name;
      $_SESSION['labo']=$labo;
      header("Location: confirmation_user.php?page=signup");
      exit();
    } catch (PDOException $e) {
      $errorMessage = "登録できません。";
    }
  }
  echo $errorMessage;
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
            <h2 class="text1">User Information</h2>
            <form action="" method="post" id="signup" name="signup">
                <div>
                    <label class="text" for="id">ID<br></label>
          <input class="f_input" id="id" type="text" name="id" value="" placeholder="学籍番号  Number  ex) 20xxxxxx">
                </div>
                <div>
                    <label class="text" for="name">Name<br></label>
          <input class="f_input" id="name" type="text" name="name" value="" placeholder="氏名  Name  ex) 山田 太郎">
                </div>
                <div>
                    <label class="text" for="labo">Labo<br></label>
          <input class="f_input" id="labo" type="text" name="labo" value="" placeholder="指導教員名  Supervisor Name  ex) 山田 Yamada">
                </div>
                <div>
                    <label class="text" for="pass">Password<br></label>
          <input class="f_input" id="pass" type="text" name="pass" value="">
                </div>
        <p>
          <input type="submit" class="out" value="SIGN UP" id="signup" name="signup">
          <input type="button" class="out" onclick="location.href='login.php'" value="LOGIN" >
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
