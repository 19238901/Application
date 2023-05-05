<?php
session_start();

$_SESSION['function']="view";
$_SESSION['room']="403";
if($_SESSION["attribute"]=="guest"){
  header("Location: main.php?id=id&error=ゲストは使用できません。  Not available to guests.");  // メイン画面へ遷移
  exit();  // 処理終了
}
$dsn = 'mysql:host=localhost;dbname=html';
$s311 = "";
$s312 = "";
$s321 = "";
$s322 = "";
$s323 = "";
$s324 = "";
$s325 = "";
$s331 = "";
$s332 = "";
$s333 = "";
$s341 = "";
$s342 = "";
$s343 = "";
$s344 = "";

$username = 'root';
$password = '';
$errorMessage = "";
$rows = [];
$pdo = new PDO($dsn, $username, $password);
$sql = 'select * from status_quo where room = "403"';
$sth = $pdo->query($sql);
if(!empty($sth)){
  while($row = $sth->fetch()){
    switch($row['seat']){
      case "311":
      $s311 = $row['name'];
      break;
      case "312":
      $s312 = $row['name'];
      break;
      case "321":
      $s321 = $row['name'];
      break;
      case "322":
      $s322 = $row['name'];
      break;
      case "323":
      $s323 = $row['name'];
      break;
      case "324":
      $s324 = $row['name'];
      break;
      case "325":
      $s325 = $row['name'];
      break;
      case "331":
      $s331 = $row['name'];
      break;
      case "332":
      $s332 = $row['name'];
      break;
      case "333":
      $s333 = $row['name'];
      break;
      case "341":
      $s341 = $row['name'];
      break;
      case "342":
      $s342 = $row['name'];
      break;
      case "343":
      $s343 = $row['name'];
      break;
      case "344":
      $s344 = $row['name'];
      break;
    }
  }
}
$sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
$sth = $pdo->prepare($sql);
$params = array(':id' => $_SESSION['id'], ':name' => $_SESSION['name'], ':labo' => $_SESSION['labo'], ':attribute' => $_SESSION['attribute'], ':status' => 'VIEW', ':room' => '403', ':seat' => '-', ':date' => date("Y/m/d H:i:s"));
$sth->execute($params);
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="view.css">
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
        <div class="btn1">
            <button class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></button>
      <button class="back" onclick="location.href='main.php?id=id'"><i class="fa fa-home"></i></button>
        </div>
        <h2 class="text1">Room</h2>
        <div class="room">
            <input class="radio" type="button" name="room" value="PROFESSOR" onclick="location.href='view_pro.php'">
      <input class="radio" type="button"name="room" value="402" onclick="location.href='view_402.php'">
      <input class="radio" type="button" name="room" value="403" onclick="location.href='view_403.php'">
      <input class="radio" type="button" name="room" value="404" onclick="location.href='view_404.php'">
      <input class="radio" type="button" name="room" value="OTHER" onclick="location.href='view_other.php'">
        </div>
        <h2 class="text1">403</h2>
        <div class="seet403" id="container403">
        <input type="button" class="basic" id="s311" value="<?php echo $s311?>">
        <input type="button" class="basic" id="s312" value="<?php echo $s312?>">
        <input type="button" class="basic" id="s321" value="<?php echo $s321?>">
        <input type="button" class="basic" id="s322" value="<?php echo $s322?>">
        <input type="button" class="basic" id="s323" value="<?php echo $s323?>">
        <input type="button" class="basic" id="s324" value="<?php echo $s324?>">
        <input type="button" class="basic" id="s325" value="<?php echo $s325?>">
        <input type="button" class="basic" id="s331" value="<?php echo $s331?>">
        <input type="button" class="basic" id="s332" value="<?php echo $s332?>">
        <input type="button" class="basic" id="s333" value="<?php echo $s333?>">
        <input type="button" class="basic" id="s341" value="<?php echo $s341?>">
        <input type="button" class="basic" id="s342" value="<?php echo $s342?>">
        <input type="button" class="basic" id="s343" value="<?php echo $s343?>">
        <input type="button" class="basic" id="s344" value="<?php echo $s344?>">
        </div>
      </section>
    </main>
  </body>
  
</html>
