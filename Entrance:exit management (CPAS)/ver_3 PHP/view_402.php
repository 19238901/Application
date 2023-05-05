<?php
session_start();

$_SESSION['function']="view";
$_SESSION['room']="402";
if($_SESSION["attribute"]=="guest"){
  header("Location: main.php?id=id&error=ゲストは使用できません。  Not available to guests.");  // メイン画面へ遷移
  exit();  // 処理終了
}

$dsn = 'mysql:host=localhost;dbname=html';
$s211 = "";
$s212 = "";
$s213 = "";
$s214 = "";
$s215 = "";
$s216 = "";
$s221 = "";
$s222 = "";
$s223 = "";
$s224 = "";
$s225 = "";
$s226 = "";
$s231 = "";
$s232 = "";
$s233 = "";
$s234 = "";
$s235 = "";
$s236 = "";
$s241 = "";
$s242 = "";

$username = 'root';
$password = '';
$errorMessage = "";
$rows = [];
$pdo = new PDO($dsn, $username, $password);
$sql = 'select * from status_quo where room = "402"';
$sth = $pdo->query($sql);
if(!empty($sth)){
  while($row = $sth->fetch()){
    switch($row['seat']){
      case "211":
        $s211 = $row['name'];
        break;
      case "212":
        $s212 = $row['name'];
        break;
      case "213":
        $s213 = $row['name'];
        break;
      case "214":
        $s214 = $row['name'];
        break;
      case "215":
        $s215 = $row['name'];
        break;
      case "216":
        $s216 = $row['name'];
        break;
      case "221":
        $s221 = $row['name'];
        break;
      case "222":
        $s222 = $row['name'];
        break;
      case "223":
        $s223 = $row['name'];
        break;
      case "224":
        $s224 = $row['name'];
        break;
      case "225":
        $s225 = $row['name'];
        break;
      case "226":
        $s226 = $row['name'];
        break;
      case "231":
        $s231 = $row['name'];
        break;
      case "232":
        $s232 = $row['name'];
        break;
      case "233":
        $s233 = $row['name'];
        break;
      case "234":
        $s234 = $row['name'];
        break;
      case "235":
        $s235 = $row['name'];
        break;
      case "236":
        $s236 = $row['name'];
        break;
      case "241":
        $s241 = $row['name'];
        break;
      case "242":
        $s242 = $row['name'];
        break;
    }
  }
}
$sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
$sth = $pdo->prepare($sql);
$params = array(':id' => $_SESSION['id'], ':name' => $_SESSION['name'], ':labo' => $_SESSION['labo'], ':attribute' => $_SESSION['attribute'], ':status' => 'VIEW', ':room' => '402', ':seat' => '-', ':date' => date("Y/m/d H:i:s"));
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
        <input class="radio" type="button" name="room" value="402" onclick="location.href='view_402.php'">
        <input class="radio" type="button" name="room" value="403" onclick="location.href='view_403.php'">
        <input class="radio" type="button" name="room" value="404" onclick="location.href='view_404.php'">
        <input class="radio" type="button" name="room" value="OTHER" onclick="location.href='view_other.php'">
      </div>
          <h2 class="text1">402<h2>
        <div class="seet402" id="container402">
            <input type="button" class="basic" id="s211" value="<?php echo $s211?>"> 
            <input type="button" class="basic" id="s212" value="<?php echo $s212?>"> 
            <input type="button" class="basic" id="s213" value="<?php echo $s213?>">
            <input type="button" class="basic" id="s214" value="<?php echo $s214?>">
            <input type="button" class="basic" id="s215" value="<?php echo $s215?>">
            <input type="button" class="basic" id="s216" value="<?php echo $s216?>">
            <input type="button" class="basic" id="s221" value="<?php echo $s221?>">
            <input type="button" class="basic" id="s222" value="<?php echo $s222?>">
            <input type="button" class="basic" id="s223" value="<?php echo $s223?>">
            <input type="button" class="basic" id="s224" value="<?php echo $s224?>">
            <input type="button" class="basic" id="s225" value="<?php echo $s225?>">
            <input type="button" class="basic" id="s226" value="<?php echo $s226?>">
            <input type="button" class="basic" id="s231" value="<?php echo $s231?>">
            <input type="button" class="basic" id="s232" value="<?php echo $s232?>">
            <input type="button" class="basic" id="s233" value="<?php echo $s233?>">
            <input type="button" class="basic" id="s234" value="<?php echo $s234?>">
            <input type="button" class="basic" id="s235" value="<?php echo $s235?>">
            <input type="button" class="basic" id="s236" value="<?php echo $s236?>">
            <input type="button" class="basic" id="s241" value="<?php echo $s241?>">
            <input type="button" class="basic" id="s242" value="<?php echo $s242?>">
        </div>
      
      </section>
    </main>
  </body>
</html>
