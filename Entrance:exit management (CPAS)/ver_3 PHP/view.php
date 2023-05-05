<?php
session_start();
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
$rows201 = [];
$rows204 = [];
$rows205 = [];
$rows206 = [];
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
$rows_other = [];
$sql = 'select * from status_quo where room = "OTHER"';
$sth = $pdo->query($sql);
if(!empty($sth)){
  $row_count = $sth->rowCount() ;
  while($row = $sth->fetch()){
    $rows_other[] = $row;
  }
}
$sql = "INSERT INTO log (id, name, labo, attribute, status, room, seat, date) VALUES (:id, :name, :labo, :attribute, :status, :room, :seat, :date)";
$sth = $pdo->prepare($sql);
$params = array(':id' => $_SESSION['id'], ':name' => $_SESSION['name'], ':labo' => $_SESSION['labo'], ':attribute' => $_SESSION['attribute'], ':status' => 'VIEW', ':room' => 'ALL', ':seat' => '-', ':date' => date("Y/m/d H:i:s"));
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
      <h2 class="text1">Situation</h2>
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
      <!--402-->
      <h2 class="text">402</h2>
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
      <!--403-->
      <h2 class="text">403</h2>
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
      <!--404-->
      <h2 class="text">404</h2>
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
        if(!empty($rows_other)){
          foreach($rows_other as $row){
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
