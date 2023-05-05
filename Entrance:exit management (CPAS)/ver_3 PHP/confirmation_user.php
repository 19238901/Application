<?php
  session_start();

$page = $_GET['page'];
if($_GET["page"]=="user"){
  if($_SESSION['page']=="signup"){
    header("Location: signup.php");  // メイン画面へ遷移
    exit();  // 処理終了
  }elseif($_SESSION['page']=="guest"){
    header("Location: guest.php");  // メイン画面へ遷移
    exit();  // 処理終了
    }
}elseif($_GET['page']=="signup"){
  $name = $_SESSION['name'];
  $labo = $_SESSION['labo'];
  $serect = "Labo";
  $id = $_SESSION['guest_id'];
} elseif($_GET["page"]=="guest"){
  $name = $_SESSION['name'];
  $labo = $_SESSION['labo'];
  $serect = "Destination";
  $id = $_SESSION['id'];
} 

$_SESSION['page'] = $page;
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
      <section class="detail">
        <h2 class="text1">Registration Information</h2>
        <h2 class="str">ID : <?php echo $id?></h2>
        <h2 class="str">Name : <?php echo $name?></h2>
      <h2 class="str"><?php echo $serect?> : <?php echo $labo?></h2>
    </section>
    <input type="button" onclick="location.href='confirmation_user.php?page=user'" class="out" value="CONTINUE" id="continu" name="continu">
      <input type="button" class="out" onclick="location.href='login.php'" value="LOGIN">
    </main>
  </body>
</html>
