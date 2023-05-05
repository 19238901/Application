<?php
session_start();

$status = $_GET["status"];
$_SESSION['status'] = $status;
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="record_room.css">
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
      <div class="status">
      <!--　record.html　で押したボタンを出力 -->
      <h3 class="str">Status : <?php echo $status?></h3>
      </div>
      <h2 class="text1">Room or Seet</h2>
      <div class="room">
      <input class="radio" type="button" name="room" value="201" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('201');">
      <input class="radio" type="button" name="room" value="204" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('204');">
      <input class="radio" type="button" name="room" value="205" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('205');">
      <input class="radio" type="button" name="room" value="206" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('206');">
      </div>
      <div class="room">
        <input from='' class="radio" type="button" name="room" value="402" onclick="location.href='record_402.php?room=' +  encodeURIComponent('402');">
        <input class="radio" type="button" name="room" value="403" onclick="location.href='record_403.php?room=' +  encodeURIComponent('403');">
        <input class="radio" type="button" name="room" value="404" onclick="location.href='record_404.php?room=' +  encodeURIComponent('404');">
      <input class="radio" type="button" name="room" value="OTHER" onclick="location.href='confirmation.php?page=room&room=' +  encodeURIComponent('OTHER');">
      </div>
      </section>
    </main>
  </body>
</html>
