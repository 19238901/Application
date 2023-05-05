<?php
session_start();
if($_SESSION["attribute"]=="guest"){
  header("Location: main.php?id=id&error=ゲストは使用できません。  Not available to guests.");  // メイン画面へ遷移
  exit();  // 処理終了
}
$status=$_GET['function'];
$_SESSION['function']=$status;
$_SESSION['s_id']="";
$_SESSION['s_name']="";
$_SESSION['s_labo']="";
$_SESSION['s_room']="";
$_SESSION['s_attribute']="";
$_SESSION['s_date']="";
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="search.css">
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
      <form action="search_result.php" method="post">
        <div class="btn1">
          <button type="button" class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></button>
            <button type="button" class="back" onclick="location.href='main.php?id=id'"><i class="fa fa-home"></i></button>
      <button type="submit" class="back1" ><i class="fa fa-search"></i></button>
        </div>
        
            <h2 class="text1">Detail Search</h2>                
                <div>
                    <label class="text" for="id">ID<br></label>
          <input class="s" id="id" type="text" name="id" value="">
                </div>
                <div>
                    <label class="text" for="name">Name<br></label>
          <input class="s" id="name" type="text" name="name" value="">
                </div>
        <div>
          <label class="text" for="labo">Labo<br></label>
          <input class="s" id="labo" type="text" name="labo" value="">
        </div>
        
        <label class="text" for="att">Attribute<br></label>
                <div class="example">
                  <label>
                    <input type="radio" id="att" name="att" value="all">ALL
                  </label>
                  <label>
                    <input type="radio" id="att" name="att" value="cps">CPS
                  </label>
                  <label>
                    <input type="radio" id="att" name="att" value="guest">GUEST
                  </label>
                </div>
                <div>
                    <label class="text" for="room">Room<br></label>
          <input class="s" id="room" type="text" name="room" value="">
                </div>
            </form>
        </section>
    </main>
  </body>
  
</html>
