<?php
session_start();
$errorMessage="";
$name = $_SESSION['name'];
$labo = $_SESSION['labo'];
$id = $_SESSION['id'];
$attribute = $_SESSION['attribute'];
if($_GET["page"]=="status"){
  $status = $_GET['status'];
  $room = "-";
  $seat = "-";
} elseif($_GET["page"]=="room"){
  $status = $_SESSION['status'];
  $room = $_GET['room'];
  $seat = "-";
} elseif($_GET["page"]=="seat"){
  $status = $_SESSION['status'];
  $room = $_SESSION['room'];
  $seat = $_GET['seat'];
  }
$_SESSIOn['id'] = $id;
if($_SESSION["attribute"] == "guest"){
  $att = "Destination";
} else {
  $att = "Labo";
}

$dsn = 'mysql:host=localhost;dbname=html';

$username = 'root';
$password = '';

try {
  $pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
  /*削除*/
  $sth = $pdo->prepare("delete from status_quo where id=:id");
  $sth->bindParam( ':id', $id, PDO::PARAM_INT);
  $res = $sth->execute();
  
  /*挿入*/
  $sql = "INSERT INTO status_quo (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
  $sth = $pdo->prepare($sql);
  $params = array(':id' => $id, ':name' => $name, ':labo' => $labo, ':attribute' => $_SESSION["attribute"], ':status' =>  $status, ':room' => $room, ':seat' => $seat, ':date' => date("Y/m/d H:i:s"));
  $sth->execute($params);
  
  /*挿入*/
  $sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
  $sth = $pdo->prepare($sql);
  $params = array(':id' => $id, ':name' => $name, ':labo' => $labo, ':attribute' => $_SESSION["attribute"], ':status' => $status, ':room' => $room, ':seat' => $seat, ':date' => date("Y/m/d H:i:s"));
  $sth->execute($params);
} catch (PDOException $e) {
  $errorMessage = "登録できません。";
}
echo $errorMessage;
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
      <div class="btn1">
        <button class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></button>
      <button class="back" onclick="location.href='main.php?id=id'"><i class="fa fa-home"></i></button>
      <section class="detail">
        <h2 class="text1">Registration Information</h2>
      </div>
      <h2 class="str">ID : <?php echo $id?></h2>
      <h2 class="str">Name : <?php echo $name?></h2>
      <h2 class="str"><?php echo $att?> : <?php echo $labo?></h2>
      <h2 class="str">Status : <?php echo $status?></h2>
      <h2 class="str">Room : <?php echo $room?></h2>
      <h2 class="str">Seat : <?php echo $seat?></h2>
    </section>
    <input type="button" class="out" onclick="location.href='main.php?id=' +  encodeURIComponent('id');" value="CONTINUE">
      <input type="button" class="out" onclick="location.href='login.php'" value="LOGOUT">
    </main>
  </body>
</html>
