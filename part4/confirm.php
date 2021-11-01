<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    확인 화면
    <form name="form1" action="view.php" method="post">
      <?php
      print "이름:";
      print $_POST["onname"];
      print "<BR><BR>";
      print "본문 :<BR>";
      print nl2br($_POST["bonmun"]);
      ?>
      <BR>
      <input type="submit" value="확인">
      <input type="submit" name="back" value="돌아가기">
      <input type="hidden" name="onname" value="<?=$_POST["onname"]?>">
      <input type="hidden" name="bonmun" value="<?=$_POST["bonmun"]?>">
      <input type="hidden" name="user_id" value="<?=$_POST["user_id"]?>">
    </form>
  </body>
</html>
