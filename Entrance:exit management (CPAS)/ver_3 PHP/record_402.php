<?php
session_start();

$status = $_SESSION['status'];
$_SESSION['status'] = $status;
$room = $_GET['room'];
$_SESSION['room'] = $room;

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
if(isset($_POST["s211"])){
  if(empty($s211)){
    header("Location: confirmation.php?page=seat&seat=211");
    exit();
  }
}
if(isset($_POST["s212"])){
  if(empty($s212)){
    header("Location: confirmation.php?page=seat&seat=212");
    exit();
  }
}
if(isset($_POST["s213"])){
  if(empty($s213)){
    header("Location: confirmation.php?page=seat&seat=213");
    exit();
  }
}
if(isset($_POST["s214"])){
  if(empty($s214)){
    header("Location: confirmation.php?page=seat&seat=214");
    exit();
  }
}
if(isset($_POST["s215"])){
  if(empty($s215)){
    header("Location: confirmation.php?page=seat&seat=215");
    exit();
  }
}
if(isset($_POST["s216"])){
  if(empty($s216)){
    header("Location: confirmation.php?page=seat&seat=216");
    exit();
  }
}
if(isset($_POST["s221"])){
  if(empty($s221)){
    header("Location: confirmation.php?page=seat&seat=221");
    exit();
  }
}
if(isset($_POST["s222"])){
  if(empty($s222)){
    header("Location: confirmation.php?page=seat&seat=222");
    exit();
  }
}
if(isset($_POST["s223"])){
  if(empty($s223)){
    header("Location: confirmation.php?page=seat&seat=223");
    exit();
  }
}
if(isset($_POST["s224"])){
  if(empty($s224)){
    header("Location: confirmation.php?page=seat&seat=224");
    exit();
  }
}
if(isset($_POST["s225"])){
  if(empty($s225)){
    header("Location: confirmation.php?page=seat&seat=225");
    exit();
  }
}
if(isset($_POST["s226"])){
  if(empty($s226)){
    header("Location: confirmation.php?page=seat&seat=226");
    exit();
  }
}
if(isset($_POST["s231"])){
  if(empty($s231)){
    header("Location: confirmation.php?page=seat&seat=231");
    exit();
  }
}
if(isset($_POST["s232"])){
  if(empty($s232)){
    header("Location: confirmation.php?page=seat&seat=232");
    exit();
  }
}
if(isset($_POST["s233"])){
  if(empty($s233)){
    header("Location: confirmation.php?page=seat&seat=233");
    exit();
  }
}
if(isset($_POST["s234"])){
  if(empty($s214)){
    header("Location: confirmation.php?page=seat&seat=234");
    exit();
  }
}
if(isset($_POST["s235"])){
  if(empty($s235)){
    header("Location: confirmation.php?page=seat&seat=235");
    exit();
  }
}
if(isset($_POST["s236"])){
  if(empty($s236)){
    header("Location: confirmation.php?page=seat&seat=236");
    exit();
  }
}
if(isset($_POST["s241"])){
  if(empty($s241)){
    header("Location: confirmation.php?page=seat&seat=241");
    exit();
  }
}
if(isset($_POST["s242"])){
  if(empty($s242)){
    header("Location: confirmation.php?page=seat&seat=242");
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
        <div class="seat402" id="container402">
                  <input type="submit" class="basic" name="s211" id="s211" value="<?php echo $s211?>"> 
                  <input type="submit" class="basic" name="s212" id="s212" value="<?php echo $s212?>"> 
                  <input type="submit" class="basic" name="s213" id="s213" value="<?php echo $s213?>">
                  <input type="submit" class="basic" name="s214" id="s214" value="<?php echo $s214?>">
                  <input type="submit" class="basic" name="s215" id="s215" value="<?php echo $s215?>">
                  <input type="submit" class="basic" name="s216" id="s216" value="<?php echo $s216?>">
                  <input type="submit" class="basic" name="s221" id="s221" value="<?php echo $s221?>">
                  <input type="submit" class="basic" name="s222" id="s222" value="<?php echo $s222?>">
                  <input type="submit" class="basic" name="s223" id="s223" value="<?php echo $s223?>">
                  <input type="submit" class="basic" name="s224" id="s224" value="<?php echo $s224?>">
                  <input type="submit" class="basic" name="s225" id="s225" value="<?php echo $s225?>">
                  <input type="submit" class="basic" name="s226" id="s226" value="<?php echo $s226?>">
                  <input type="submit" class="basic" name="s231" id="s231" value="<?php echo $s231?>">
                  <input type="submit" class="basic" name="s232" id="s232" value="<?php echo $s232?>">
                  <input type="submit" class="basic" name="s233" id="s233" value="<?php echo $s233?>">
                  <input type="submit" class="basic" name="s234" id="s234" value="<?php echo $s234?>">
                  <input type="submit" class="basic" name="s235" id="s235" value="<?php echo $s235?>">
                  <input type="submit" class="basic" name="s236" id="s236" value="<?php echo $s236?>">
                  <input type="submit" class="basic" name="s241" id="s241" value="<?php echo $s241?>">
                  <input type="submit" class="basic" name="s242" id="s242" value="<?php echo $s242?>">
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
