<?php
  session_start();

if ($_GET["id"] == 'id') {
  if(!empty($_GET["error"])){
    echo $_GET["error"];
  }
  $id = $_SESSION["id"];
  $name = $_SESSION["name"];
  $labo = $_SESSION["labo"];
  $attribute = $_SESSION["attribute"];
  if($attribute == "guest"){
    $att = "Destination";
  } else {
    $att = "Labo";
  }
} else {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="main.css">
    <meta charset="utf-8">
    <title>Progate</title>
  </head>
  <body>
    <header>
        <img src="./image/cps.png" class="cps">
    </header>
    <main>
    <section class="detail">
        <h2 class="text1">User Information</h2>
        <h3 class="str">ID : <?php echo $id; ?><h3>
        <h3 class="str">Name : <?php echo $name; ?><h3>
        <h3 class="str"><?php echo $att; ?> : <?php echo $labo; ?><h3>
        <h2 class="text1">Function</h2>
        <div>
            <input type="button" class="function" onclick="location.href='record.php?function=' + encodeURIComponent('RECORD');" value="RECORD">
      <input type="button" class="function" onclick="location.href='search.php?function=' + encodeURIComponent('RESERCH');" value="SEARCH">
        </div>
        <div>
      <input type="button" class="function" value="VIEW" onclick="location.href='view.php?function=' + encodeURIComponent('VIEW');">
      <input type="button" class="function" onclick="location.href='log_all.php?page=log&function=' + encodeURIComponent('LOG');" value="LOG">
        </div>
      
      <input type="button" class="out" value="LOGOUT" onclick="location.href='login.php'">
                </section>
    </main>
    <footer>
        <h1>広告募集！！</h1>
        <h4>システム開発費は ” <span>aibo</span> ” でお願いします。</h4>
    </footer>
  </body>
</html>
