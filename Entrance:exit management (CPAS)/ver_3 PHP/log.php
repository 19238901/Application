<?php
session_start();
if($_SESSION["attribute"]=="guest" || $_SESSION["attribute"]=="cps"){
  header("Location: main.php?id=id&error=管理者以外は利用できません。  Only available to administrators.");  // メイン画面へ遷移
  exit();  // 処理終了
}
$id=$_SESSION['s_id'];
$name=$_SESSION['s_name'];
$labo=$_SESSION['s_labo'];
$room=$_SESSION['s_room'];
$att=$_SESSION['s_attribute'];
$date=$_SESSION['s_date'];

$dsn = 'mysql:host=localhost;dbname=html';

$username = 'root';
$password = '';
$errorMessage = "";
$where = [];
$pdo = new PDO($dsn, $username, $password);

$search = [];
if(!empty($_SESSION['s_id'])){
  $id=$_SESSION['s_id'];
  $search[] = "id like '%{$id}%'";
}
if(!empty($_SESSION['s_name'])){
  $name=$_SESSION['s_name'];
  $search[] = "name like '%{$name}%'";
}
if(!empty($_SESSION['s_labo'])){
  $labo=$_SESSION['s_labo'];
  $search[] = "labo like '%{$labo}%'";
}
if(!empty($_SESSION['s_attribute'])){
  $att=$_SESSION['s_attribute'];
  if($att=="cps"){
    $search[] = 'attribute = "cps"';
  } elseif($att=="guest"){
    $search[] = 'attribute = "guest"';
  }
}
if(!empty($_SESSION['s_room'])){
  $room=$_SESSION['s_room'];
  $search[] = 'room = '.$room;
}
if(!empty($_SESSION['s_date'])){
  $date =$_SESSION['s_date'];
  //$search[] = "Date_FORMAT(date, '%Y-%m-%d') = DATE_FORMAT(".$date.",'%Y-%m-%d')";
  $search[] = "date like '%{$date}%'";
}
if( !empty($search) ) {
  $whereSQL = implode('AND',$search);
  $sql = 'select * from log where (status = "ENTER" OR status = "LEAVE" OR status = "MEETING" OR status = "CLASS" OR status = "OTHER") AND ' . $whereSQL;
} else {
  $sql = 'select * from log where status = "ENTER" OR status = "LEAVE" OR status = "MEETING" OR status = "CLASS" OR status = "OTHER"';
}
$sth = $pdo->query($sql);
if(!empty($sth)){
  $row_count = $sth->rowCount() ;
  while($row = $sth->fetch()){
    $rows[] = $row;
  }
}

$_SESSION['s_id']=$id;
$_SESSION['s_name']=$name;
$_SESSION['s_labo']=$labo;
$_SESSION['s_room']=$room;
$_SESSION['s_attribute']=$att;
$_SESSION['s_date']=$date;

$sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
$sth = $pdo->prepare($sql);
$params = array(':id' => $_SESSION['id'], ':name' => $_SESSION['name'], ':labo' => $_SESSION['labo'], ':attribute' => $_SESSION['attribute'], ':status' => 'LOG', ':room' => 'EorL', ':seat' => $id.'/'.$name.'/'.$labo.'/'.$room.'/'.$att.'/'.$date, ':date' => date("Y/m/d H:i:s"));
$sth->execute($params);
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="log_all.css">
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
            <button class="back1" onclick="location.href='log_search.php'"><i class="fa fa-search"></i></button>
        <h2 class="text1">Search Conditions</h2>
        </div>
      <h3 class="d">ID : <?php echo $id?></h3>
      <h3 class="d">Name : <?php echo $name?></h3>
      <h3 class="d">Labo : <?php echo $labo?></h3>
      <h3 class="d1">Attribute : <?php echo $att?></h3>
      <h3 class="d1">Room : <?php echo $room?></h3>
      <h3 class="d1">Date : <?php echo $date?></h3>
        <div class="room1">
            <input class="radio_all" type="button" name="room" value="ENTER or LEAVE" onclick="location.href='log.php?page=log'">
            <input class="radio" type="button" name="room" value="ALL" onclick="location.href='log_all.php?page=log'">
      </div>
      <h2 class="text1">Log Search Results</h2>
        <table border="3" class="list">
            <tr>
              <th class="list1">ID</th>
              <th class="list1">Name</th>
              <th class="list1">Labo</th>
              <th class="list1">Attribute</th>
              <th class="list1">Status</th>
              <th class="list2">Room</th>
              <th class="list2">Seat</th>
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
        <td><?php echo htmlspecialchars($row['seat'],ENT_QUOTES,'UTF-8'); ?></td> 
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
