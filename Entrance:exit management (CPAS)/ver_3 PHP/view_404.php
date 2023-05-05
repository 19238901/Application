<?php
session_start();

$_SESSION['function']="view";
$_SESSION['room']="404";
if($_SESSION["attribute"]=="guest"){
  header("Location: main.php?id=id&error=ゲストは使用できません。  Not available to guests.");  // メイン画面へ遷移
  exit();  // 処理終了
}
$dsn = 'mysql:host=localhost;dbname=html';
$s411 = "";
$s413 = "";
$s414 = "";
$s415 = "";
$s421 = "";
$s422 = "";
$s423 = "";
$s424 = "";
$s431 = "";
$s432 = "";
$s433 = "";
$s434 = "";
$s435 = "";
$s436 = "";
$s437 = "";
$s438 = "";
$s441 = "";
$s442 = "";
$s443 = "";
$s444 = "";

$username = 'root';
$password = '';
$errorMessage = "";
$rows = [];
$pdo = new PDO($dsn, $username, $password);
$sql = 'select * from status_quo where room = "404"';
$sth = $pdo->query($sql);
if(!empty($sth)){
  while($row = $sth->fetch()){
    switch($row['seat']){
      case "411":
      $s411 = $row['name'];
      break;
      case "413":
      $s413 = $row['name'];
      break;
      case "414":
      $s414 = $row['name'];
      break;
      case "415":
      $s415 = $row['name'];
      break;
      case "421":
      $s421 = $row['name'];
      break;
      case "422":
      $s422 = $row['name'];
      break;
      case "423":
      $s423 = $row['name'];
      break;
      case "424":
      $s424 = $row['name'];
      break;
      case "431":
      $s431 = $row['name'];
      break;
      case "432":
      $s432 = $row['name'];
      break;
      case "433":
      $s433 = $row['name'];
      break;
      case "434":
      $s434 = $row['name'];
      break;
      case "435":
      $s435 = $row['name'];
      break;
      case "436":
      $s436 = $row['name'];
      break;
      case "437":
      $s437 = $row['name'];
      break;
      case "438":
      $s438 = $row['name'];
      break;
      case "441":
      $s441 = $row['name'];
      break;
      case "442":
      $s442 = $row['name'];
      break;
      case "443":
      $s443 = $row['name'];
      break;
      case "444":
      $s444 = $row['name'];
      break;
    }
  }
}
$sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
$sth = $pdo->prepare($sql);
$params = array(':id' => $_SESSION['id'], ':name' => $_SESSION['name'], ':labo' => $_SESSION['labo'], ':attribute' => $_SESSION['attribute'], ':status' => 'VIEW', ':room' => '404', ':seat' => '-', ':date' => date("Y/m/d H:i:s"));
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
    <h2 class="text1">404</h2>
        <div class="seet404" id="container404">
        <input type="button" class="basic" id="s411" value="<?php echo $s411?>">
            <label class="text_cafe" id="s412">Cafe area</label>
        <input type="button" class="basic" id="s413" value="<?php echo $s413?>">
        <input type="button" class="basic" id="s414" value="<?php echo $s414?>">
        <input type="button" class="basic" id="s415" value="<?php echo $s415?>">
        <input type="button" class="basic" id="s421" value="<?php echo $s421?>">
        <input type="button" class="basic" id="s422" value="<?php echo $s422?>">
        <input type="button" class="basic" id="s423" value="<?php echo $s423?>">
        <input type="button" class="basic" id="s424" value="<?php echo $s424?>">
        <input type="button" class="basic" id="s431" value="<?php echo $s431?>">
        <input type="button" class="basic" id="s432" value="<?php echo $s432?>">
        <input type="button" class="basic" id="s433" value="<?php echo $s433?>">
        <input type="button" class="basic" id="s434" value="<?php echo $s434?>">
        <input type="button" class="basic" id="s435" value="<?php echo $s435?>">
        <input type="button" class="basic" id="s436" value="<?php echo $s436?>">
        <input type="button" class="basic" id="s437" value="<?php echo $s437?>">
        <input type="button" class="basic" id="s438" value="<?php echo $s438?>">
        <input type="button" class="basic" id="s441" value="<?php echo $s441?>">
        <input type="button" class="basic" id="s442" value="<?php echo $s442?>">
        <input type="button" class="basic" id="s443" value="<?php echo $s443?>">
        <input type="button" class="basic" id="s444" value="<?php echo $s444?>">
        </div>
    </section>
    </main>
  </body>
  
</html>
