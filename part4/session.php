<?php
  session_start();
  $count = 1;
  if(isset($_SESSION["count"])){
    $count = $_SESSION["count"];
    $count ++;
  }
  if ($count == 20) {
    session_destroy();
  }
  $_SESSION["count"] = $count;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>세션 변수 테스트</title>
  </head>
  <body>
    세션 변수 테스트<BR>
    <BR>
    <?php
      if ($count == 1) {
    ?>
      첫 방문입니다.<BR>
      <BR>
      세션 변수에 데이터가 없습니다.<br>
      페이지를 새로고침 하세요.<br>
      <?php
      }else{
      ?>
      당신의 방문은 <?=$count?>회째입니다.<br>
      <?php
      }
      ?>
  </body>
</html>
