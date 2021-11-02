<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 테스트</title>
  </head>
  <body>
    <?php
      if (isset($_POST["confirm"])) {
    ?>
    <?php
      print $_POST["onname"]."님으로부터의 메시지<BR><BR>";
      if (!empty($_POST["hobby"])) {
        print "저의 취미는 ";
        print $_POST["hobby"];
        print "입니다.<BR><BR>";
      } else {
        print "저의 취미는 없습니다.<BR><BR>";
      }
      print "<BR><BR>";
      print "본문 :<BR>";
      print nl2br($_POST["bonmun"]);
    ?>
    <?php
      } elseif (isset($_POST["back"])) {
     ?>
     <FONT size="4">텍스트 송신 테스트</FONT>
     <form name="form1" action="confirm.php" method="post">
       이름: <input type="text" name="onname"><BR>
       나의 취미 : <BR>
       <input type="checkbox" name="hobby[]" value="스포츠">스포츠<BR>
       <input type="checkbox" name="hobby[]" value="영화감상">영화감상<BR>
       <input type="checkbox" name="hobby[]" value="독서">독서<BR><BR>
       본문: <BR>
       <textarea name="bonmun" rows="8" cols="80"></textarea><BR>
       <input type="submit" value="송신">
       <input type="hidden" name="user_id" value="0001">
    <?php
      }else{
     ?>
     오류입니다. <BR>
     <a href="form.html">form.html</a>로 돌아갑니다.
    <?php
      }
     ?>
  </body>
</html>
