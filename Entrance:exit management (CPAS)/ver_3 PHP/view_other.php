<?php
session_start();

$_SESSION['function']="view";
$_SESSION['room']="OTHER";
if($_SESSION["attribute"]=="guest"){
  header("Location: main.php?id=id&error=ゲストは使用できません。  Not available to guests.");  // メイン画面へ遷移
  exit();  // 処理終了
}
$dsn = 'mysql:host=localhost;dbname=html';

$username = 'root';
$password = '';
$errorMessage = "";
$rows = [];
$pdo = new PDO($dsn, $username, $password);
$sql = 'select * from status_quo where room = "OTHER"';
$sth = $pdo->query($sql);
if(!empty($sth)){
  $row_count = $sth->rowCount() ;
  while($row = $sth->fetch()){
    $rows[] = $row;
  }
}
$sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
$sth = $pdo->prepare($sql);
$params = array(':id' => $_SESSION['id'], ':name' => $_SESSION['name'], ':labo' => $_SESSION['labo'], ':attribute' => $_SESSION['attribute'], ':status' => 'VIEW', ':room' => 'OTHER', ':seat' => '-', ':date' => date("Y/m/d H:i:s"));
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
        <!--other-->
        <h2 class="text1">OTHER</h2>
        <table border="3" class="list">
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
        if(!empty($rows)){
          foreach($rows as $row){
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
    </main>
  </body>
</html>
