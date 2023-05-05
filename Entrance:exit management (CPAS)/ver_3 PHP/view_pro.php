<?php
session_start();

$_SESSION['function']="view";
$_SESSION['room']="PROFESSOR";
if($_SESSION["attribute"]=="guest"){
  header("Location: main.php?id=id&error=ゲストは使用できません。  Not available to guests.");  // メイン画面へ遷移
  exit();  // 処理終了
}

$dsn = 'mysql:host=localhost;dbname=html';

$username = 'root';
$password = '';
$errorMessage = "";
$rows201 = [];
$rows204 = [];
$rows205 = [];
$rows206 = [];
$pdo = new PDO($dsn, $username, $password);
$sql = 'select * from status_quo where room = "201"';
$sth = $pdo->query($sql);
if(!empty($sth)){
  $row_count = $sth->rowCount() ;
  while($row = $sth->fetch()){
    $rows201[] = $row;
  }
}
$sql = 'select * from status_quo where room = "204"';
$sth = $pdo->query($sql);
if(!empty($sth)){
  $row_count = $sth->rowCount() ;
  while($row = $sth->fetch()){
    $rows204[] = $row;
  }
}
$sql = 'select * from status_quo where room = "205"';
$sth = $pdo->query($sql);
if(!empty($sth)){
  $row_count = $sth->rowCount() ;
  while($row = $sth->fetch()){
    $rows205[] = $row;
  }
}
$sql = 'select * from status_quo where room = "206"';
$sth = $pdo->query($sql);
if(!empty($sth)){
  $row_count = $sth->rowCount() ;
  while($row = $sth->fetch()){
    $rows206[] = $row;
  }
}
$sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
$sth = $pdo->prepare($sql);
$params = array(':id' => $_SESSION['id'], ':name' => $_SESSION['name'], ':labo' => $_SESSION['labo'], ':attribute' => $_SESSION['attribute'], ':status' => 'VIEW', ':room' => 'PROFESSOR', ':seat' => '-', ':date' => date("Y/m/d H:i:s"));
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
      <h2 class="text1">Professor's Room</h2>
        <!--201-->
        <h2 class="text">201</h2>
        <table border="3" class="list201">
            <tr>
              <th class="list1">ID</th>
              <th class="list1">Name</th>
              <th class="list1">Labo</th>
              <th class="list1">Attribute</th>
              <th class="list1">Status</th>
              <th class="list2">Room</th>
              <th class="list3">Date</th>
            </tr>
            <!--SQL接続後php-->
        <?php 
        if(!empty($rows201)){
          foreach($rows201 as $row){
            ?> 
            <tr> 
              <td><?php echo htmlspecialchars($row['id'],ENT_QUOTES,'UTF-8') ?></td> 
              <td><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['labo'],ENT_QUOTES,'UTF-8'); ?></td>    
              <td><?php echo htmlspecialchars($row['attribute'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['status'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['room'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['date'],ENT_QUOTES,'UTF-8'); ?></td> 
            </tr> 
            <?php 
          } 
        }
        ?>
        </table>
        <!--204-->
        <h2 class="text">204</h2>
        <table border="3" class="list204">
        <tr>
          <th class="list1">ID</th>
          <th class="list1">Name</th>
          <th class="list1">Labo</th>
          <th class="list1">Attribute</th>
          <th class="list1">Status</th>
          <th class="list2">Room</th>
          <th class="list3">Date</th>
        </tr>
        <!--SQL接続後php-->
        <?php 
        if(!empty($rows204)){
          foreach($rows204 as $row){
            ?> 
            <tr> 
              <td><?php echo htmlspecialchars($row['id'],ENT_QUOTES,'UTF-8') ?></td> 
              <td><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['labo'],ENT_QUOTES,'UTF-8'); ?></td>    
              <td><?php echo htmlspecialchars($row['attribute'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['status'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['room'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['date'],ENT_QUOTES,'UTF-8'); ?></td> 
            </tr> 
            <?php 
          } 
        }
        ?>
        </table>
        <!--205-->
        <h2 class="text">205</h2>
        <table border="3" class="list205">
        <tr>
          <th class="list1">ID</th>
          <th class="list1">Name</th>
          <th class="list1">Labo</th>
          <th class="list1">Attribute</th>
          <th class="list1">Status</th>
          <th class="list2">Room</th>
          <th class="list3">Date</th>
        </tr>
        <!--SQL接続後php-->
        <?php 
        if(!empty($rows205)){
          foreach($rows205 as $row){
            ?> 
            <tr> 
              <td><?php echo htmlspecialchars($row['id'],ENT_QUOTES,'UTF-8') ?></td> 
              <td><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['labo'],ENT_QUOTES,'UTF-8'); ?></td>    
              <td><?php echo htmlspecialchars($row['attribute'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['status'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['room'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['date'],ENT_QUOTES,'UTF-8'); ?></td> 
            </tr> 
            <?php 
          } 
        }
        ?>
        </table>
        <!--206-->
        <h2 class="text">206</h2>
        <table border="3" class="list206">
        <tr>
          <th class="list1">ID</th>
          <th class="list1">Name</th>
          <th class="list1">Labo</th>
          <th class="list1">Attribute</th>
          <th class="list1">Status</th>
          <th class="list2">Room</th>
          <th class="list3">Date</th>
        </tr>
        <!--SQL接続後php-->
        <?php 
        if(!empty($rows206)){
          foreach($rows206 as $row){
            ?> 
            <tr> 
              <td><?php echo htmlspecialchars($row['id'],ENT_QUOTES,'UTF-8') ?></td> 
              <td><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['labo'],ENT_QUOTES,'UTF-8'); ?></td>    
              <td><?php echo htmlspecialchars($row['attribute'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['status'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['room'],ENT_QUOTES,'UTF-8'); ?></td> 
              <td><?php echo htmlspecialchars($row['date'],ENT_QUOTES,'UTF-8'); ?></td> 
            </tr> 
            <?php 
          } 
        }
        ?>
        </table>
      </section>
    </main>
  </body>
</html>
