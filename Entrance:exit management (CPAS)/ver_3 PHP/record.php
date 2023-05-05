<?php 
session_start();

$function=$_GET['function'];
$_SESSION['function']=$function;
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="record.css">
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
      <h2 class="text1">Status</h2>
    <!--　record_room.php　に押したボタンを送信 -->
      <div class="status">
        <input class="radio" type="button" name="status" value="ENTER" onclick="location.href='record_room.php?status=' +  encodeURIComponent('ENTER');">
        <input class="radio" type="button" name="status" value="MEETING"onclick="location.href='record_room.php?status=' +  encodeURIComponent('MEETING');">
      </div>
      <div class="status">
        <input class="radio" type="button" name="status" value="CLASS" onclick="location.href='record_room.php?status=' +  encodeURIComponent('CLASS');">
        <input class="radio" type="submit" name="status" value="OTHER" onclick="location.href='record_room.php?status=' +  encodeURIComponent('OTHER');">
      </div>
      <div class="status">
      <input class="radio1" type="button" name="leave" onclick="location.href='confirmation.php?page=status&status=' +  encodeURIComponent('LEAVE');" value="LEAVE">
      </div>
    </section>
    </main>
  </body>
</html>
