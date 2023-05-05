<?php
session_start();

$status = $_SESSION['status'];
$_SESSION['status'] = $status;
$room = $_GET['room'];
$_SESSION['room'] = $room;

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
if(isset($_POST["s411"])){
  if(empty($s411)){
    header("Location: confirmation.php?page=seat&seat=411");
    exit();
  }
}
if(isset($_POST["s413"])){
  if(empty($s413)){
    header("Location: confirmation.php?page=seat&seat=413");
    exit();
  }
}
if(isset($_POST["s414"])){
  if(empty($s414)){
    header("Location: confirmation.php?page=seat&seat=414");
    exit();
  }
}
if(isset($_POST["s415"])){
  if(empty($s415)){
    header("Location: confirmation.php?page=seat&seat=415");
    exit();
  }
}
if(isset($_POST["s421"])){
  if(empty($s421)){
    header("Location: confirmation.php?page=seat&seat=421");
    exit();
  }
}
if(isset($_POST["s422"])){
  if(empty($s422)){
    header("Location: confirmation.php?page=seat&seat=422");
    exit();
  }
}
if(isset($_POST["s423"])){
  if(empty($s423)){
    header("Location: confirmation.php?page=seat&seat=423");
    exit();
  }
}
if(isset($_POST["s424"])){
  if(empty($s424)){
    header("Location: confirmation.php?page=seat&seat=424");
    exit();
  }
}
if(isset($_POST["s431"])){
  if(empty($s431)){
    header("Location: confirmation.php?page=seat&seat=431");
    exit();
  }
}
if(isset($_POST["s432"])){
  if(empty($s432)){
    header("Location: confirmation.php?page=seat&seat=432");
    exit();
  }
}
if(isset($_POST["s433"])){
  if(empty($s433)){
    header("Location: confirmation.php?page=seat&seat=433");
    exit();
  }
}
if(isset($_POST["s434"])){
  if(empty($s414)){
    header("Location: confirmation.php?page=seat&seat=434");
    exit();
  }
}
if(isset($_POST["s435"])){
  if(empty($s435)){
    header("Location: confirmation.php?page=seat&seat=435");
    exit();
  }
}
if(isset($_POST["s436"])){
  if(empty($s436)){
    header("Location: confirmation.php?page=seat&seat=436");
    exit();
  }
}if(isset($_POST["s435"])){
  if(empty($s435)){
    header("Location: confirmation.php?page=seat&seat=435");
    exit();
  }
}
if(isset($_POST["s436"])){
  if(empty($s436)){
    header("Location: confirmation.php?page=seat&seat=436");
    exit();
  }
}
if(isset($_POST["s437"])){
  if(empty($s437)){
    header("Location: confirmation.php?page=seat&seat=437");
    exit();
  }
}
if(isset($_POST["s438"])){
  if(empty($s438)){
    header("Location: confirmation.php?page=seat&seat=438");
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
                <div class="seat404" id="container404">
                  <input type="submit" class="basic" name="s411" id="s411" value="<?php echo $s411?>"> 
                    <label class="text_cafe" id="s412">Cafe area</label> 
                  <input type="submit" class="basic" name="s413" id="s413" value="<?php echo $s413?>">
                  <input type="submit" class="basic" name="s414" id="s414" value="<?php echo $s414?>">
                  <input type="submit" class="basic" name="s415" id="s415" value="<?php echo $s415?>">
                  <input type="submit" class="basic" name="s421" id="s421" value="<?php echo $s421?>">
                  <input type="submit" class="basic" name="s422" id="s422" value="<?php echo $s422?>">
                  <input type="submit" class="basic" name="s423" id="s423" value="<?php echo $s423?>">
                  <input type="submit" class="basic" name="s424" id="s424" value="<?php echo $s424?>">
                  <input type="submit" class="basic" name="s431" id="s431" value="<?php echo $s431?>">
                  <input type="submit" class="basic" name="s432" id="s432" value="<?php echo $s432?>">
                  <input type="submit" class="basic" name="s433" id="s433" value="<?php echo $s433?>">
                  <input type="submit" class="basic" name="s434" id="s434" value="<?php echo $s434?>">
                  <input type="submit" class="basic" name="s435" id="s435" value="<?php echo $s435?>">
                  <input type="submit" class="basic" name="s436" id="s436" value="<?php echo $s436?>">
                  <input type="submit" class="basic" name="s437" id="s437" value="<?php echo $s437?>">
                  <input type="submit" class="basic" name="s438" id="s438" value="<?php echo $s438?>">
                  <input type="submit" class="basic" name="s441" id="s441" value="<?php echo $s441?>">
                  <input type="submit" class="basic" name="s442" id="s442" value="<?php echo $s442?>">
                  <input type="submit" class="basic" name="s443" id="s443" value="<?php echo $s443?>">
                  <input type="submit" class="basic" name="s444" id="s444" value="<?php echo $s444?>">
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
