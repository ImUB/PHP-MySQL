<?php
  session_start();
  $_SESSION["onname"] = $_POST["onname"];
  $_SESSION["bonmun"] = $_POST["bonmun"];
  if(isset($_POST["user_id"])){
    $_SESSION["user_id"] = $_POST["user_id"];
  }?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    확인 화면<BR><BR>
    <form name="form1" action="view.php" method="post">
      <?php
      print "이름:";
      print $_POST["onname"]."<BR>";
      if (isset($_POST["gender"])) {
        print "성별: ".$_POST["gender"]."<BR>";
      } else {
        print "성별을 선택하세요.<BR>";
      }
      if ($_POST["prefecture"] != ""){
        print "사는 곳: ".$_POST["prefecture"]."<BR>";
      } else {
        print "사는 곳을 선택해주세요.<BR>";
      }
      if (isset($_POST["hobby"])) {
        $last_key = end($_POST["hobby"]);
        print "저의 취미는 ";
        foreach ($_POST["hobby"] as $hobby) {
          if ($hobby != $last_key) {
            print $hobby.",";
          } else {
            print $hobby."<BR>";
          }
          echo '<input type="hidden" name="bobby[]" value="'.$hobby.'">';
          #hidden으로 배열을 넘기려면 배열자체를 넘기는게 아니라 하나하나 잘라서 보내야됌
        }
      } else {
        print "저의 취미는 없습니다.<BR><BR>";
      }
      print "본문 :<BR>";
      print nl2br($_POST["bonmun"]);
      ?>
      <BR>
      <input type="submit" name="confirm" value="확인">
      <input type="submit" name="back" value="돌아가기">
      <input type="hidden" name="user_id" value="<?=$_POST["user_id"]?>">
      <input type="hidden" name="gender" value="<?=$_POST["gender"]?>">
      <input type="hidden" name="prefecture" value="<?=$_POST["prefecture"]?>">
    </form>
  </body>
</html>
