<?php
  $count = 1;
  if(isset($_COOKIE["count"])){
    $count = $_COOKIE["count"];
    $count ++;
  }
  setcookie("count", $count, time() + 10);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>쿠키 테스트</title>
  </head>
  <body>
    쿠키 테스트<BR>
    <BR>
    <?php
    if($count == 1) {
    ?>
      첫 방문입니다.<BR>
      <BR>
      쿠키 정보가없습니다.<BR>
      페이지를 새로고침 하세요.<BR>
      <?php
      } else {
      ?>
      당신의 방문은 <?=$count?> 번째입니다. <BR>
      <BR>
      10초 이내에 새로고침을 하면 카운트가 올라갑니다.
      <?php
      }
      ?>
  </body>
</html>
