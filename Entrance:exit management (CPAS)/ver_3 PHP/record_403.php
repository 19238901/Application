<?php
session_start();

$status = $_SESSION['status'];
$_SESSION['status'] = $status;
$room = $_GET['room'];
$_SESSION['room'] = $room;
$dsn = 'mysql:host=localhost;dbname=html';
$s300 = "";
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
      case "300":
      $s311 = $row['name'];
      $s312 = $row['name'];
      $s321 = $row['name'];
      $s322 = $row['name'];
      $s323 = $row['name'];
      $s324 = $row['name'];
      $s325 = $row['name'];
      $s331 = $row['name'];
      $s332 = $row['name'];
      $s333 = $row['name'];
      $s341 = $row['name'];
      $s342 = $row['name'];
      $s343 = $row['name'];
      $s344 = $row['name'];
      break;
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
if(isset($_POST["s300"])){
  if(empty($s311) && empty($s312) && empty($s321) && empty($s322) && empty($s323) && empty($s324) && empty($s325) && empty($s331) && empty($s332) && empty($s333) && empty($s341) && empty($s342) && empty($s343) && empty($s344)){
    header("Location: confirmation.php?page=seat&seat=300");
    exit();
  }
}
if(isset($_POST["s311"])){
  if(empty($s311)){
    header("Location: confirmation.php?page=seat&seat=311");
    exit();
  }
}
if(isset($_POST["s312"])){
  if(empty($s312)){
    header("Location: confirmation.php?page=seat&seat=312");
    exit();
  }
}
if(isset($_POST["s321"])){
  if(empty($s321)){
    header("Location: confirmation.php?page=seat&seat=321");
    exit();
  }
}
if(isset($_POST["s322"])){
  if(empty($s322)){
    header("Location: confirmation.php?page=seat&seat=322");
    exit();
  }
}
if(isset($_POST["s323"])){
  if(empty($s323)){
    header("Location: confirmation.php?page=seat&seat=323");
    exit();
  }
}
if(isset($_POST["s324"])){
  if(empty($s324)){
    header("Location: confirmation.php?page=seat&seat=324");
    exit();
  }
}
if(isset($_POST["s325"])){
  if(empty($s325)){
    header("Location: confirmation.php?page=seat&seat=325");
    exit();
  }
}
if(isset($_POST["s331"])){
  if(empty($s231)){
    header("Location: confirmation.php?page=seat&seat=331");
    exit();
  }
}
if(isset($_POST["s332"])){
  if(empty($s332)){
    header("Location: confirmation.php?page=seat&seat=332");
    exit();
  }
}
if(isset($_POST["s333"])){
  if(empty($s333)){
    header("Location: confirmation.php?page=seat&seat=333");
    exit();
  }
}
if(isset($_POST["s341"])){
  if(empty($s341)){
    header("Location: confirmation.php?page=seat&seat=341");
    exit();
  }
}
if(isset($_POST["s342"])){
  if(empty($s342)){
    header("Location: confirmation.php?page=seat&seat=342");
    exit();
  }
}
if(isset($_POST["s343"])){
  if(empty($s343)){
    header("Location: confirmation.php?page=seat&seat=343");
    exit();
  }
}
if(isset($_POST["s344"])){
  if(empty($s344)){
    header("Location: confirmation.php?page=seat&seat=344");
    exit();
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="record_402.css">
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
    <h2 class="text1">Status Quo<h2>
        <h2 class="str">Status : <?php echo $status?></h2>
        <h2 class="str">Room : <?php echo $room?></h2>
          <h2 class="text1">Seat<h2>
              <form action="" method="post">
                <div class="seat403" id="container403">
                  <input type="submit" class="basic" name="s300" id="s300" value="ALL"> 
                  <input type="submit" class="basic" name="s311" id="s311" value="<?php echo $s311?>"> 
                  <input type="submit" class="basic" name="s312" id="s312" value="<?php echo $s312?>">
                  <input type="submit" class="basic" name="s321" id="s321" value="<?php echo $s321?>">
                  <input type="submit" class="basic" name="s322" id="s322" value="<?php echo $s322?>">
                  <input type="submit" class="basic" name="s323" id="s323" value="<?php echo $s323?>">
                  <input type="submit" class="basic" name="s324" id="s324" value="<?php echo $s324?>">
                  <input type="submit" class="basic" name="s325" id="s325" value="<?php echo $s325?>">
                  <input type="submit" class="basic" name="s331" id="s331" value="<?php echo $s331?>">
                  <input type="submit" class="basic" name="s332" id="s332" value="<?php echo $s332?>">
                  <input type="submit" class="basic" name="s333" id="s333" value="<?php echo $s333?>">
                  <input type="submit" class="basic" name="s341" id="s341" value="<?php echo $s341?>">
                  <input type="submit" class="basic" name="s342" id="s342" value="<?php echo $s342?>">
                  <input type="submit" class="basic" name="s343" id="s343" value="<?php echo $s343?>">
                  <input type="submit" class="basic" name="s344" id="s344" value="<?php echo $s344?>">
                </div>
                </from>
    <h2 class="text1">Room<h2>
        <div class="room">
          <input class="radio" type="button" name="room" value="201" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('201');">
          <input class="radio" type="button" name="room" value="204" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('204');">
          <input class="radio" type="button" name="room" value="205" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('205');">
          <input class="radio" type="button" name="room" value="206" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('206');">
        </div>
        <div class="room1">
          <input class="radio" type="button" name="room" value="402" onclick="location.href='record_402.php?room=' +  encodeURIComponent('402');">
          <input class="radio" type="button" name="room" value="403" onclick="location.href='record_403.php?room=' +  encodeURIComponent('403');">
          <input class="radio" type="button" name="room" value="404" onclick="location.href='record_404.php?room=' +  encodeURIComponent('404');">
          <input class="radio" type="button" name="room" value="OTHER" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('OTHER');">
        </div>
      </section>
    </main>
  </body>
</html>
